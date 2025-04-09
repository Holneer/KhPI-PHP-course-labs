<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

echo "<h2>Привіт, " . htmlspecialchars($_SESSION['user']) . "!</h2>";
echo "<a href='logout.php'>Вийти</a>";
