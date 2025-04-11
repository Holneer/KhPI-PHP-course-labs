<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ласкаво просимо</title>
</head>

<body>
    <h2>Вітаємо, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Це захищена сторінка, доступна лише після входу.</p>
    <a href="logout.php">Вийти</a>
</body>

</html>