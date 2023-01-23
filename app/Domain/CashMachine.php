<?php

namespace App\Domain;

use Illuminate\Validation\ValidationException;

class CashMachine
{
    /**
     * Store transaction in Database
     */
    public function store(Transaction $transaction)
    {
        $transaction->validate();

        $totalAmount = \App\Models\Transaction::sum('amount');

        if ($totalAmount + $transaction->amount() > 20000){

            throw ValidationException::withMessages([
                'amount_limit' => ['Total amount limit exceeded.']
            ]);
        }

        return \App\Models\Transaction::create([
            'amount' => $transaction->amount(),
            'inputs' => $transaction->inputs(),
        ]);
    }
}
