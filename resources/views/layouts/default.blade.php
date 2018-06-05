<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Start Demo') - Laravel 入门</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('layouts._header')

    <div class="container">
        @yield('content')
        @include('layouts._footer')
    </div>
</body>
</html>