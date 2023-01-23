<?php

namespace App\Domain;

use App\Rules\CardExpirationDateRule;
use App\Rules\CardNumberRule;
use Illuminate\Http\Request;

class CardTransaction implements Transaction
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
            'card_number' => ['required', new CardNumberRule],
            'expiration_date' => ['required', 'date_format:m/Y', new CardExpirationDateRule],
            'card_holder' => 'required|string',
            'cvv' => 'required|numeric|digits:3',
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
