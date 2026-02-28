/**
 * tauranga.ai — Hero Neural Network Animation
 * Pure canvas. No dependencies.
 *
 * Effect: floating nodes connected by lines when close,
 * with golden data pulses traveling along active connections.
 * Mouse hover gently repels nearby nodes.
 */
(function () {
  'use strict';

  var canvas = document.getElementById('hero-canvas');
  if (!canvas) return;

  var ctx    = canvas.getContext('2d');
  var hero   = canvas.parentElement;
  if (!ctx || !hero) return;

  // ── Palette ────────────────────────────────────────────────────────────────
  var GOLD  = [240, 185, 11];
  var WHITE = [255, 255, 255];

  // ── State ──────────────────────────────────────────────────────────────────
  var W, H, dpr;
  var nodes  = [];
  var pulses = [];
  var mouse  = { x: -9999, y: -9999 };
  var raf, lastTs;
  var pulseTimer = 0;

  // ── Config (recalculated on resize) ────────────────────────────────────────
  var CFG = {};

  function buildCfg() {
    var mobile = W < 768;
    CFG = {
      nodeCount:     mobile ? 42 : 72,
      maxDist:       mobile ? 130 : 175,
      baseSpeed:     0.32,
      nodeRadius:    1.5,
      lineAlpha:     0.11,
      mouseRadius:   160,
      mouseForce:    0.055,
      pulseInterval: 320,   // ms between spawns
      maxPulses:     22,
      pulseRadius:   7,
    };
  }

  // ── Resize ─────────────────────────────────────────────────────────────────
  function resize() {
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    var rect = hero.getBoundingClientRect();
    W = rect.width;
    H = rect.height;
    canvas.width  = Math.round(W * dpr);
    canvas.height = Math.round(H * dpr);
    canvas.style.width  = W + 'px';
    canvas.style.height = H + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    buildCfg();
  }

  // ── Node factory ────────────────────────────────────────────────────────────
  function makeNode() {
    var angle = Math.random() * Math.PI * 2;
    var speed = CFG.baseSpeed * (0.5 + Math.random() * 0.8);
    return {
      x:   Math.random() * W,
      y:   Math.random() * H,
      vx:  Math.cos(angle) * speed,
      vy:  Math.sin(angle) * speed,
      r:   CFG.nodeRadius + Math.random() * 1.2,
      rgb: Math.random() > 0.68 ? GOLD : WHITE,
      a:   0.22 + Math.random() * 0.42,
    };
  }

  // ── Init ──────────────────────────────────────────────────────────────────
  function init() {
    resize();
    nodes  = [];
    pulses = [];
    for (var i = 0; i < CFG.nodeCount; i++) nodes.push(makeNode());
  }

  // ── Pulse factory ──────────────────────────────────────────────────────────
  function trySpawnPulse() {
    for (var attempt = 0; attempt < 20; attempt++) {
      var i = (Math.random() * nodes.length) | 0;
      var j = (Math.random() * nodes.length) | 0;
      if (i === j) continue;
      var dx   = nodes[j].x - nodes[i].x;
      var dy   = nodes[j].y - nodes[i].y;
      var dist = Math.sqrt(dx * dx + dy * dy);
      if (dist < CFG.maxDist) {
        pulses.push({
          from: i,
          to:   j,
          t:    0,
          dur:  dist / 90 + 0.2,   // seconds to traverse
        });
        return;
      }
    }
  }

  // ── Update ────────────────────────────────────────────────────────────────
  function update(dt) {
    var n, dx, dy, d, f, s;

    for (var i = 0; i < nodes.length; i++) {
      n = nodes[i];

      // Mouse repulsion
      dx = n.x - mouse.x;
      dy = n.y - mouse.y;
      d  = Math.sqrt(dx * dx + dy * dy);
      if (d < CFG.mouseRadius && d > 0.5) {
        f = ((CFG.mouseRadius - d) / CFG.mouseRadius) * CFG.mouseForce;
        n.vx += (dx / d) * f;
        n.vy += (dy / d) * f;
      }

      // Integrate
      n.x += n.vx;
      n.y += n.vy;

      // Damping (air resistance feel)
      n.vx *= 0.982;
      n.vy *= 0.982;

      // Nudge if too slow
      s = Math.sqrt(n.vx * n.vx + n.vy * n.vy);
      if (s < CFG.baseSpeed * 0.2) {
        n.vx += (Math.random() - 0.5) * 0.15;
        n.vy += (Math.random() - 0.5) * 0.15;
      }

      // Speed cap
      if (s > CFG.baseSpeed * 3) {
        n.vx = (n.vx / s) * CFG.baseSpeed * 3;
        n.vy = (n.vy / s) * CFG.baseSpeed * 3;
      }

      // Soft wall bounce
      if (n.x < 0)  { n.x = 0;  n.vx =  Math.abs(n.vx) * 0.55; }
      if (n.x > W)  { n.x = W;  n.vx = -Math.abs(n.vx) * 0.55; }
      if (n.y < 0)  { n.y = 0;  n.vy =  Math.abs(n.vy) * 0.55; }
      if (n.y > H)  { n.y = H;  n.vy = -Math.abs(n.vy) * 0.55; }
    }

    // Pulses
    pulseTimer += dt * 1000;
    if (pulseTimer >= CFG.pulseInterval && pulses.length < CFG.maxPulses) {
      trySpawnPulse();
      pulseTimer = 0;
    }

    for (var k = pulses.length - 1; k >= 0; k--) {
      pulses[k].t += dt / pulses[k].dur;
      if (pulses[k].t >= 1) pulses.splice(k, 1);
    }
  }

  // ── Draw ──────────────────────────────────────────────────────────────────
  function draw() {
    ctx.clearRect(0, 0, W, H);

    var i, j, n, p, a, dx, dy, dist, g, px, py, fade;

    // ─ Connection lines ─
    ctx.lineWidth = 0.65;
    for (i = 0; i < nodes.length - 1; i++) {
      for (j = i + 1; j < nodes.length; j++) {
        dx   = nodes[i].x - nodes[j].x;
        dy   = nodes[i].y - nodes[j].y;
        dist = Math.sqrt(dx * dx + dy * dy);
        if (dist >= CFG.maxDist) continue;

        a = ((1 - dist / CFG.maxDist) * CFG.lineAlpha).toFixed(4);
        ctx.strokeStyle = 'rgba(' + GOLD[0] + ',' + GOLD[1] + ',' + GOLD[2] + ',' + a + ')';
        ctx.beginPath();
        ctx.moveTo(nodes[i].x, nodes[i].y);
        ctx.lineTo(nodes[j].x, nodes[j].y);
        ctx.stroke();
      }
    }

    // ─ Data pulses ─
    for (i = 0; i < pulses.length; i++) {
      p  = pulses[i];
      var fa = nodes[p.from];
      var fb = nodes[p.to];
      if (!fa || !fb) continue;

      dx   = fb.x - fa.x;
      dy   = fb.y - fa.y;
      dist = Math.sqrt(dx * dx + dy * dy);
      if (dist >= CFG.maxDist) continue; // nodes drifted apart

      px   = fa.x + dx * p.t;
      py   = fa.y + dy * p.t;
      fade = Math.sin(p.t * Math.PI); // smooth fade in/out

      g = ctx.createRadialGradient(px, py, 0, px, py, CFG.pulseRadius);
      g.addColorStop(0,    'rgba(' + GOLD[0]  + ',' + GOLD[1]  + ',' + GOLD[2]  + ',' + (0.92 * fade).toFixed(3) + ')');
      g.addColorStop(0.35, 'rgba(255,255,255,' + (0.55 * fade).toFixed(3) + ')');
      g.addColorStop(1,    'rgba(' + GOLD[0]  + ',' + GOLD[1]  + ',' + GOLD[2]  + ',0)');

      ctx.beginPath();
      ctx.arc(px, py, CFG.pulseRadius, 0, Math.PI * 2);
      ctx.fillStyle = g;
      ctx.fill();
    }

    // ─ Nodes ─
    for (i = 0; i < nodes.length; i++) {
      n = nodes[i];

      // Soft glow halo
      var haloR = n.r * 5.5;
      var halo  = ctx.createRadialGradient(n.x, n.y, 0, n.x, n.y, haloR);
      halo.addColorStop(0,   'rgba(' + n.rgb[0] + ',' + n.rgb[1] + ',' + n.rgb[2] + ',' + (n.a * 0.38).toFixed(3) + ')');
      halo.addColorStop(0.5, 'rgba(' + n.rgb[0] + ',' + n.rgb[1] + ',' + n.rgb[2] + ',' + (n.a * 0.08).toFixed(3) + ')');
      halo.addColorStop(1,   'rgba(' + n.rgb[0] + ',' + n.rgb[1] + ',' + n.rgb[2] + ',0)');

      ctx.beginPath();
      ctx.arc(n.x, n.y, haloR, 0, Math.PI * 2);
      ctx.fillStyle = halo;
      ctx.fill();

      // Core dot
      ctx.beginPath();
      ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(' + n.rgb[0] + ',' + n.rgb[1] + ',' + n.rgb[2] + ',' + n.a.toFixed(3) + ')';
      ctx.fill();
    }

    // ─ Bottom vignette — prevents network from looking like it's floating
    var vig = ctx.createLinearGradient(0, H * 0.65, 0, H);
    vig.addColorStop(0, 'rgba(30,27,25,0)');
    vig.addColorStop(1, 'rgba(30,27,25,0.6)');
    ctx.fillStyle = vig;
    ctx.fillRect(0, 0, W, H);
  }

  // ── Animation loop ────────────────────────────────────────────────────────
  function loop(ts) {
    var dt = (lastTs == null) ? 0.016 : Math.min((ts - lastTs) / 1000, 0.05);
    lastTs = ts;
    update(dt);
    draw();
    raf = requestAnimationFrame(loop);
  }

  // ── Events ────────────────────────────────────────────────────────────────
  hero.addEventListener('mousemove', function (e) {
    var rect = hero.getBoundingClientRect();
    mouse.x = e.clientX - rect.left;
    mouse.y = e.clientY - rect.top;
  }, { passive: true });

  hero.addEventListener('mouseleave', function () {
    mouse.x = -9999;
    mouse.y = -9999;
  });

  // Touch support
  hero.addEventListener('touchmove', function (e) {
    var rect = hero.getBoundingClientRect();
    var t = e.touches[0];
    mouse.x = t.clientX - rect.left;
    mouse.y = t.clientY - rect.top;
  }, { passive: true });

  // Pause when tab hidden — saves CPU
  document.addEventListener('visibilitychange', function () {
    if (document.hidden) {
      cancelAnimationFrame(raf);
    } else {
      lastTs = null;
      raf = requestAnimationFrame(loop);
    }
  });

  // Debounced resize
  var resizeTimer;
  window.addEventListener('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      cancelAnimationFrame(raf);
      init();
      lastTs = null;
      raf = requestAnimationFrame(loop);
    }, 200);
  }, { passive: true });

  // ── Start ─────────────────────────────────────────────────────────────────
  init();
  raf = requestAnimationFrame(loop);

})();
