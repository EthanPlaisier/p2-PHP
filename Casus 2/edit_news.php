<?php
require 'config.php';
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM news WHERE id = ?');
$stmt->execute([$id]);
$article = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $stmt = $pdo->prepare('UPDATE news SET title = ?, content = ?, category_id = ? WHERE id = ?');
    $stmt->execute([$title, $content, $category_id, $id]);

    header('Location: admin_dashboard.php');
}

$categories = $pdo->query('SELECT * FROM categories')->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit News</title>
</head>
<body>
    <h1>Edit News</h1>
    <form action="edit_news.php?id=<?php echo $article['id']; ?>" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($article['content']); ?></textarea><br>
        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $article['category_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($category['name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
