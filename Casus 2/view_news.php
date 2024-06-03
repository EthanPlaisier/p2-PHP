<?php
require 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT news.*, categories.name AS category, users.username AS author 
                       FROM news 
                       JOIN categories ON news.category_id = categories.id 
                       JOIN users ON news.user_id = users.id 
                       WHERE news.id = ?');
$stmt->execute([$id]);
$article = $stmt->fetch();

if ($article) {
    $stmt = $pdo->prepare('UPDATE news SET view_count = view_count + 1 WHERE id = ?');
    $stmt->execute([$id]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($article['category']); ?></p>
    <p><strong>Author:</strong> <?php echo htmlspecialchars($article['author']); ?></p>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
    <p><strong>Views:</strong> <?php echo $article['view_count']; ?></p>
</body>
</html>
