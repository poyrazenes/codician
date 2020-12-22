<!doctype html>
<html lang="tr">
<head>
    <title>Codician Sample</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Codician Sample">
    <meta name="author" content="Enes Poyraz">

    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css" rel="stylesheet">
</head>
<body class="text-center">
    <div class="d-flex w-100 h-100 p-3 flex-column">
        @widget('Site\Header', ['active' => $active])

        <main role="main" class="inner cover">
            @yield('content')
        </main>

        @widget('Site\Footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>

    @yield('js')
</body>
</html>
