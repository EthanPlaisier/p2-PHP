<?php
session_start();

if (!isset($_SESSION['page_count'])) {
    $_SESSION['page_count'] = 1;
} else {
    $_SESSION['page_count']++;
}

echo "Je bent ".$_SESSION['page_count']." keer op deze pagina geweest.";
?>
