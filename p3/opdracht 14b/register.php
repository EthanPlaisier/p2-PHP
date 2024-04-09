<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
</head>
<body>
    <div class="container">
        <h2>Registreren</h2>
        <form action="register_process.php" method="post">
            <label for="username">Gebruikersnaam</label>
            <input type="text" id="username" name="username" required>
            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registreren</button>
        </form>
    </div>
</body>
</html>
