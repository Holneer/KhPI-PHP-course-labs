<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    echo "Створення звичайного банківського рахунку <br>";
    $account = new BankAccount(1000, "USD");
    echo "Початковий баланс: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";

    echo "Поповнення рахунку на 500 <br>";
    $account->deposit(500);
    echo "Новий баланс: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";

    echo "Зняття коштів: 300 <br>";
    $account->withdraw(300);
    echo "Баланс після зняття: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";

    echo "<br>Створення накопичувального рахунку <br>";
    $savingsAccount = new SavingsAccount(2000, "EUR");
    echo "Початковий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "<br>";

    echo "Поточна відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%<br>";

    echo "Застосування відсотків <br>";
    $interestEarned = $savingsAccount->applyInterest();
    echo "Нараховані відсотки: " . $interestEarned . " " . $savingsAccount->getCurrency() . "<br>";
    echo "Новий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "<br>";

    // Тестування обробки винятків
    echo "<br>Спроба зняти більше, ніж є на рахунку <br>";
    try {
        $account->withdraw(2000);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }

    echo "<br>Спроба поповнити рахунок на від'ємну суму <br>";
    try {
        $account->deposit(-100);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }

    echo "<br>Спроба зняти від'ємну суму <br>";
    try {
        $account->withdraw(-50);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }

    // Зміна відсоткової ставки
    echo "<br>Зміна відсоткової ставки для накопичувальних рахунків<br>";
    SavingsAccount::$interestRate = 0.07; // змінюємо на 7%
    echo "Нова відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%<br>";

    echo "Застосування нової відсоткової ставки <br>";
    $interestEarned = $savingsAccount->applyInterest();
    echo "Нараховані відсотки: " . $interestEarned . " " . $savingsAccount->getCurrency() . "<br>";
    echo "Новий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "<br>";
} catch (Exception $e) {
    echo "Виникла помилка: " . $e->getMessage() . "<br>";
}
