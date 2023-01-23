<?php

namespace App\Domain;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        $validator = Validator::make($this->request->all(), [
            'banknote_1' => 'required|numeric',
            'banknote_5' => 'required|numeric',
            'banknote_10' => 'required|numeric',
            'banknote_50' => 'required|numeric',
            'banknote_100' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $this->inputs = $validator->validated();;
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
