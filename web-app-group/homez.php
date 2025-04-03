<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="overcomelife.css">
  <style>
    .hero-section {
      background: linear-gradient(135deg, #2d8a60 0%, #1c5e3f 100%); /* Gradient vibe */
      color: #fff;
      padding: 80px 0;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .hero-section h1 {
      font-size: 3rem;
      margin: 0 0 20px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    .hero-section p {
      font-size: 1.5rem;
      margin: 0 0 30px;
      opacity: 0.9;
    }
    .hero-section .btn {
      background: #fff;
      color: #1e90ff;
      padding: 12px 30px;
      font-size: 1.2rem;
      border-radius: 25px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .hero-section .btn:hover {
      background: #00ced1;
      color: #fff;
      transform: translateY(-3px);
    }

    /* About Section */
    .about-section {
      background: #f9f9f9;
      padding: 60px 0;
      text-align: center;
    }
    .about-section h2 {
      font-size: 2.5rem;
      color: #333;
      margin-bottom: 20px;
      position: relative;
    }
    .about-section h2::after {
      content: '';
      width: 50px;
      height: 3px;
      background: #1e90ff;
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
    }
    .about-section p {
      font-size: 1.2rem;
      color: #666;
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Features Section */
    .features-section {
      padding: 60px 0;
      background: #fff;
    }
    .features-section h2 {
      font-size: 2.5rem;
      color: #333;
      text-align: center;
      margin-bottom: 40px;
    }
    .features {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }
    .feature {
      flex: 1;
      min-width: 280px;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      text-align: center;
      transition: transform 0.3s ease;
    }
    .feature:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    .feature h3 {
      font-size: 1.8rem;
      color: #1e90ff;
      margin-bottom: 15px;
    }
    .feature p {
      font-size: 1.1rem;
      color: #777;
      line-height: 1.5;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .hero-section { padding: 50px 0; }
      .hero-section h1 { font-size: 2rem; }
      .hero-section p { font-size: 1.2rem; }
      .about-section { padding: 40px 0; }
      .about-section h2 { font-size: 2rem; }
      .features-section { padding: 40px 0; }
      .features { flex-direction: column; align-items: center; }
      .feature { margin-bottom: 20px; }
    }
    .disease-section { display: flex; align-items: center; margin: 40px 0; }
    .disease-photo { flex: 1; max-width: 50%; }
    .disease-photo img { width: 100%; height: auto; object-fit: cover; }
    .disease-text { flex: 1; padding: 20px; }
    .disease-text h3 { margin-top: 0; }
    .disease-text a { color: #007bff; text-decoration: none; }
    .disease-text a:hover { text-decoration: underline; }
    @media (max-width: 768px) {
      .disease-section { flex-direction: column; }
      .disease-photo { max-width: 100%; }
    }
  </style>
</head>
<body>
  <header class="navbar">
    <div class="container nav-container">
      <div class="logo">Overcome<span>Lifestyle</span></div>
      <ul class="nav-links">
        <li><a href="homez.php">Home</a></li>
        <li><a href="mainz.php">Forums</a></li>
        <li><a href="prevention.php">Prevention</a></li>
        <li><a href="resources.php">Resources</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li id="login-status">
          <?php if ($isLoggedIn): ?>
            <a href="logout.php" class="btn">Logout</a>
          <?php else: ?>
            <a href="loginz.html" class="btn">Login / Sign Up</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </header>

  <section class="hero-section">
    <div class="container">
      <h1>Welcome to Overcome Lifestyle</h1>
      <p>Your community for healthy living, prevention, and support.</p>
      <a href="prevention.php" class="btn">Get Started</a>
    </div>
  </section>

  <section class="about-section">
    <div class="container">
      <h2>About Us</h2>
      <p>Overcome Lifestyle is dedicated to helping individuals prevent and manage chronic diseases through knowledge, community, and resources.</p>
    </div>
  </section>

  <section class="features-section">
    <div class="container">
      <h2>What We Offer</h2>
      <div class="features">
        <div class="feature">
          <h3>Community Support</h3>
          <p>Join discussions and share experiences with others facing similar challenges.</p>
        </div>
        <div class="feature">
          <h3>Prevention Strategies</h3>
          <p>Learn how to adopt a healthier lifestyle to reduce your risk of chronic diseases.</p>
        </div>
        <div class="feature">
          <h3>Expert Resources</h3>
          <p>Access articles, guides, and research-backed insights from health professionals.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="disease-highlights">
    <div class="container">
      <h2>Our Focus: Lifestyle Diseases</h2>

      <div class="disease-section">
        <div class="disease-photo">
          <img src="images/cardiovascular.webp" alt="Cardiovascular Health">
        </div>
        <div class="disease-text">
          <h3>Cardiovascular Disease</h3>
          <p>Heart health matters, rudeboy. We’re talkin’ about keepin’ your ticker strong. Preventive steps: eat low-fat vibes, move your body 30 minutes most days, ditch the smokes, and chill the stress. Join the <a href="forums-cardiovascular.php">Cardiovascular Forum</a> to chat more.</p>
        </div>
      </div>

      <div class="disease-section">
        
        <div class="disease-text">
          <h3>Type 2 Diabetes</h3>
          <p>Control that sugar, fam. It’s about livin’ sweet without the spikes. Prevent it with a healthy weight, high-fiber eats, regular exercise, and checkin’ your levels. Drop into the <a href="forums-diabetes.php">Diabetes Forum</a> for the real talk.</p>
        </div>
        <div class="disease-photo">
          <img src="images/diabetes.jpeg" alt="Diabetes Management">
        </div>
      </div>

      <div class="disease-section">
        <div class="disease-photo">
          <img src="images/obesity.jpeg" alt="Obesity Management">
        </div>
        <div class="disease-text">
          <h3>Obesity</h3>
          <p>Get that weight in check, brudda. It’s all about feelin’ good inside and out. Prevention be eatin’ balanced with plenty greens, sweatin’ daily, cuttin’ junk, and good sleep. Hit the <a href="forums-obesity.php">Obesity Forum</a> for support.</p>
        </div>
      </div>

      <div class="disease-section">
        
        <div class="disease-text">
          <h3>Hypertension</h3>
          <p>Keep that pressure down, rudeboy. High blood pressure ain’t no joke. Prevent it by droppin’ salt, stayin’ active, easin’ stress with some calm vibes, and watchin’ the liquor. Check the <a href="forums-hypertension.php">Hypertension Forum</a> for more.</p>
        </div>
        <div class="disease-photo">
          <img src="images/hypertension.jpeg" alt="Hypertension Control">
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <h4>About Overcome Lifestyle</h4>
          <p>We are dedicated to providing accurate, evidence-based information to help people understand, prevent, and manage lifestyle diseases for a healthier life.</p>
        </div>
        <div class="footer-col">
          <h4>Diseases</h4>
          <ul class="footer-links">
            <li><a href="forums-cardiovascular.php">Cardiovascular Disease</a></li>
            <li><a href="forums-diabetes.php">Type 2 Diabetes</a></li>
            <li><a href="forums-obesity.php">Obesity</a></li>
            <li><a href="forums-hypertension.php">Hypertension</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Resources</h4>
          <ul class="footer-links">
            <li><a href="#">Educational Guides</a></li>
            <li><a href="#">Assessment Tools</a></li>
            <li><a href="#">Meal Plans</a></li>
            <li><a href="#">Exercise Programs</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Contact</h4>
          <ul class="footer-links">
            <li>info@overcomelifestyle.com</li>
            <li>(555) 123-4567</li>
            <li>Follow us on social media</li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        <p>© 2025 Overcome Lifestyle. All rights reserved. | Medical Disclaimer: Information provided is for educational purposes only and is not a substitute for professional medical advice.</p>
      </div>
    </div>
  </footer>
</body>
</html>