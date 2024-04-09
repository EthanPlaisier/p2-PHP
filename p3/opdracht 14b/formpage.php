<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
</head>
<body> 
    <div class="container">
        <?php if(isset($_SESSION['gebruikersnaam'])) : ?>
            <h3>Welkom, <?php echo $_SESSION['gebruikersnaam']; ?>! Voeg hieronder een bericht toe:</h3>
            <form action="insert_db.php" method="post">
                <label for="bericht">Bericht</label>
                <input type="text" id="bericht" name="bericht" required>
                <button type="submit">Opslaan</button>
            </form>
            <a href="logout.php">Uitloggen</a>
        <?php else : ?>
            <h3>Log in om een bericht toe te voegen:</h3>
            <form action="login.php" method="post">
                <label for="gebruikersnaam">Gebruikersnaam</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
                <label for="wachtwoord">Wachtwoord</label>
                <input type="wachtwoord" id="wachtwoord" name="wachtwoord" required>
                <button type="submit">Inloggen</button>
            </form>
            <a href="register.php">Nieuw account aanmaken</a>
        <?php endif; ?>
    </div>
    <div class="opgeslagen-berichten">
        <h2>Opgeslagen Berichten</h2>
        <?php include 'messages.php'; ?>
    </div>
</body>
</html>
