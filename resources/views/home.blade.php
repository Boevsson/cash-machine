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
                <a href="{{ url('create-cash-transaction') }}">Create cash transaction</a>
            </div>
            <div class="">
                <a href="{{ url('create-card-transaction') }}">Create card transaction</a>
            </div>
            <div class="">
                <a href="{{ url('create-bank-transaction') }}">Create bank transaction</a>
            </div>
        </div>
    </body>
</html>
