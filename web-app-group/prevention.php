<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prevention | Overcome Lifestyle</title>
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
            <a href="loginz.html" class="btn">Login / Sign Up</a>
          <?php endif; ?>
        </li>        
      </ul>
    </div>
  </header>

  <section class="page-header">
    <div class="container">
      <h1>Preventive Health Strategies</h1>
      <p>Comprehensive guide to proactively managing your health and preventing chronic diseases through lifestyle choices.</p>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      <h2>Comprehensive Healthy Living Tips</h2>
      <p>Discover holistic approaches to preventing chronic diseases and maintaining optimal health across multiple dimensions of wellness.</p>
      
      <div class="prevention-categories">
        <div class="prevention-category">
          <h3>Nutrition Optimization</h3>
          <ul>
            <li>Eat a diverse, plant-based diet rich in whole foods</li>
            <li>Limit processed foods, added sugars, and saturated fats</li>
            <li>Practice portion control and mindful eating</li>
            <li>Include a variety of colorful fruits and vegetables</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Physical Activity Strategies</h3>
          <ul>
            <li>Aim for 150 minutes of moderate aerobic activity or 75 minutes of vigorous activity weekly</li>
            <li>Incorporate strength training at least twice a week</li>
            <li>Mix cardiovascular, strength, and flexibility exercises</li>
            <li>Take regular movement breaks during sedentary work</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Weight Management</h3>
          <ul>
            <li>Maintain a healthy BMI through balanced diet and regular exercise</li>
            <li>Use body composition measurements beyond just weight</li>
            <li>Develop sustainable eating habits, not restrictive diets</li>
            <li>Consult nutritionists or dietitians for personalized guidance</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Mental Wellness Techniques</h3>
          <ul>
            <li>Practice daily stress reduction techniques like meditation</li>
            <li>Maintain social connections and support networks</li>
            <li>Seek professional counseling when needed</li>
            <li>Develop healthy coping mechanisms for emotional challenges</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Sleep Hygiene</h3>
          <ul>
            <li>Maintain a consistent sleep schedule</li>
            <li>Create a relaxing bedtime routine</li>
            <li>Optimize sleep environment (cool, dark, quiet)</li>
            <li>Limit screen time before bed</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Hydration and Nutrition</h3>
          <ul>
            <li>Drink at least 8 glasses of water daily</li>
            <li>Reduce sugary and alcoholic beverages</li>
            <li>Consider herbal teas and infused water for variety</li>
            <li>Monitor electrolyte balance</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Substance Management</h3>
          <ul>
            <li>Completely avoid tobacco products</li>
            <li>Limit alcohol consumption</li>
            <li>Seek support for addiction or dependency</li>
            <li>Choose healthy alternatives and coping mechanisms</li>
          </ul>
        </div>

        <div class="prevention-category">
          <h3>Regular Health Screenings</h3>
          <ul>
            <li>Schedule annual comprehensive health check-ups</li>
            <li>Get age and gender-appropriate screenings</li>
            <li>Monitor key health metrics like blood pressure and cholesterol</li>
            <li>Maintain vaccination records</li>
          </ul>
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