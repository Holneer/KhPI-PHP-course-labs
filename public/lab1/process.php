<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);

    if (empty($fname) || empty($lname)) {
        echo "Будь ласка, заповніть усі поля.";
    } elseif (!preg_match("/^[a-zA-ZА-Яа-яЇїЄєІіҐґ' -]+$/u", $fname) || !preg_match("/^[a-zA-ZА-Яа-яЇїЄєІіҐґ' -]+$/u", $lname)) {
        echo "Неправильний формат імені.";
    } else {
        echo "Привіт, " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . "!";
    }
} else {
    echo "Дані не були надіслані методом POST.";
}
