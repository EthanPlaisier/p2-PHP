<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $news_id = $_POST['news_id'];

    // Logica voor het versturen van de e-mail
    // Dit is een vereenvoudigd voorbeeld
    $to = $email;
    $subject = "Check out this news article!";
    $message = "Hello, your friend has recommended you to read this article: http://yourwebsite.com/view_news.php?id=$news_id";
    $headers = "From: no-reply@yourwebsite.com";

    mail($to, $subject, $message, $headers);

    echo "Email sent!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tip a Friend</title>
</head>
<body>
    <h1>Tip a Friend</h1>
    <form action="tip_friend.php" method="post">
        <label for="email">Friend's Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="news_id">News ID:</label><br>
        <input type="text" id="news_id" name="news_id" required><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
