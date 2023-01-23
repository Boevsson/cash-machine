<?php

class CashTransactionTest extends \Tests\TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_validate()
    {
        $body = [
            'banknote_1' => 1,
            'banknote_5' => 0,
            'banknote_10' => 0,
            'banknote_50' => 0,
            'banknote_100' => 0,
        ];
        $request = $this->createRequest('post',
            json_encode($body),
            'create-cash-transaction');

        $transaction = new \App\Domain\CashTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->inputs(), $body);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_amount()
    {
        $body = [
            'banknote_1' => 1,
            'banknote_5' => 1,
            'banknote_10' => 1,
            'banknote_50' => 1,
            'banknote_100' => 1,
        ];
        $request = $this->createRequest('post',
            json_encode($body),
            'create-cash-transaction');

        $transaction = new \App\Domain\CashTransaction($request);
        $transaction->validate();

        $this->assertSame($transaction->amount(), 166);
    }
}
