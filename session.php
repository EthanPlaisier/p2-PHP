<?php
    // acteur: ethan

    $telop = 0;

    session_start();
    //first test first session
    if (isset($_SESSION['som']) == false ) {
        $_SESSION['som'] = 0;
        $_SESSION['username'] = "kaas";
        $_SESSION['password'] = "eten";
    } else {
        $_SESSION['som']++;
    }

    echo "Telop: ", $_SESSION['som'];
    echo "<br>";
    var_dump($_SESSION);

    //session_destroy();
?>