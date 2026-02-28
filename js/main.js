/* tauranga.ai — Main JS */

(function () {
  'use strict';

  // --- Sticky header ---
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = function () {
      header.classList.toggle('scrolled', window.scrollY > 40);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run on load in case page is pre-scrolled
  }

  // --- Mobile hamburger ---
  const hamburger = document.getElementById('nav-hamburger');
  const mobileMenu = document.getElementById('nav-mobile');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      const isOpen = mobileMenu.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', String(isOpen));
    });

    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // --- FAQ accordion ---
  document.querySelectorAll('.faq-item').forEach(function (item) {
    const btn = item.querySelector('.faq-question');
    if (!btn) return;
    btn.addEventListener('click', function () {
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function (i) {
        i.classList.remove('open');
      });
      if (!isOpen) item.classList.add('open');
    });
  });

  // --- Scroll reveal (IntersectionObserver) ---
  const revealEls = document.querySelectorAll('[data-reveal]');

  if (revealEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target); // fire once
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    revealEls.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // Fallback: show all immediately
    revealEls.forEach(function (el) {
      el.classList.add('in-view');
    });
  }

  // --- Form success/error messages ---
  const params = new URLSearchParams(window.location.search);
  const msgEl  = document.getElementById('form-message');
  if (msgEl) {
    if (params.get('sent') === '1') {
      msgEl.textContent = "Thanks — we'll be in touch within one business day.";
      msgEl.className = 'form-message success';
      msgEl.style.display = 'block';
    } else if (params.get('error') === '1') {
      msgEl.textContent = 'Something went wrong. Please try again or email us directly.';
      msgEl.className = 'form-message error';
      msgEl.style.display = 'block';
    }
  }

  // --- Smooth scroll for anchor links ---
  function smoothScrollTo(id) {
    const target = document.getElementById(id);
    if (!target) return;
    const top = target.getBoundingClientRect().top + window.scrollY - 88;
    window.scrollTo({ top: top, behavior: 'smooth' });
  }

  // Hash-only links (e.g. href="#contact")
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      const id = this.getAttribute('href').slice(1);
      if (document.getElementById(id)) {
        e.preventDefault();
        smoothScrollTo(id);
      }
    });
  });

  // Cross-page anchor links (e.g. href="/#contact") when on homepage
  const isHomepage = ['/', '/index.php', '/index.html'].includes(window.location.pathname);
  if (isHomepage) {
    document.querySelectorAll('a[href^="/#"]').forEach(function (a) {
      a.addEventListener('click', function (e) {
        const id = this.getAttribute('href').replace('/#', '');
        if (document.getElementById(id)) {
          e.preventDefault();
          smoothScrollTo(id);
        }
      });
    });
  }

})();
