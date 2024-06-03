<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['user_id'];  // Gebruik de ingelogde gebruiker ID

    $stmt = $pdo->prepare('INSERT INTO news (title, content, category_id, user_id) VALUES (?, ?, ?, ?)');
    $stmt->execute([$title, $content, $category_id, $user_id]);

    header('Location: index.php');
    exit;
}

$categories = $pdo->query('SELECT * FROM categories')->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add News</title>
</head>
<body>
    <h1>Add News</h1>
    <form action="add_news.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
