<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Sign Up | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="loginz.css">
</head>
<body>
  <!-- Navigation -->
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

  <!-- Auth Section -->
  <section class="auth-section">
    <div class="container">
      <div class="auth-container">
        <div class="auth-sidebar">
          <h2>Join Our Community</h2>
          <p>Create an account to access exclusive features and connect with others on their health journey.</p>
          
          <ul class="auth-benefits">
            <li>Join disease-specific discussion forums</li>
            <li>Track your health progress</li>
            <li>Save favorite articles and resources</li>
            <li>Get personalized health recommendations</li>
            <li>Receive weekly health newsletters</li>
          </ul>
        </div>
        
        <div class="auth-forms">
          <div class="tabs">
            <div class="tab active" id="login-tab">Login</div>
            <div class="tab" id="signup-tab">Sign Up</div>
          </div>
          
          <div class="form-container active" id="login-form">
            <!-- Login Form -->
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="email" required>
              </div>
              
              <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required>
              </div>
              
              <div class="form-check">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember me</label>
              </div>
              
              <div class="forgot-password">
                <a href="#">Forgot password?</a>
              </div>
              
              <button type="submit" class="btn" style="width: 100%;">Login</button>
            </form>

            

            
            <div class="social-login">
              <p>Or login with</p>
              <div class="social-buttons">
                <a href="#" class="social-btn">f</a>
                <a href="#" class="social-btn">G</a>
                <a href="#" class="social-btn">in</a>
              </div>
            </div>
          </div>
          
          <div class="form-container" id="signup-form">
            <!-- Signup Form -->
            <form id="signup-form-element" action="signup.php" method="POST">
              <div class="form-group">
                <label for="signup-name">Full Name</label>
                <input type="text" id="signup-name" name="fullName" required>
              </div>
              
              <div class="form-group">
                <label for="signup-email">Email</label>
                <input type="email" id="signup-email" name="email" required>
              </div>
              
              <div class="form-group">
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="password" required>
              </div>
              
              <div class="form-group">
                <label for="signup-confirm">Confirm Password</label>
                <input type="password" id="signup-confirm" name="confirmPassword" required>
              </div>
              
              <div class="form-check">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
              </div>
              
              <button type="submit" class="btn" style="width: 100%;">Create Account</button>
            </form>
            <div class="social-login">
              <p>Or sign up with</p>
              <div class="social-buttons">
                <a href="#" class="social-btn">f</a>
                <a href="#" class="social-btn">G</a>
                <a href="#" class="social-btn">in</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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
        <p>&copy; 2025 Overcome Lifestyle. All rights reserved. | Medical Disclaimer: Information provided is for educational purposes only and is not a substitute for professional medical advice.</p>
      </div>
    </div>
  </footer>


  <script src="loginz.js"></script>
</body>
</html>