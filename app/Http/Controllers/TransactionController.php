<?php

namespace App\Http\Controllers;

use App\Domain\BankTransaction;
use App\Domain\CardTransaction;
use App\Domain\CashMachine;
use App\Domain\CashTransaction;
use App\Domain\TransactionFactory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function createCashTransaction(Request $request, CashMachine $cashMachine)
    {
        $cashTransaction = TransactionFactory::make(CashTransaction::class, $request);
        $transaction = $cashMachine->store($cashTransaction);

        return view('transaction-details', ['transaction' => $transaction]);
    }

    public function createCardTransaction(Request $request, CashMachine $cashMachine)
    {
        $cardTransaction = TransactionFactory::make(CardTransaction::class, $request);
        $transaction = $cashMachine->store($cardTransaction);

        return view('transaction-details', ['transaction' => $transaction]);
    }

    public function createBankTransaction(Request $request, CashMachine $cashMachine)
    {
        $bankTransaction = TransactionFactory::make(BankTransaction::class, $request);
        $transaction = $cashMachine->store($bankTransaction);

        return view('transaction-details', ['transaction' => $transaction]);
    }
}
