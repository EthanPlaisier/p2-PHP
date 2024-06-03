<?php
require 'config.php';
session_start();

// Verhoog de weergaveteller voor elk nieuwsbericht
$stmt = $pdo->query('SELECT id FROM news');
$news_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($news_ids as $id) {
    $updateStmt = $pdo->prepare('UPDATE news SET view_count = view_count + 1 WHERE id = ?');
    $updateStmt->execute([$id]);
}

$stmt = $pdo->query('SELECT news.*, categories.name AS category, users.username AS author 
                     FROM news 
                     JOIN categories ON news.category_id = categories.id 
                     JOIN users ON news.user_id = users.id 
                     ORDER BY created_at DESC');
$news = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>News</h1>
    <button class="toggle-button" onclick="toggleDarkMode()">Toggle Dark Mode</button>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> | 
           <a href="logout.php">Logout</a> | 
           <?php if ($_SESSION['is_admin']): ?>
               <a href="admin_dashboard.php">Admin Dashboard</a>
           <?php endif; ?>
        </p>
    <?php else: ?>
        <a href="login.php">Login</a> | 
        <a href="register.php">Register</a>
    <?php endif; ?>

    <?php foreach ($news as $article): ?>
        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($article['category']); ?></p>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($article['author']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <p><strong>Views:</strong> <?php echo $article['view_count']; ?></p>
        
        <!-- Tip-een-vriend formulier -->
        <form action="tip_friend.php" method="post">
            <input type="hidden" name="news_id" value="<?php echo $article['id']; ?>">
            <label for="friend_email">Tip a friend:</label><br>
            <input type="email" id="friend_email" name="friend_email" placeholder="Friend's email" required><br>
            <input type="submit" value="Send">
        </form>
    <?php endforeach; ?>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
