<?php
session_start();
require "connect.php";

$isLoggedIn = isset($_SESSION['user_id']);
$category = 'cardiovascular';
$posts = [];

try {
    $stmt = $conn->prepare("SELECT p.title, p.content, p.created_at, u.full_name 
                            FROM posts p 
                            JOIN users u ON p.user_id = u.id 
                            WHERE p.forum_category = :category 
                            ORDER BY p.created_at DESC");
    $stmt->bindParam(':category', $category);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $isLoggedIn && isset($_POST['new_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, forum_category) 
                                VALUES (:user_id, :title, :content, :category)");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        header("Location: forums-cardiovascular.php");
        exit;
    } catch(PDOException $e) {
        $postMessage = "Error posting: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cardiovascular Disease Forum | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="overcomelife.css">
  <style>
    .post { border-bottom: 1px solid #ddd; padding: 15px 0; }
    .post h4 { margin: 0 0 5px; }
    .post small { color: #666; }
    .post-form { margin: 20px 0; }
    .error-message { color: #e74c3c; }
    .forum-intro { margin: 20px 0; font-style: italic; color: #444; }
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
            <a href="loginz.php" class="btn">Login / Sign Up</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </header>

  <section class="page-header">
    <div class="container">
      <h1>Cardiovascular Disease Forum</h1>
      <p>Discuss heart conditions, share experiences, and connect with the community.</p>
    </div>
  </section>

  <section class="forums-section">
    <div class="container">
      <p class="forum-intro">
        This forum is all about cardiovascular health—tacklin’ heart disease and keepin’ it in check. Preventive measures include eatin’ a balanced diet low in saturated fats, stayin’ active with 30 minutes of exercise most days, quittin’ smokin’, and managin’ stress with some good vibes, fam.
      </p>

      <h3>Posts</h3>
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
          <div class="post">
            <h4><?php echo htmlspecialchars($post['title']); ?></h4>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <small>Posted by <?php echo htmlspecialchars($post['full_name']); ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></small>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No posts yet—be the first, rudeboy!</p>
      <?php endif; ?>

      <?php if ($isLoggedIn): ?>
        <div class="post-form">
          <h4>Add a Post</h4>
          <?php if (isset($postMessage)): ?>
            <p class="error-message"><?php echo $postMessage; ?></p>
          <?php endif; ?>
          <form method="POST">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea id="content" name="content" rows="4" required></textarea>
            </div>
            <button type="submit" name="new_post" class="btn">Post</button>
          </form>
        </div>
      <?php else: ?>
        <p><a href="loginz.html">Log in</a> to post, fam!</p>
      <?php endif; ?>
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