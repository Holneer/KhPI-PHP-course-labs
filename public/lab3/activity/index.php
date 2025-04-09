<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'Користувач';
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 10)) {
    session_unset();
    session_destroy();
    echo "Сесію завершено через неактивність. <a href='index.php'>Оновити</a>";
    exit;
}

$_SESSION['last_activity'] = time();
?>

<h2>Ви активні. <?= $_SESSION['user'] ?></h2>
<p>Час активності оновлено.</p>