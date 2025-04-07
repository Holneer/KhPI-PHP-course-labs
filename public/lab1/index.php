<?php
// 1. Виведення тексту "Hello, World!"
// Цей рядок виводить текст на екран
echo "Hello, World!<br><br>";

// 2. Змінні та типи даних
$string = "Це рядок";
$integer = 42;
$float = 3.14;
$boolean = true;

echo "Значення рядка: $string<br>";
echo "Ціле число: $integer<br>";
echo "Число з плаваючою комою: $float<br>";
echo "Булеве значення: $boolean<br><br>";

var_dump($string);
echo "<br>";
var_dump($integer);
echo "<br>";
var_dump($float);
echo "<br>";
var_dump($boolean);
echo "<br><br>";

// 3. Конкатенація рядків
$firstName = "Іван";
$lastName = "Петренко";
$fullName = $firstName . " " . $lastName;
echo "Повне ім'я: $fullName<br><br>";

// 4. Умовні конструкції
$number = 7;
if ($number % 2 == 0) {
    echo "$number — парне число<br><br>";
} else {
    echo "$number — непарне число<br><br>";
}

// 5. Цикли
echo "Цикл for:<br>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i ";
}
echo "<br><br>";

echo "Цикл while:<br>";
$j = 10;
while ($j >= 1) {
    echo "$j ";
    $j--;
}
echo "<br><br>";

// 6. Масиви
$student = [
    "ім'я" => "Олена",
    "прізвище" => "Ковальчук",
    "вік" => 20,
    "спеціальність" => "Інформатика"
];

echo "Інформація про студента:<br>";
echo "Ім'я: " . $student["ім'я"] . "<br>";
echo "Прізвище: " . $student["прізвище"] . "<br>";
echo "Вік: " . $student["вік"] . "<br>";
echo "Спеціальність: " . $student["спеціальність"] . "<br>";

$student["середній_бал"] = 4.5;

echo "<br>Оновлена інформація:<br>";
print_r($student);
