<?php
require 'config.php';
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: index.php');
    exit;
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
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="add_news.php">Add News</a>
    <h2>News Articles</h2>
    <?php foreach ($news as $article): ?>
        <h3><?php echo htmlspecialchars($article['title']); ?></h3>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($article['category']); ?></p>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($article['author']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <p><a href="edit_news.php?id=<?php echo $article['id']; ?>">Edit</a> | 
           <a href="delete_news.php?id=<?php echo $article['id']; ?>">Delete</a></p>
    <?php endforeach; ?>
</body>
</html>
