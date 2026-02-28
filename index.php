<?php
$page_title       = 'tauranga.ai — AI Automation &amp; Training for NZ Businesses';
$meta_description = 'tauranga.ai helps New Zealand small businesses save time and reduce costs with practical AI automation and hands-on AI training. Book a free consultation today.';
?>
<!DOCTYPE html>
<html lang="en-NZ">
<head>
  <title><?php echo $page_title; ?></title>
  <?php include 'includes/head.php'; ?>
</head>
<body>

<?php include 'includes/header.php'; ?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero">
  <canvas id="hero-canvas" aria-hidden="true"></canvas>
  <div class="hero-bg-word" aria-hidden="true">tauranga</div>

  <div class="hero-aside" aria-hidden="true">
    <div class="hero-aside-line"></div>
    <span class="hero-aside-text">tauranga.ai</span>
    <div class="hero-aside-line"></div>
  </div>

  <div class="container">
    <div class="hero-content" data-reveal>
      <span class="kicker">NZ AI Consultancy</span>
      <h1>AI is changing business.<br><em>We'll help yours<br>keep up.</em></h1>
      <div class="hero-rule"></div>
      <p>Practical AI automation and training for New Zealand small businesses — no jargon, no hype, no six-figure consulting bills.</p>
      <div class="hero-cta">
        <a href="#contact" class="btn btn-gold">Book a Free Consultation</a>
        <a href="#services" class="btn btn-ghost">See What We Do</a>
      </div>
    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <span class="hero-scroll-label">Scroll</span>
    <div class="hero-scroll-track"></div>
  </div>
</section>

<!-- ============================================================
     STATS — EDITORIAL LIST
     ============================================================ -->
<section class="stats" id="stats">
  <div class="container">
    <div class="stats-header" data-reveal>
      <div>
        <span class="kicker">The Reality for NZ SMBs</span>
        <h2>Your competitors<br>are already using AI.</h2>
      </div>
      <p>Most NZ small businesses know they should be doing something with AI. Very few know where to start — or who to trust with it.</p>
    </div>

    <div class="stats-list">
      <div class="stat-row" data-reveal>
        <span class="stat-index">01</span>
        <div class="stat-figure">11<small>hrs</small></div>
        <p>The average time a small business owner spends each week on tasks that AI can fully automate — quoting, follow-ups, admin, scheduling.</p>
      </div>

      <div class="stat-row" data-reveal data-delay="1">
        <span class="stat-index">02</span>
        <div class="stat-figure">72<small>%</small></div>
        <p>Of NZ SMBs say they know AI could help their business — but don't know where to start or who to trust with it.</p>
      </div>

      <div class="stat-row" data-reveal data-delay="2">
        <span class="stat-index">03</span>
        <div class="stat-figure">3<small>×</small></div>
        <p>Businesses using AI automation are growing up to three times faster than those still doing everything manually.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SERVICES
     ============================================================ -->
<section class="services" id="services">
  <div class="container">
    <div class="services-header" data-reveal>
      <span class="kicker">What We Do</span>
      <h2>Two ways we help<br>your business</h2>
    </div>

    <div class="services-grid">

      <!-- AI Automation — dark card -->
      <div class="service-card" data-reveal>
        <div class="service-icon">
          <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27 5l-4 4-4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23 9V5M5 16C5 9.925 9.925 5 16 5h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M5 27l4-4 4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 23v4M27 16c0 6.075-4.925 11-11 11H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </div>
        <h3>AI Automation</h3>
        <p>We map out where your business is wasting time on repetitive tasks, then build AI-powered automations that handle them for you — so you can focus on the work that actually grows your business.</p>
        <ul class="service-list">
          <li>Quote and proposal generation</li>
          <li>Client follow-up and email triage</li>
          <li>Appointment reminders and scheduling</li>
          <li>Invoice chasing and admin workflows</li>
          <li>Marketing content creation</li>
          <li>Data entry and reporting</li>
        </ul>
        <a href="#contact" class="btn btn-gold">Book a Free Consultation</a>
      </div>

      <!-- AI Training — light card -->
      <div class="service-card" data-reveal data-delay="1">
        <div class="service-icon">
          <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 12l13-7 13 7-13 7-13-7z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M9 15.5v8c0 2.761 3.134 5 7 5s7-2.239 7-5v-8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M29 12v8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </div>
        <h3>AI Training</h3>
        <p>Half-day workshops for small business owners and their teams. We teach you exactly how to use AI tools in your day-to-day work — practical, hands-on, and relevant to your industry.</p>
        <ul class="service-list">
          <li>Hands-on AI tools training (ChatGPT, Claude, and more)</li>
          <li>Marketing copy and content creation</li>
          <li>Customer communication templates</li>
          <li>Using AI for research and planning</li>
          <li>NZ privacy law and responsible AI use</li>
          <li>Group or one-on-one sessions available</li>
        </ul>
        <a href="#contact" class="btn">Book a Free Consultation</a>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     INDUSTRIES — HORIZONTAL LIST
     ============================================================ -->
