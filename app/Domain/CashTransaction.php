<?php

namespace App\Domain;

use Illuminate\Http\Request;

class CashTransaction implements Transaction
{
    public Request $request;
    private array $inputs;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        $inputs = $this->request->validate([
            'banknote_1' => 'required|numeric',
            'banknote_5' => 'required|numeric',
            'banknote_10' => 'required|numeric',
            'banknote_50' => 'required|numeric',
            'banknote_100' => 'required|numeric',
        ]);

        $this->inputs = $inputs;
    }

    public function amount()
    {
        $amount = 0;

        $amount += $this->inputs['banknote_1'] * 1;
        $amount += $this->inputs['banknote_5'] * 5;
        $amount += $this->inputs['banknote_10'] * 10;
        $amount += $this->inputs['banknote_50'] * 50;
        $amount += $this->inputs['banknote_100'] * 100;

        return $amount;
    }

    public function inputs(): array
    {
        return $this->inputs;
    }
}
