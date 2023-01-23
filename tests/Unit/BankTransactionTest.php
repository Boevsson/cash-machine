<?php

class BankTransactionTest extends \Tests\TestCase
{
    public function data_provider_test_validate()
    {
        return [
            [
                [
                    'transfer_date' => '01-01-2050',
                    'customer_name' => 'jon doe',
                    'account_number' => '123456',
                    'amount' => '100',
                ],
                false,
                null
            ],
            [
                [
                    'transfer_date' => '01-01-2050',
                    'customer_name' => '',
                    'account_number' => '123456',
                    'amount' => '100',
                ],
                true,
                'The customer name field is required.'
            ],
            [
                [
                    'transfer_date' => '01-01-2050',
                    'customer_name' => 'jon',
                    'account_number' => '12346',
                    'amount' => '100',
                ],
                true,
                'The account number must be 6 digits.'
            ],
            [
                [
                    'transfer_date' => '01-01-2050',
                    'customer_name' => 'jon',
                    'account_number' => '123456',
                    'amount' => '',
                ],
                true,
                'The amount field is required.'
            ],
        ];
    }

    /**
     * @param $body
     * @return void
     * @dataProvider data_provider_test_validate
     */
    public function test_validate($body, $expectException, $exceptionMessage)
    {
        $request = $this->createRequest('post',
            json_encode($body),
            'create-card-transaction');

        if ($expectException) {

            $this->expectException(\Illuminate\Validation\ValidationException::class);
            $this->expectExceptionMessage($exceptionMessage);
        }

        $transaction = new \App\Domain\BankTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->inputs(), $body);
    }

    public function data_provider_test_amount()
    {
        return [
            [
                [
                    'transfer_date' => '01-01-2050',
                    'customer_name' => 'jon doe',
                    'account_number' => '123456',
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

        $transaction = new \App\Domain\BankTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->amount(), 100.00);
    }
}
