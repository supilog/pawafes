<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>パワフェス</title>
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
    <h1 class="potta-one-regular">
        <a href="{{ route('list') }}">Pawafes</a>
    </h1>
</header>
<div class="container">
    @yield('content')
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
@vite(['resources/js/app.js'])
</body>
</html>