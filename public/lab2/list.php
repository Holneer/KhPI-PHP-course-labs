<?php
$uploadDir = 'uploads/';
$files = scandir($uploadDir);

echo "<h2>Список завантажених файлів:</h2>";

if (count($files) > 2) {
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            $fileUrl = $uploadDir . $file;
            echo "<li><a href='$fileUrl' download>$file</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Немає завантажених файлів.";
}
