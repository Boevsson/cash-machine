<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            input {
                border: 1px solid;
            }
        </style>
    </head>
    <body class="">
        <div class="">

            <div class="">

                <form method="POST" action="/create-bank-transaction">
                    @csrf
                    <div>
                        <label for="transfer_date">Transfer Date: </label>
                        <input type="text" name="transfer_date" id="transfer_date"
                               class="@error('transfer_date') is-invalid @enderror" required>
                        @error('transfer_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="customer_name">Customer name: </label>
                        <input type="text" name="customer_name" id="customer_name"
                               class="@error('customer_name') is-invalid @enderror" required>
                        @error('customer_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="account_number">Account number: </label>
                        <input type="text" name="account_number" id="account_number"
                               class="@error('account_number') is-invalid @enderror" required>
                        @error('account_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="amount">Amount: </label>
                        <input type="number" name="amount" id="amount"
                               class="@error('amount') is-invalid @enderror" required>
                        @error('amount')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @error('amount_limit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
