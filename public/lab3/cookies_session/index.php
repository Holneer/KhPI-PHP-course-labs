<?php
session_start();

// Завершити сесію
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Ініціалізація корзини
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Додати товар
if (isset($_POST['item'])) {
    $_SESSION['cart'][] = $_POST['item'];

    $previous = isset($_COOKIE['previous_items']) ? json_decode($_COOKIE['previous_items'], true) : [];
    $previous[] = $_POST['item'];
    setcookie('previous_items', json_encode($previous), time() + (30 * 24 * 60 * 60)); // 30 днів

    header("Location: index.php");
    exit;
}
?>

<form method="POST">
    <input type="text" name="item" placeholder="Назва товару">
    <button type="submit">Додати до корзини</button>
</form>

<form method="GET">
    <button type="submit" name="logout" value="1" style="margin-top: 10px;">Завершити сесію</button>
</form>

<h3>Поточні товари:</h3>
<ul>
    <?php foreach ($_SESSION['cart'] as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<h3>Попередні покупки:</h3>
<ul>
    <?php
    if (isset($_COOKIE['previous_items'])) {
        foreach (json_decode($_COOKIE['previous_items'], true) as $prev) {
            echo "<li>" . htmlspecialchars($prev) . "</li>";
        }
    }
    ?>
</ul>