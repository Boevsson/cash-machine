<?php

namespace App\Domain;

use Illuminate\Http\Request;

class BankTransaction implements Transaction
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
            'transfer_date' => 'required|date|date_format:d-m-Y',
            'customer_name' => 'required|string',
            'account_number' => 'required|string|alpha_num:6',
            'amount' => 'required|numeric',
        ]);

        $this->inputs = $inputs;
    }

    public function amount(): float
    {
        return floatval($this->inputs['amount']);
    }

    public function inputs(): array
    {
        return $this->inputs;
    }
}