<section class="industries" id="industries">
  <div class="container">
    <div class="section-header" data-reveal>
      <span class="kicker">Industries We Work With</span>
      <h2>AI that fits your industry</h2>
    </div>

    <div class="industries-list">
      <a href="/trades.php" class="industry-row" data-reveal>
        <div class="industry-initial">T</div>
        <div class="industry-row-body">
          <h3>Trades</h3>
          <p>Less admin, more tools-on time. Automate your quotes, job scheduling, follow-ups, and invoicing.</p>
        </div>
        <span class="industry-row-link">Learn more</span>
      </a>

      <a href="/dentists.php" class="industry-row" data-reveal data-delay="1">
        <div class="industry-initial">D</div>
        <div class="industry-row-body">
          <h3>Dentists</h3>
          <p>Reduce no-shows, recapture lapsed patients, and take the burden off your front desk with smart automations.</p>
        </div>
        <span class="industry-row-link">Learn more</span>
      </a>

      <a href="/accountants.php" class="industry-row" data-reveal data-delay="2">
        <div class="industry-initial">A</div>
        <div class="industry-row-body">
          <h3>Accountants</h3>
          <p>Spend less time chasing documents and drafting reports — and more time on the advice clients actually pay for.</p>
        </div>
        <span class="industry-row-link">Learn more</span>
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
     WHY US
     ============================================================ -->
<section class="why-us" id="why-us">
  <div class="container">
    <div class="why-grid">
      <div class="why-content" data-reveal>
        <span class="kicker">Why tauranga.ai</span>
        <h2>Practical AI help — from people who understand NZ business</h2>
        <p>We're not a global consulting firm charging global consulting rates. We're a NZ-based team that works directly with small businesses like yours — understanding your budget, your time constraints, and what actually works in the New Zealand market.</p>

        <div class="why-points">
          <div class="why-point">
            <div class="why-point-num">01</div>
            <div class="why-point-text">
              <h4>Based in New Zealand</h4>
              <p>We understand NZ business culture, NZ privacy law, and what works for Kiwi SMBs — not theory borrowed from the US market.</p>
            </div>
          </div>
          <div class="why-point">
            <div class="why-point-num">02</div>
            <div class="why-point-text">
              <h4>No fluff, no hype</h4>
              <p>We won't oversell AI or promise the world. We'll show you exactly what it can do for your specific situation — and what it can't.</p>
            </div>
          </div>
          <div class="why-point">
            <div class="why-point-num">03</div>
            <div class="why-point-text">
              <h4>Fast, practical results</h4>
              <p>Our automations use tools you may already have. No new software stacks, no months-long projects. We get moving fast.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="why-visual" data-reveal data-delay="1">
        <p class="why-visual-quote">"Most of our clients save <strong>half a day per week</strong> within the first month — without changing the way their business fundamentally works."</p>
        <div class="why-stat">
          <strong>100%</strong>
          <span>NZ-based team and support</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     FAQ
     ============================================================ -->
