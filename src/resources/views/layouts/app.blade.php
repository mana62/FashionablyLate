<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
    <title>FashionablyLate</title>
</head>

<body>
    <header class="container">
        <div class="header">
            <div class="header__inner">
            <h2 class="header__logo">FashionablyLate</h2>
            @yield('button')
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>