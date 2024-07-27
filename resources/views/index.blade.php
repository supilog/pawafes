<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pawafes</title>
    <link rel="stylesheet" href="{{ asset('vendor/foundation-icons/foundation-icons.css') }}">
    @vite(['resources/css/reset.css'])
    @vite(['resources/scss/app.scss'])
</head>
<body>
<header>
    <h1 class="potta-one-regular">Pawafes</h1>
</header>
<div class="container mb-2">
    <div class="entrance">
        <a href="{{ route('list') }}">
            <button type="button" class="btn btn-outline-secondary pfentrance">パワフェス図鑑埋め用メモ&nbsp;<i class="fi-arrow-right"></i></button>
        </a>
    </div>
    <div class="notes">
        <div>
            【注意1】
        </div>
        <div>
            獲得選手記録をCookieに保存しているので、Cookieを無効にした状態では使用することができません。<br>
        </div>
        <div>
            【注意2】
        </div>
        <div>
            本アプリはゲームエイト様の選手図鑑データ(<a href="https://game8.jp/pawapuro2024-2025/625623">https://game8.jp/pawapuro2024-2025/625623</a>)を参考にしており、<br>
            2024/07/25時点では図鑑が未完成となっているため、本アプリでも一部データは欠損しておりますので、ご了承ください。<br>
        </div>
        <div class="data-delete">
            <a href="#" id="storage-clean">データをクリアする(クリアしたデータは戻せません)</a>
        </div>
    </div>
</div>
<footer>
    <div class="copyright">
        <span class="potta-one-regular">Copyright @Supi</span>
    </div>
</footer>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
@vite(['resources/js/storage.js'])
</body>
</html>
