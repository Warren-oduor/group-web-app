<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resources | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="overcomelife.css">
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
            <a href="loginz.php" class="btn">Login / Sign Up</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </header>

  <section class="page-header">
    <div class="container">
      <h1>Resources</h1>
      <p>Find helpful articles, videos, and expert advice on lifestyle diseases.</p>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      <h2>Educational Materials</h2>
      <p>Access a variety of guides, eBooks, and research materials.</p>
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
            <li><a href="forums-cardiovascular.html">Cardiovascular Disease</a></li>
            <li><a href="forums-diabetes.html">Type 2 Diabetes</a></li>
            <li><a href="forums-obesity.html">Obesity</a></li>
            <li><a href="forums-hypertension.html">Hypertension</a></li>
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
        <p>&copy; 2025 Overcome Lifestyle. All rights reserved. | Medical Disclaimer: Information provided is for educational purposes only and is not a substitute for professional medical advice.</p>
      </div>
    </div>
  </footer>

</body>
</html>


