<?php

namespace App\Domain;

use Illuminate\Http\Request;

class TransactionFactory
{
    /**
     * @throws \Exception
     */
    public static function make($transactionClass, Request $request)
    {
        return match ($transactionClass) {
            CashTransaction::class => new CashTransaction($request),
            CardTransaction::class => new CardTransaction($request),
            BankTransaction::class => new BankTransaction($request),
            default => throw new \Exception("Transaction type $transactionClass not supported."),
        };
    }
}
