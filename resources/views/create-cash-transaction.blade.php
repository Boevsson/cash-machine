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

                <form method="POST" action="/create-cash-transaction">
                    @csrf
                    <div>
                        <label for="banknote_1">Bank notes 1: </label>
                        <input type="number" name="banknote_1" id="banknote_1"
                               class="@error('banknote_1') is-invalid @enderror" required>
                        @error('banknote_1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="banknote_5">Bank notes 5: </label>
                        <input type="number" name="banknote_5" id="banknote_5"
                               class="@error('banknote_5') is-invalid @enderror" required>
                        @error('banknote_5')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="banknote_10">Bank notes 10: </label>
                        <input type="number" name="banknote_10" id="banknote_10"
                               class="@error('banknote_10') is-invalid @enderror" required>
                        @error('banknote_10')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="banknote_50">Bank notes 50: </label>
                        <input type="number" name="banknote_50" id="banknote_50"
                               class="@error('banknote_50') is-invalid @enderror" required>
                        @error('banknote_50')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="banknote_100">Bank notes 100: </label>
                        <input type="number" name="banknote_100" id="banknote_100"
                               class="@error('banknote_100') is-invalid @enderror" required>
                        @error('banknote_100')
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
