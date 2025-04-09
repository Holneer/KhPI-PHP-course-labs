<?php
if (isset($_POST['username'])) {
    setcookie("username", $_POST['username'], time() + (7 * 24 * 60 * 60)); // 7 днів
    header("Location: index.php");
    exit;
}

if (isset($_GET['clear'])) {
    setcookie("username", "", time() - 3600);
    header("Location: index.php");
    exit;
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Ваше ім'я">
    <button type="submit">Зберегти</button>
</form>

<?php if (isset($_COOKIE['username'])): ?>
    <h2>Привіт, <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
    <a href="?clear=1">Видалити cookie</a>
<?php endif; ?>