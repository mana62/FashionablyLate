<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=M+PLUS+Rounded+1c&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=M+PLUS+1:wght@100..900&family=M+PLUS+Rounded+1c&display=swap"
        rel="stylesheet">
    @yield('css')
    <title>FashionablyLate</title>
</head>

<body>
    <header class="container">
        <div class="header">
            <h2 class="header__logo">FashionablyLate</h2>
            @yield('button')
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
