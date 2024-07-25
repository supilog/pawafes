<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pawafes</title>
    @vite(['resources/css/reset.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    @vite(['resources/scss/app.scss'])
</head>
<body>
<header>
    <h1 class="potta-one-regular">Pawafes</h1>
</header>
<div class="container text-center mb-2">
    <div class="entrance">
        <a href="{{ route('list') }}">
            <button type="button" class="btn btn-outline-secondary pfentrance">パワフェス図鑑埋め用メモ</button>
        </a>
    </div>
    <div class="notes">
        <div>
            【注意】
        </div>
        <div>
            本アプリはゲームエイト様の選手図鑑データ(<a href="https://game8.jp/pawapuro2024-2025/625623">https://game8.jp/pawapuro2024-2025/625623</a>)を参考にしており、<br>
            2024/07/25時点では図鑑が未完成となっているため、本アプリでも一部データは欠損しておりますので、ご了承ください。<br>
        </div>
    </div>
</div>
<footer>
    <div class="copyright">
        <span class="potta-one-regular">Copyright @Supi</span>
    </div>
</footer>
</body>
</html>
