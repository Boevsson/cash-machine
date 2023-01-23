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
    <div>Success!</div>
    <div>Transaction details:</div>

    <div class="">
        ID: {{$transaction->id}}
    </div>
    <div>
        Amount: {{$transaction->amount}}
    </div>
    <div>
        Inputs:
        @foreach ($transaction->inputs as $key => $input)
            <div>{{$key}}: {{$input}}</div>
        @endforeach
    </div>
    <div class="">
        <a href="{{ url('/') }}">Go home</a>
    </div>
</div>
</body>
</html>
