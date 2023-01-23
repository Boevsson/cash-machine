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

                <form method="POST" action="/create-card-transaction">
                    @csrf
                    <div>
                        <label for="card_number">Card number: </label>
                        <input type="text" name="card_number" id="card_number"
                               class="@error('card_number') is-invalid @enderror" required>
                        @error('card_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="expiration_date">Expiration Date (MM/YYYY): </label>
                        <input type="text" name="expiration_date" id="expiration_date"
                               class="@error('expiration_date') is-invalid @enderror" required>
                        @error('expiration_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="card_holder">Cardholder: </label>
                        <input type="text" name="card_holder" id="card_holder"
                               class="@error('card_holder') is-invalid @enderror" required>
                        @error('card_holder')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="cvv">CVV: </label>
                        <input type="number" name="cvv" id="cardholder"
                               class="@error('cvv') is-invalid @enderror" required>
                        @error('cvv')
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
