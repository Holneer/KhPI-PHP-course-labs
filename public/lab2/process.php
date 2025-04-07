<?php
$uploadDir = 'uploads/';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['uploadFile'])) {
    $file = $_FILES['uploadFile'];

    if (is_uploaded_file($file['tmp_name'])) {
        $filename = basename($file['name']);
        $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = ['png', 'jpg', 'jpeg'];
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($fileExt, $allowed)) {
            echo "Дозволені лише файли PNG, JPG, JPEG.";
            exit;
        }

        if ($file['size'] > $maxSize) {
            echo "Файл перевищує дозволений розмір (2 МБ).";
            exit;
        }

        // Унікальне ім'я, якщо файл існує
        $targetPath = $uploadDir . $filename;
        if (file_exists($targetPath)) {
            $uniqueId = date('Ymd_His') . '_' . rand(1000, 9999);
            $filename = pathinfo($filename, PATHINFO_FILENAME) . "_$uniqueId." . $fileExt;
            $targetPath = $uploadDir . $filename;
            echo "Файл з такою назвою вже існує. Ім'я змінено на $filename<br><br>";
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $sizeKb = round($file['size'] / 1024, 2);
            echo "Файл успішно завантажено!<br>";
            echo "Ім'я: $filename<br>";
            echo "Тип: " . $file['type'] . "<br>";
            echo "Розмір: {$sizeKb} KB<br>";
            echo "<a href='$targetPath' download>⬇️ Завантажити файл</a>";
        } else {
            echo "Не вдалося зберегти файл.";
        }
    } else {
        echo "Файл не був завантажений.";
    }
}
