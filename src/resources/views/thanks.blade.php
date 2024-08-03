<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=M+PLUS+Rounded+1c&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=M+PLUS+1:wght@100..900&family=M+PLUS+Rounded+1c&display=swap"
        rel="stylesheet">
    <title>FashionablyLate</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-color: #fff;
        }

        .background-text {
            font-size: 10rem; /* rem大きいサイズ指定 */
            color: #8B79690D;
            background: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            white-space: nowrap;  /* 改行をなくす */
        }

        .content {
            text-align: center;
            position: relative;
            z-index: 1; /* 背景の上に表示する */
        }

        .thank-you-message {
            font-size: 35px;
            font-weight: bold;
            color: #8b7969;
            font-family: "Kiwi Maru", serif;
            margin-bottom: 40px
        }

        .link {
            width: 200px;
            position: relative;
            z-index: 1;
            margin: 0 auto;
        }

        .link a {
            padding: 10px 30px;
            border: 1px solid #ede4dc;
            border-radius: 3px;
            cursor: pointer;
            background: #8b7969;
            font-size: 16px;
            transition: background 0.3s, color 0.3s;
            font-family: "Kiwi Maru", serif;
            text-decoration: none;
            color: #fff;
        }

        .link a:hover {
            background: #ccad91;
        }
    </style>

</head>

<body>
    <div class="background-text">Thank you</div>
    <div class="content">
        <div class="thank-you-message">お問合せありがとうございました</div>
        <div class="link">
            <a href={{ route('index') }}>HOME</a>
        </div>
    </div>
</body>

</html>
