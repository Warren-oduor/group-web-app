<?php
session_start();
require "connect.php";

$isLoggedIn = isset($_SESSION['user_id']);
$userData = null;
$healthStats = [];
$posts = [];

if ($isLoggedIn) {
    try {
        // Fetch user data
        $stmt = $conn->prepare("SELECT full_name, email, created_at, profile_pic FROM users WHERE id = :id");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fetch health stats
        $stmt = $conn->prepare("SELECT id, goal, weight_lost, daily_steps, achievement FROM health_stats WHERE user_id = :id");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $healthStats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fetch posts
        $stmt = $conn->prepare("SELECT title, content, created_at FROM posts WHERE user_id = :id ORDER BY created_at DESC");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Handle profile pic upload
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $fileName = $_SESSION['user_id'] . '_' . basename($_FILES['profile_pic']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetPath)) {
            $stmt = $conn->prepare("UPDATE users SET profile_pic = :pic WHERE id = :id");
            $stmt->bindParam(':pic', $fileName);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->execute();
            $userData['profile_pic'] = $fileName;
            $picMessage = "Profile pic updated, fam!";
        } else {
            $picMessage = "Upload failed, brudda!";
        }
    }

    // Handle health stats update
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_health'])) {
        $statId = $_POST['stat_id'] ?? null;
        $goal = $_POST['goal'];
        $weightLost = floatval($_POST['weight_lost']);
        $dailySteps = intval($_POST['daily_steps']);
        $achievement = $_POST['achievement'];

        try {
            if ($statId) {
                // Update existing stat
                $stmt = $conn->prepare("UPDATE health_stats SET goal = :goal, weight_lost = :weight, daily_steps = :steps, achievement = :achieve WHERE id = :id AND user_id = :user_id");
                $stmt->bindParam(':id', $statId);
            } else {
                // Insert new stat
                $stmt = $conn->prepare("INSERT INTO health_stats (user_id, goal, weight_lost, daily_steps, achievement) VALUES (:user_id, :goal, :weight, :steps, :achieve)");
            }
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':goal', $goal);
            $stmt->bindParam(':weight', $weightLost);
            $stmt->bindParam(':steps', $dailySteps);
            $stmt->bindParam(':achieve', $achievement);
            $stmt->execute();
            $healthMessage = $statId ? "Stat updated, fam!" : "New stat added, brudda!";
            header("Location: profile.php"); // Refresh to show updated stats
            exit;
        } catch(PDOException $e) {
            $healthMessage = "Error: " . $e->getMessage();
        }
    }

    // Handle settings update (same as before)
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_settings'])) {
        $newName = $_POST['full_name'];
        $newEmail = $_POST['email'];
        $newPassword = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

        try {
            $updateQuery = "UPDATE users SET full_name = :name, email = :email";
            if ($newPassword) $updateQuery .= ", password = :password";
            $updateQuery .= " WHERE id = :id";
            
            $stmt = $conn->prepare($updateQuery);
            $stmt->bindParam(':name', $newName);
            $stmt->bindParam(':email', $newEmail);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            if ($newPassword) $stmt->bindParam(':password', $newPassword);
            $stmt->execute();
            
            $userData['full_name'] = $newName;
            $userData['email'] = $newEmail;
            $updateMessage = "Settings updated, fam!";
        } catch(PDOException $e) {
            $updateMessage = "Error updating: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile | Overcome Lifestyle</title>
  <link rel="stylesheet" type="text/css" href="overcomelife.css">
  <style>
    .login-required { display: none; text-align: center; padding: 20px; background-color: #f4f4f4; }
    .login-required.show { display: block; }
    .profile-section { display: none; }
    .profile-section.active { display: block; }
    .profile-navigation li { cursor: pointer; padding: 10px; }
    .profile-navigation li.active { background: #e0e0e0; }
    .update-message { color: #28a745; margin-bottom: 10px; }
    .error-message { color: #e74c3c; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .edit-btn { cursor: pointer; color: #007bff; }
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
      <h1>User Profile</h1>
      <p>Manage your profile, track your health journey, and connect with the community.</p>
    </div>
  </section>

  <section class="login-required <?php echo !$isLoggedIn ? 'show' : ''; ?>" id="login-prompt">
    <div class="container">
      <h2>Access Restricted</h2>
      <p>Please <a href="loginz.html">log in</a> or <a href="loginz.html?signup=true">sign up</a> to view your profile.</p>
    </div>
  </section>

  <section class="profile-section" id="profile-content" style="display: <?php echo $isLoggedIn ? 'block' : 'none'; ?>;">
    <div class="container">
      <div class="profile-grid">
        <div class="profile-sidebar">
          <div class="profile-avatar">
            <img src="<?php echo $userData['profile_pic'] ? 'uploads/' . htmlspecialchars($userData['profile_pic']) : '/api/placeholder/200/200'; ?>" alt="User Avatar">
            <h2><?php echo htmlspecialchars($userData['full_name'] ?? 'User'); ?></h2>
            <p>Member since <?php echo $userData ? date('F Y', strtotime($userData['created_at'])) : 'N/A'; ?></p>
            <form method="POST" enctype="multipart/form-data">
              <input type="file" name="profile_pic" accept="image/*" required>
              <button type="submit" class="btn">Upload Pic</button>
            </form>
            <?php if (isset($picMessage)): ?>
              <p class="<?php echo strpos($picMessage, 'failed') === false ? 'update-message' : 'error-message'; ?>">
                <?php echo $picMessage; ?>
              </p>
            <?php endif; ?>
          </div>
          <div class="profile-navigation">
            <ul>
              <li class="active" data-section="overview">Overview</li>
              <li data-section="health-stats">Health Stats</li>
              <li data-section="posts">My Posts</li>
              <li data-section="connections">Connections</li>
              <li data-section="settings">Account Settings</li>
            </ul>
          </div>
        </div>

        <div class="profile-content">
          <div class="profile-section active" id="overview">
            <h3>Personal Overview</h3>
            <div class="overview-stats">
              <div class="stat-card">
                <h4>Health Goals</h4>
                <?php foreach ($healthStats as $stat): ?>
                  <p><?php echo htmlspecialchars($stat['goal']); ?></p>
                <?php endforeach; ?>
                <?php if (empty($healthStats)): ?><p>No goals set yet.</p><?php endif; ?>
              </div>
              <div class="stat-card">
                <h4>Current Progress</h4>
                <?php if (!empty($healthStats)): ?>
                  <p>Weight Lost: <?php echo $healthStats[0]['weight_lost']; ?> lbs</p>
                  <p>Avg. Daily Steps: <?php echo number_format($healthStats[0]['daily_steps']); ?></p>
                <?php else: ?>
                  <p>No progress tracked yet.</p>
                <?php endif; ?>
              </div>
              <div class="stat-card">
                <h4>Recent Achievements</h4>
                <ul>
                  <?php foreach ($healthStats as $stat): ?>
                    <?php if ($stat['achievement']): ?>
                      <li><?php echo htmlspecialchars($stat['achievement']); ?></li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?php if (empty($healthStats)): ?><li>None yet, fam!</li><?php endif; ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="profile-section" id="health-stats">
            <h3>Health Stats</h3>
            <?php if (isset($healthMessage)): ?>
              <p class="<?php echo strpos($healthMessage, 'Error') === false ? 'update-message' : 'error-message'; ?>">
                <?php echo $healthMessage; ?>
              </p>
            <?php endif; ?>
            <?php if (!empty($healthStats)): ?>
              <table>
                <thead>
                  <tr>
                    <th>Goal</th>
                    <th>Weight Lost (lbs)</th>
                    <th>Daily Steps</th>
                    <th>Achievement</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($healthStats as $stat): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($stat['goal']); ?></td>
                      <td><?php echo $stat['weight_lost']; ?></td>
                      <td><?php echo number_format($stat['daily_steps']); ?></td>
                      <td><?php echo htmlspecialchars($stat['achievement'] ?: 'None'); ?></td>
                      <td><span class="edit-btn" data-id="<?php echo $stat['id']; ?>">Edit</span></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p>No stats yet—add some below, brudda!</p>
            <?php endif; ?>

            <h4><?php echo isset($editStat) ? 'Edit Stat' : 'Add New Stat'; ?></h4>
            <form method="POST" id="health-form">
              <input type="hidden" name="stat_id" id="stat_id">
              <div class="form-group">
                <label for="goal">Goal</label>
                <input type="text" id="goal" name="goal" required>
              </div>
              <div class="form-group">
                <label for="weight_lost">Weight Lost (lbs)</label>
                <input type="number" step="0.01" id="weight_lost" name="weight_lost" required>
              </div>
              <div class="form-group">
                <label for="daily_steps">Daily Steps</label>
                <input type="number" id="daily_steps" name="daily_steps" required>
              </div>
              <div class="form-group">
                <label for="achievement">Achievement</label>
                <input type="text" id="achievement" name="achievement">
              </div>
              <button type="submit" name="update_health" class="btn">Save Stat</button>
            </form>
          </div>

          <div class="profile-section" id="posts">
            <h3>My Posts</h3>
            <?php if (!empty($posts)): ?>
              <?php foreach ($posts as $post): ?>
                <div class="post">
                  <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                  <p><?php echo htmlspecialchars($post['content']); ?></p>
                  <small>Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></small>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>No posts yet—share your story, fam!</p>
            <?php endif; ?>
          </div>

          <div class="profile-section" id="connections">
            <h3>Connections</h3>
            <p>Coming soon—connect with your crew here!</p>
          </div>

          <div class="profile-section" id="settings">
            <h3>Account Settings</h3>
            <?php if (isset($updateMessage)): ?>
              <p class="<?php echo strpos($updateMessage, 'Error') === false ? 'update-message' : 'error-message'; ?>">
                <?php echo $updateMessage; ?>
              </p>
            <?php endif; ?>
            <form method="POST">
              <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($userData['full_name'] ?? ''); ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>
              </div>
              <div class="form-group">
                <label for="password">New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password">
              </div>
              <button type="submit" name="update_settings" class="btn">Update Settings</button>
            </form>
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
        <p>© 2025 Overcome Lifestyle. All rights reserved. | Medical Disclaimer: Information provided is for educational purposes only and is not a substitute for professional medical advice.</p>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const navItems = document.querySelectorAll('.profile-navigation li');
      const sections = document.querySelectorAll('.profile-section');
      const editButtons = document.querySelectorAll('.edit-btn');
      const healthForm = document.getElementById('health-form');
      const statIdInput = document.getElementById('stat_id');
      const goalInput = document.getElementById('goal');
      const weightInput = document.getElementById('weight_lost');
      const stepsInput = document.getElementById('daily_steps');
      const achieveInput = document.getElementById('achievement');

      // Tab switching
      navItems.forEach(item => {
        item.addEventListener('click', function() {
          navItems.forEach(i => i.classList.remove('active'));
          sections.forEach(s => s.classList.remove('active'));
          this.classList.add('active');
          document.getElementById(this.getAttribute('data-section')).classList.add('active');
        });
      });

      // Edit health stats
      editButtons.forEach(btn => {
        btn.addEventListener('click', function() {
          const statId = this.getAttribute('data-id');
          const row = this.closest('tr');
          statIdInput.value = statId;
          goalInput.value = row.cells[0].textContent;
          weightInput.value = row.cells[1].textContent;
          stepsInput.value = row.cells[2].textContent.replace(/,/g, '');
          achieveInput.value = row.cells[3].textContent === 'None' ? '' : row.cells[3].textContent;
          healthForm.scrollIntoView({ behavior: 'smooth' });
        });
      });
    });
  </script>
</body>
</html>