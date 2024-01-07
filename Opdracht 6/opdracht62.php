<?php
$expire = time() + (60 * 60 * 24 * 30); // 30 days

if (!isset($_COOKIE['page_views'])) {
    setcookie('page_views', 1, $expire);
    echo "Dit is de eerste keer dat je op deze pagina bent.";
} else {
    $count = ++$_COOKIE['page_views'];
    setcookie('page_views', $count, $expire);
    echo "Je bent ".$count." keer op deze pagina geweest.";
}
?>
