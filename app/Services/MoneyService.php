<?php

namespace App\Services;

use App\Entity\Money;
use App\Requests\CreateMoneyRequest;

class MoneyService implements MoneyServiceInterface
{
    public function create(CreateMoneyRequest $request): Money 
    {
        return Money::create([
            'currency_id' => $request->getCurrencyId(),
            'wallet_id' => $request->getWalletId(),
            'amount' => $request->getAmount()
        ]);
    }

    public function maxAmount(): float 
    {
        return Money::max('amount');
    }
}