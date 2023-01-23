<?php

class CardTransactionTest extends \Tests\TestCase
{
    public function data_provider_test_validate()
    {
        return [
            [
                [
                    'card_number' => '4111111111111111',
                    'expiration_date' => '04/2050',
                    'card_holder' => 'jon doe',
                    'cvv' => '123',
                    'amount' => '100',
                ],
                false
            ],
            [
                [
                    'card_number' => '5111111111111111',
                    'expiration_date' => '04/2050',
                    'card_holder' => 'jon doe',
                    'cvv' => '123',
                    'amount' => '100',
                ],
                true
            ],
        ];
    }

    /**
     * @param $body
     * @return void
     * @dataProvider data_provider_test_validate
     */
    public function test_validate($body, $expectException)
    {
        $request = $this->createRequest('post',
            json_encode($body),
            'create-card-transaction');

        if ($expectException) {

            $this->expectException(\Illuminate\Validation\ValidationException::class);
            $this->expectExceptionMessage('The card number must be 16 digits and start with 4.');
        }

        $transaction = new \App\Domain\CardTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->inputs(), $body);
    }

    public function data_provider_test_amount()
    {
        return [
            [
                [
                    'card_number' => '4111111111111111',
                    'expiration_date' => '04/2050',
                    'card_holder' => 'jon doe',
                    'cvv' => '123',
                    'amount' => '100',
                ]
            ]
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     * @dataProvider data_provider_test_amount
     */
    public function test_amount($body)
    {
        $request = $this->createRequest('post',
            json_encode($body),
            'create-card-transaction');

        $transaction = new \App\Domain\CardTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->amount(), 100.00);
    }
}
