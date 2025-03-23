<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eco Stalkers - Track & Reduce Your Carbon Footprint</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      /* Header Styles */
      .header {
        padding: 12px 48px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #2c3e50;
        height: 91px;
        background-color: #fff;
      }

      .logo-container {
        display: flex;
        align-items: center;
        gap: 7px;
      }

      .logo-symbol {
        color: #27ae60;
        font-size: 25.4px;
      }

      .logo-text {
        color: #2c3e50;
        font-size: 22.4px;
        font-weight: 700;
      }

      .nav-menu {
        display: flex;
        align-items: center;
        gap: 24px;
      }

      .nav-link {
        color: rgba(44, 62, 80, 0.8);
        font-size: 18px;
        text-decoration: none;
      }

      .cta-button {
        padding: 8px 16px;
        background: linear-gradient(102deg, #27ae60 0%, #219653 100%);
        color: #fff;
        border-radius: 4px;
        font-size: 20px;
        text-decoration: none;
      }

      /* Hero Section Styles */
      .hero-section {
        padding: 0 48px;
        display: flex;
        background: linear-gradient(111deg, #f6f9fc 0%, #e3f2fd 100%);
        height: 667px;
        align-items: center;
      }

      .hero-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 40px;
      }

      .hero-title {
        color: #2c3e50;
        font-size: 56px;
        font-weight: 700;
        line-height: 67.2px;
      }

      .hero-description {
        color: #596977;
        font-size: 19.2px;
        line-height: 31px;
        margin-top: 12px;
      }

      .hero-buttons {
        display: flex;
        gap: 10px;
        margin-top: 28px;
      }

      .primary-button {
        padding: 15px 25px;
        background: linear-gradient(102deg, #27ae60 0%, #219653 100%);
        color: #fff;
        border-radius: 30px;
        font-weight: 700;
        font-size: 16px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
      }

      .secondary-button {
        padding: 17px 27px;
        border: 2px solid #27ae60;
        color: #27ae60;
        border-radius: 30px;
        font-weight: 700;
        font-size: 16px;
        background: transparent;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
      }

      .hero-stats {
        display: flex;
        gap: 32px;
        margin-top: 40px;
      }

      .stat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .stat-value {
        color: #27ae60;
        font-size: 32px;
        font-weight: 700;
      }

      .stat-label {
        color: #7f8c8d;
        font-size: 14.4px;
        text-align: center;
      }

      .hero-image {
        width: 725px;
        height: 547px;
        border-radius: 72px 0;
      }

      /* Problem Section Styles */
      .problem-section {
        padding: 72px 48px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 32px;
      }

      .section-header {
        text-align: center;
        margin-bottom: 32px;
      }

      .section-title {
        color: #2c3e50;
        font-size: 35.2px;
        font-weight: 700;
        line-height: 56px;
      }

      .section-description {
        color: #7f8c8d;
        font-size: 16px;
        line-height: 25.6px;
      }

      .problem-cards {
        display: flex;
        gap: 31px;
      }

      .problem-card {
        padding: 28px 24px;
        flex: 1;
        border: 1px solid #2c3e50;
        border-radius: 18px;
        background-color: #f6f9fc;
      }

      .card-icon {
        width: 56px;
        height: 66px;
        margin-bottom: 12px;
      }

      .card-title {
        color: #2c3e50;
        font-size: 18.7px;
        font-weight: 700;
        margin-bottom: 8px;
      }

      .card-description {
        color: #596977;
        font-size: 16px;
        line-height: 25.6px;
      }

      /* Features Section Styles */
      .features-section {
        padding: 48px;
        background: linear-gradient(111deg, #f6f9fc 0%, #e3f2fd 100%);
      }

      .features-content {
        display: flex;
        gap: 20px;
        margin-top: 48px;
      }

      .features-image {
        flex: 1;
        height: 597px;
        border-radius: 72px 0;
      }

      .features-details {
        flex: 1;
      }

      .features-intro {
        margin-bottom: 28px;
      }

      .features-intro-title {
        color: #2c3e50;
        font-size: 28.8px;
        font-weight: 700;
        line-height: 46px;
      }

      .features-intro-description {
        color: #333;
        font-size: 16px;
        line-height: 25.6px;
        margin-top: 29px;
      }

      .features-list {
        display: flex;
        flex-direction: column;
        gap: 28px;
      }

      .feature-item {
        display: flex;
        align-items: center;
        gap: 22px;
      }

      .feature-icon {
        width: 58px;
        height: 58px;
        border-radius: 70px;
        font-size: 24px;
        background-color: rgba(39, 174, 96, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .feature-content-title {
        color: #2c3e50;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 12px;
      }

      .feature-content-description {
        color: #596977;
        font-size: 15.2px;
        line-height: 24px;
      }

      /* Testimonial Section Styles */
      .testimonial-section {
        padding: 96px 0;
        text-align: center;
        background-color: #fff;
      }

      .testimonial-quote {
        margin: 48px auto;
        color: #239c56;
        font-size: 32px;
        font-weight: 700;
        max-width: 682px;
      }

      .testimonial-author {
        display: flex;
        align-items: center;
        gap: 16px;
        justify-content: center;
        margin-top: 48px;
      }

      .author-image {
        width: 91px;
        height: 91px;
        border-radius: 999px;
      }

      .author-name {
        color: rgba(0, 0, 0, 0.8);
        font-family: Poppins, sans-serif;
        font-size: 22px;
      }

      .author-title {
        color: rgba(0, 0, 0, 0.4);
        font-family: Poppins, sans-serif;
        font-size: 22px;
      }

      /* CTA Section Styles */
      .cta-section {
        padding: 80px 10px;
        text-align: center;
        background-color: #239c56;
      }

      .cta-container {
        margin: 0 auto;
        max-width: 1200px;
      }

      .cta-title {
        color: #fff;
        font-size: 40px;
        font-weight: 700;
        line-height: 64px;
      }

      .cta-description {
        color: #fff;
        font-size: 19.2px;
        line-height: 31px;
        opacity: 0.9;
        margin-top: 20px;
      }

      .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 30px;
      }

      .cta-primary-button {
        padding: 15px 25px;
        color: #27ae60;
        border-radius: 30px;
        font-weight: 700;
        font-size: 16px;
        background-color: #fff;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
      }

      .cta-secondary-button {
        padding: 17px 27px;
        border: 2px solid #fff;
        color: #fff;
        border-radius: 30px;
        font-weight: 700;
        font-size: 16px;
        background: transparent;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
      }

      /* Footer Styles */
      .footer {
        padding: 60px 120px 29.78px;
        background-color: #2c3e50;
      }

      .footer-content {
        display: flex;
        justify-content: space-between;
      }

      .footer-company {
        max-width: 300px;
      }

      .footer-logo {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 20px;
      }

      .footer-logo-symbol {
        color: #27ae60;
        font-size: 24px;
      }

      .footer-logo-text {
        color: #fff;
        font-size: 24px;
        font-weight: 700;
      }

      .footer-description {
        color: rgba(255, 255, 255, 0.7);
        font-size: 16px;
        line-height: 25.6px;
      }

      .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
      }

      .social-link {
        width: 40px;
        height: 40px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.1);
      }

      .footer-links {
        display: flex;
        gap: 244px;
      }

      .footer-links-column-title {
        color: #fff;
        font-size: 19.2px;
        font-weight: 700;
        margin-bottom: 20px;
      }

      .footer-link {
        color: rgba(255, 255, 255, 0.7);
        font-size: 16px;
        margin-bottom: 17px;
        display: block;
        text-decoration: none;
      }

      .footer-copyright {
        color: rgba(255, 255, 255, 0.5);
        font-size: 14.4px;
        border-top: 2px solid rgba(255, 255, 255, 0.1);
        margin-top: 40px;
        padding-top: 34px;
        text-align: center;
      }

      /* Responsive Styles */
      @media (max-width: 991px) {
        .header {
          padding: 12px 24px;
        }

        .hero-section {
          flex-direction: column;
          height: auto;
          padding: 48px 24px;
          text-align: center;
        }

        .hero-content {
          align-items: center;
        }

        .hero-image {
          width: 100%;
          height: auto;
          margin-top: 40px;
        }

        .problem-cards {
          flex-direction: column;
        }

        .features-content {
          flex-direction: column;
        }

        .features-image {
          width: 100%;
        }

        .features-details {
          padding: 0 24px;
        }

        .footer {
          padding: 40px 24px;
        }

        .footer-content {
          flex-direction: column;
          gap: 40px;
        }

        .footer-links {
          flex-direction: column;
          gap: 40px;
        }
      }

      @media (max-width: 640px) {
        .nav-menu {
          display: none;
        }

        .hero-title {
          font-size: 40px;
          line-height: 48px;
        }

        .hero-description {
          font-size: 16px;
        }

        .hero-buttons {
          flex-direction: column;
          width: 100%;
        }

        .primary-button,
        .secondary-button {
          width: 100%;
        }

        .section-title {
          font-size: 28px;
        }

        .feature-item {
          flex-direction: column;
          text-align: center;
        }

        .cta-buttons {
          flex-direction: column;
        }

        .cta-primary-button,
        .cta-secondary-button {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header Section -->
    <header class="header">
      <div class="logo-container">
        <span class="logo-symbol">✱</span>
        <span class="logo-text">Eco Stalkers</span>
      </div>
      <nav class="nav-menu">
        <a href="#features" class="nav-link">Features</a>
        <a href="#problem" class="nav-link">The Problem</a>
        <a href="#solution" class="nav-link">Our Solution</a>
        <a href="#about" class="nav-link">About Us</a>
        <a href="login.php" class="cta-button">Get Started</a>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <div>
          <h1 class="hero-title">
            Track &amp; Reduce Your<br />
            Carbon Footprint
          </h1>
          <p class="hero-description">
            Take control of your environmental impact with our intuitive
            carbon<br />
            emission tracker. Monitor, analyze, and reduce your carbon
            footprint<br />
            with personalized insights.
          </p>
        </div>
        <div class="hero-buttons">
          <a href="#" class="primary-button">Start Tracking Now</a>
          <a href="#" class="secondary-button">Watch Demo</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <span class="stat-value">1+</span>
            <span class="stat-label">Active Users</span>
          </div>
          <div class="stat-item">
            <span class="stat-value">15%</span>
            <span class="stat-label">Average Emission Reduction</span>
          </div>
          <div class="stat-item">
            <span class="stat-value">5kg+</span>
            <span class="stat-label">CO₂ Tons Saved</span>
          </div>
        </div>
      </div>
      <img
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/5608a1b8d19398ccd523a4ea54518f336bd9a451"
        alt="Hero image"
        class="hero-image"
      />
    </section>

    <!-- Problem Section -->
    <section id="problem" class="problem-section">
      <div class="section-header">
        <h2 class="section-title">The Carbon Crisis</h2>
        <p class="section-description">
          Excessive carbon emissions are causing serious environmental<br />
          problems that affect everyone on our planet.
        </p>
      </div>
      <div class="problem-cards">
        <article class="problem-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f9de169b7ef728f17beee110cd8d3f5ee0c705c"
            alt="Sea level rise icon"
            class="card-icon"
          />
          <h3 class="card-title">Sea Level Rise</h3>
          <p class="card-description">
            Melting ice caps and thermal expansion due to warming oceans are
            causing sea levels to rise, threatening coastal communities and
            ecosystems around the world.
          </p>
        </article>
        <article class="problem-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/58729be838d27311433f2d5fc0f65f9466bb1de9"
            alt="Rising temperatures icon"
            class="card-icon"
          />
          <h3 class="card-title">Rising Global Temperatures</h3>
          <p class="card-description">
            Carbon emissions trap heat in our atmosphere, causing global
            temperatures to rise at an alarming rate. This leads to more
            frequent and intense heatwaves, droughts, and extreme weather
            events.
          </p>
        </article>
        <article class="problem-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/94709bc6098deb03571eafa9feab33439a63ef9c"
            alt="Extreme weather icon"
            class="card-icon"
          />
          <h3 class="card-title">Extreme Weather Events</h3>
          <p class="card-description">
            Climate change is increasing the frequency and severity of
            hurricanes, floods, wildfires, and other natural disasters, leading
            to loss of life and billions in damage.
          </p>
        </article>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
      <div class="section-header">
        <h2 class="section-title">What we offer to Nature Lovers</h2>
        <p class="section-description">
          Eco Stalkers provides a comprehensive carbon tracking system that
          helps<br />
          you understand and reduce your environmental impact.
        </p>
      </div>
      <div class="features-content">
        <img
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/f6c8b1929bfdcebc0662397af1edef6e75628adb"
          alt="Features illustration"
          class="features-image"
        />
        <div class="features-details">
          <div class="features-intro">
            <h3 class="features-intro-title">
              Personal Carbon Tracking Made<br />
              Simple
            </h3>
            <p class="features-intro-description">
              Our intuitive platform gives you detailed insights into your
              carbon footprint<br />
              across all aspects of your life. We make it easy to understand
              your impact and<br />
              take meaningful action.
            </p>
          </div>
          <div class="features-list">
            <article class="feature-item">
              <div class="feature-icon">📊</div>
              <div>
                <h4 class="feature-content-title">Real-time Tracking</h4>
                <p class="feature-content-description">
                  Monitor your daily carbon emissions from transportation, home
                  energy<br />
                  use, food consumption, and more.
                </p>
              </div>
            </article>
            <article class="feature-item">
              <div class="feature-icon">🎯</div>
              <div>
                <h4 class="feature-content-title">Personalized Goals</h4>
                <p class="feature-content-description">
                  Set achievable reduction targets based on your lifestyle and
                  track your<br />
                  progress over time.
                </p>
              </div>
            </article>
            <article class="feature-item">
              <div class="feature-icon">💡</div>
              <div>
                <h4 class="feature-content-title">Actionable Insights</h4>
                <p class="feature-content-description">
                  Receive custom recommendations for reducing your footprint
                  that fit your<br />
                  specific situation.
                </p>
              </div>
            </article>
            <article class="feature-item">
              <div class="feature-icon">👥</div>
              <div>
                <h4 class="feature-content-title">Community Support</h4>
                <p class="feature-content-description">
                  Connect with like-minded individuals, share tips, and
                  participate in<br />
                  challenges to stay motivated.
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials" class="testimonial-section">
      <div class="section-header">
        <h2 class="section-title">Look, What heroes say!</h2>
        <p class="section-description">
          Eco Stalkers provides a comprehensive carbon tracking system that
          helps<br />
          you understand and reduce your environmental impact.
        </p>
      </div>
      <blockquote class="testimonial-quote">
        Eco Stalkers has transformed the way I manage my carbon footprint. It's
        intuitive and incredibly insightful.
      </blockquote>
      <div class="testimonial-author">
        <img
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/c12bec6e4a9c1a4df32d84f8fef00be75ca470bc"
          alt="Author profile"
          class="author-image"
        />
        <div>
          <p class="author-name">Fahadh Faasil</p>
          <p class="author-title">Indian Actor</p>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section id="get-started" class="cta-section">
      <div class="cta-container">
        <h2 class="cta-title">Let's Reduce Carbon Footprint Together!</h2>
        <p class="cta-description">
          Join thousands of environmentally conscious individuals making a<br />
          difference. Start tracking your carbon emissions today.
        </p>
        <div class="cta-buttons">
          <a href="login.php" class="cta-primary-button">Get Started for Free</a>
          <a href="#" class="cta-secondary-button">Contact Us</a>
        </div>
      </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-company">
          <div class="footer-logo">
            <span class="footer-logo-symbol">✱</span>
            <span class="footer-logo-text">Eco Stalkers</span>
          </div>
          <p class="footer-description">
            Making carbon reduction accessible and<br />
            actionable for everyone. Together, we can<br />
            create a more sustainable future.
          </p>
          <div class="social-links">
            <a href="#" class="social-link"></a>
            <a href="#" class="social-link"></a>
            <a href="#" class="social-link"></a>
          </div>
        </div>
        <div class="footer-links">
          <div>
            <h3 class="footer-links-column-title">Company</h3>
            <a href="#" class="footer-link">About Us</a>
            <a href="#" class="footer-link">Our Mission</a>
            <a href="#" class="footer-link">Blog</a>
            <a href="#" class="footer-link">Careers</a>
          </div>
          <div>
            <h3 class="footer-links-column-title">Resources</h3>
            <a href="#" class="footer-link">Help Center</a>
            <a href="#" class="footer-link">Privacy Policy</a>
            <a href="#" class="footer-link">Terms of Service</a>
            <a href="#" class="footer-link">FAQs</a>
          </div>
          <div>
            <h3 class="footer-links-column-title">Contact</h3>
            <a href="#" class="footer-link">Support</a>
            <a href="#" class="footer-link">Partnerships</a>
            <a href="#" class="footer-link">Media Inquiries</a>
            <a href="#" class="footer-link">Contact Us</a>
          </div>
        </div>
      </div>
      <p class="footer-copyright">© 2025 Eco Stalkers. All rights reserved.</p>
    </footer>
  </body>
</html>