<section class="faq" id="faq">
  <div class="container">
    <div class="faq-inner">
      <div class="faq-header" data-reveal>
        <span class="kicker">Common Questions</span>
        <h2>Things people ask before they call</h2>
        <p>Honest answers. No marketing spin.</p>
      </div>

      <div class="faq-list" data-reveal data-delay="1">
        <div class="faq-item">
          <button class="faq-question">
            Is AI actually right for a small business like mine?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>Almost certainly — if you're spending time on repetitive tasks like emails, quotes, follow-ups, or reports. AI doesn't need to be flashy to be useful. Even small automations that save an hour a day add up to hundreds of hours a year. We start with a free consultation to find the highest-impact opportunities specific to your business.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">
            How much does it cost?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>We don't publish fixed pricing because every business is different. What we can tell you is that we're priced for NZ small businesses — not enterprise clients. The free consultation gives us both a chance to understand what's needed and whether it makes financial sense before you commit to anything.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">
            Will AI replace my staff?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>That's not how we approach it. AI works best as a tool that handles low-value, time-consuming work — so your people can focus on the high-value stuff that needs a human. Most of our clients find their team becomes more effective, not redundant.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">
            What about data privacy under NZ law?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>We take this seriously. We only recommend tools that comply with the NZ Privacy Act 2020, and we're upfront about what data AI tools use and how. We'll never recommend a solution that puts your clients' information at risk. Our training workshops include a dedicated section on responsible AI use and NZ privacy obligations.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">
            How long does it take to see results?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>Most automations can be built and running within a few weeks. For training workshops, your team walks away on the day with tools they can use immediately. We're not a 6-month consulting engagement — we get practical results moving as fast as possible.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">
            Do I need any technical knowledge?
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-answer">
            <p>None at all. We handle the technical side of automations entirely. For training, we start from scratch and pitch the content to the level of your team — whether that's complete beginners or people who've already been experimenting with AI on their own.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
<section class="contact" id="contact">
  <div class="container">
    <div class="contact-inner">
      <div class="contact-info" data-reveal>
        <span class="kicker">Get in Touch</span>
        <h2>Book a free<br>consultation</h2>
        <p>Not sure where to start? That's exactly what the consultation is for. We'll spend 30 minutes understanding your business, then tell you honestly where AI can help — and where it can't.</p>
        <p>No sales pitch. No obligation. Just a straightforward conversation.</p>

        <div class="contact-meta">
          <div class="contact-meta-item">
            <span class="contact-meta-label">Location</span>
            <span class="contact-meta-val">NZ-wide — remote consultations available</span>
          </div>
          <div class="contact-meta-item">
            <span class="contact-meta-label">Response</span>
            <span class="contact-meta-val">Within one business day</span>
          </div>
        </div>
      </div>

      <div class="contact-form" data-reveal data-delay="1">
        <div id="form-message" class="form-message" style="display:none;"></div>

        <form action="/form-handler.php" method="POST">
          <input type="hidden" name="referrer" value="/">
          <div class="hp-field">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Your Name *</label>
            <input type="text" id="name" name="name" placeholder="Jane Smith" required>
          </div>

          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" placeholder="jane@yourcompany.co.nz" required>
          </div>

          <div class="form-group">
            <label for="biz">Business Name</label>
            <input type="text" id="biz" name="biz" placeholder="Smith Plumbing Ltd">
          </div>

          <div class="form-group">
            <label for="type">I'm interested in</label>
            <select id="type" name="type">
              <option value="">Select an option</option>
              <option value="AI Automation">AI Automation</option>
              <option value="AI Training">AI Training Workshop</option>
              <option value="Both">Both — not sure yet</option>
              <option value="General enquiry">Just exploring</option>
            </select>
          </div>

          <div class="form-group">
            <label for="message">Tell us about your business *</label>
            <textarea id="message" name="message" placeholder="What does your business do? What tasks take up the most time?" required></textarea>
          </div>

          <div class="form-submit">
            <button type="submit" class="btn btn-gold">Send Enquiry</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="/js/hero-canvas.js"></script>
</body>
</html>
