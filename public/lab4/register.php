<?php
// З'єднання з базою даних
$host = 'mysql';
$dbname = getenv('MYSQL_DB');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');


$conn = new mysqli($host, $user, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}

// Отримання та фільтрація даних
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// Запит до бази даних
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Реєстрація пройшла успішно!";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
