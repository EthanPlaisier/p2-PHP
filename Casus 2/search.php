<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = $_GET['query'];

    $stmt = $pdo->prepare('SELECT news.*, categories.name AS category, users.username AS author 
                           FROM news 
                           JOIN categories ON news.category_id = categories.id 
                           JOIN users ON news.user_id = users.id 
                           WHERE news.title LIKE ? OR news.content LIKE ?');
    $stmt->execute(["%$query%", "%$query%"]);
    $results = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search News</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if (!empty($results)): ?>
        <?php foreach ($results as $article): ?>
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($article['category']); ?></p>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($article['author']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
