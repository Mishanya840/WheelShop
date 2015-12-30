<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/lib/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script src="/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/alertify.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="/css/alertify.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container log-panel panel panel-default">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/auth/logout">Выйти</a></li>
        </ul>
    </div>

@yield('content')

<script>
    $(document).ready(function() {



    });
</script>

</body>
</html>
