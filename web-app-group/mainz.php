<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forums | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="overcomelife.css">
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

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Community Forums</h1>
      <p>Connect with others, share experiences, and learn from those on similar health journeys. Our forums provide support and information for those dealing with lifestyle diseases.</p>
    </div>
  </section>

  <!-- Forums Section -->
  <section class="forums-section">
    <div class="container forums-container">
      <!-- Sidebar -->
      <div class="forums-sidebar">
        <div class="sidebar-section">
          <h3 class="sidebar-header">Disease Forums</h3>
          <ul class="sidebar-links">
            <li><a href="forums-cardiovascular.html" class="active">
              <span>Cardiovascular Disease</span>
            </a></li>
            <li><a href="forums-diabetes.html" class="active">
              <span>Type 2 Diabetes</span>
            </a></li>
            <li><a href="forums-obesity.html" class="active">
              <span>Obesity</span>
            </a></li>
            <li><a href="forums-hypertension.html" class="active">
              <span>Hypertension</span>
            </a></li>
            <li><a href="forums-stress.html" class="active">
              <span>Stress & Mental Health</span>
            </a></li>
          </ul>
        </div>
        
        <div class="sidebar-section">
          <h3 class="sidebar-header">Support</h3>
          <ul class="sidebar-links">
            <li><a href="#">
              <span>Getting Started</span>
            </a></li>
            <li><a href="#">
              <span>Forum Guidelines</span>
            </a></li>
            <li><a href="#">
              <span>FAQ</span>
            </a></li>
            <li><a href="#">
              <span>Contact Moderators</span>
            </a></li>
          </ul>
        </div>
      </div>
      
      <!-- Forum Categories -->
      <div class="forum-content">
        <div class="forum-categories">
          <div class="forum-category">
            <div class="category-header">
              <div class="category-icon">❤️</div>
              <div class="category-info">
                <h3>Cardiovascular Disease</h3>
                <div class="category-stats">
                  <div>Topics: 253</div>
                  <div>Posts: 2,500</div>
                  <div>Members: 512</div>
                </div>
              </div>
            </div>
            <div class="category-content">
              <p class="category-description">Discuss heart conditions, share experiences with treatments, and connect with others managing cardiovascular diseases.</p>
              <h4>Popular Topics:</h4>
              <ul class="popular-topics">
                <li><a href="forums-cardiovascular.php">Managing Cholesterol Naturally</a></li>
                <li><a href="forums-cardiovascular.html">Post-Heart Attack Recovery</a></li>
                <li><a href="forums-cardiovascular.html">Exercise Plans for Heart Patients</a></li>
              </ul>
            </div>
            <div class="category-footer">
              <a href="forums-cardiovascular.php" class="btn">Visit Forum</a>
            </div>
          </div>
          
          <div class="forum-category">
            <div class="category-header">
              <div class="category-icon">🍬</div>
              <div class="category-info">
                <h3>Type 2 Diabetes</h3>
                <div class="category-stats">
                  <div>Topics: 347</div>
                  <div>Posts: 2,456</div>
                  <div>Members: 689</div>
                </div>
              </div>
            </div>
            <div class="category-content">
              <p class="category-description">Share insights about managing blood sugar, diabetes treatments, and lifestyle adaptations for living well with diabetes.</p>
              <h4>Popular Topics:</h4>
              <ul class="popular-topics">
                <li><a href="forums-diabetes.html">Low-Carb Diet Success Stories</a></li>
                <li><a href="forums-diabetes.html">Glucose Monitoring Tips</a></li>
                <li><a href="forums-diabetes.html"><li>Best Exercises for Diabetics</a></li>
              </ul>
            </div>
            <div class="category-footer">
              <a href="forums-diabetes.html" class="btn">Visit Forum</a>
            </div>
          </div>
          <div class="forum-category">
    <div class="category-header">
        <div class="category-icon">⚖️</div>
        <div class="category-info">
            <h3>Obesity Management</h3>
            <div class="category-stats">
                <div>Topics: 412</div>
                <div>Posts: 3,187</div>
                <div>Members: 945</div>
            </div>
        </div>
    </div>
    <div class="category-content">
        <p class="category-description">Share strategies for weight management, healthy lifestyle changes, nutrition insights, and supportive approaches to achieving and maintaining a healthy weight.</p>
        <h4>Popular Topics:</h4>
        <ul class="popular-topics">
            <li><a href="forums-obesity.html">Sustainable Weight Loss Journeys</a></li>
            <li><a href="forums-obesity.html">Nutrition and Meal Planning</a></li>
            <li><a href="forums-obesity.html">Effective Exercise Routines</a></li>
        </ul>
    </div>
    <div class="category-footer">
        <a href="forums-obesity.html" class="btn">Visit Forum</a>
    </div>
</div>
<div class="forum-category">
    <div class="category-header">
        <div class="category-icon">❤️</div>
        <div class="category-info">
            <h3>Hypertension Management</h3>
            <div class="category-stats">
                <div>Topics: 276</div>
                <div>Posts: 1,942</div>
                <div>Members: 512</div>
            </div>
        </div>
    </div>
    <div class="category-content">
        <p class="category-description">Connect with others to discuss blood pressure control, heart-healthy lifestyle strategies, medication insights, and holistic approaches to managing hypertension.</p>
        <h4>Popular Topics:</h4>
        <ul class="popular-topics">
            <li><a href="forums-hypertension.html">Natural Blood Pressure Reduction</a></li>
            <li><a href="forums-hypertension.html">Medication Management Tips</a></li>
            <li><a href="forums-hypertension.html">Heart-Healthy Diet Strategies</a></li>
        </ul>
    </div>
    <div class="category-footer">
        <a href="forums-hypertension.html" class="btn">Visit Forum</a>
    </div>
</div>
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