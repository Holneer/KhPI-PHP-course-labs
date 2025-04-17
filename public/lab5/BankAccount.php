<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($initialBalance = 0, $currency = "USD")
    {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути менше " . self::MIN_BALANCE);
        }

        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception(" Сума поповнення повинна бути більше нуля");
        }

        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути більше нуля");
        }

        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів");
        }

        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
