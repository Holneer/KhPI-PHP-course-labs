<?php
$logFile = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['text'])) {
    $text = trim($_POST['text']);

    if (!empty($text)) {
        $entry = $text . PHP_EOL;
        file_put_contents($logFile, $entry, FILE_APPEND);
        echo "Текст записано у файл.<br><br>";
    } else {
        echo "Поле не може бути порожнім.";
    }
}

// Виведення вмісту log.txt
if (file_exists($logFile)) {
    echo "<h3>Вміст log.txt:</h3><pre>";
    echo htmlspecialchars(file_get_contents($logFile));
    echo "</pre>";
} else {
    echo "Файл log.txt ще не створено.";
}
