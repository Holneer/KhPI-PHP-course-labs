<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === 'admin' && $password === '1234') {
        $_SESSION['user'] = $login;
        $_SESSION['last_activity'] = time();
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Невірний логін або пароль";
    }
}
?>

<form method="POST">
    <input type="text" name="login" placeholder="Логін">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Увійти</button>
</form>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>