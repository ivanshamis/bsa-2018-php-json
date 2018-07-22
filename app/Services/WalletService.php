<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Entity\{Wallet,User,Currency};
use App\Requests\CreateWalletRequest;

class WalletService implements WalletServiceInterface
{
    public function findByUser(int $userId): ?Wallet
    {
        $user = User::find($userId);
        if ($user === NULL) {
            $wallet = NULL;
        } 
        else {
            $wallet = $user->wallet;
        }
        return $wallet;
    }

    public function create(CreateWalletRequest $request): Wallet
    {   
        $userId = $request->getUserId();
        $wallets = Wallet::where('user_id', $userId)->get();
        if ($wallets->isEmpty()) {
            return Wallet::create([
                'user_id' => $userId
            ]);
        } 
        else {
            throw new \LogicException("Duplicate on field user ($userId)");
        }
    }

    public function findCurrencies(int $walletId): Collection
    {
        return Currency::join('money', 'currency.id', '=', 'money.currency_id')
        ->where('money.wallet_id', $walletId)->get();
    }
}