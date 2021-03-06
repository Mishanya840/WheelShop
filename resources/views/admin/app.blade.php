<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/lib/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script src="/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/alertify.js"></script>
    {{--
        <script src="{{asset("js/functions.js")}}"></script>
    --}}
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="/css/alertify.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <link href="/css/app.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='/lib/fontRoboto.css' rel='stylesheet' type='text/css'>
</head>
<body>


<div class="container header-logo-row">
    <div class="log-panel panel panel-default auth-panel">
        <ul >
            @if(\Illuminate\Support\Facades\Auth::guest())
                <li><a href="/auth/login">Войти</a></li>
                <li><a href="/auth/register">Регистрация</a></li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check())
                <li><a href="/admin">Добавить товар</a></li>
                <li><a href="/auth/logout">Выйти</a></li>
            @endif
        </ul>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="{{route('main')}}">
                <img src="/image/logo.png" alt="..." class="header-logo img-responsive img-rounded">
            </a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">ШиноМаг</h3>
            <h4 class="header-text">Интернет-магазин колёс на ваш автомобиль</h4>
        </div>

    </div>
</div>
<div class="container">
    <nav class="navbar mynavbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a href="/">Главная</a></li>
                <li><a href="/wheel">Колёса</a></li>
                <li><a href="/tire">Шины</a></li>
                <li><a href="/disk">Диски</a></li>
            </ul>
            <p class="navbar-text navbar-right">Звоните : 8(981)80-97-883</p>
        </div>
    </nav>
</div>

@yield('content')

<div class="container">
    <div class="row panel-footer">
        <div class="col-md-4 col-sm-4">
            <h3>Свяжитесь с нами</h3>
            <p>Город Кропоткин, улица Целинная 25.<br>119019. Россия. Тел +7(999)000-00-00<br>info@mail.ru</p>
        </div>
        <div class="col-md-4 col-sm-4">
            <h3 class="text-center">Обслуживание клиентов</h3>
            <div class="list-group">
                <a class="list-group-item" href="/contacts">Контакты</a>
                <a class="list-group-item" href="/delivery">Доставка</a>
                <a class="list-group-item" href="/return">Возврат</a>
                <a class="list-group-item" href="/warranty">Оплата и гарантия</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <h3 class="text-right">Мы принимаем</h3>
            <div class="text-right">
                <a><img src="/image/Visa.png"></a>
                <a><img src="/image/Mastercard.png"></a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        repaintBadgeCart();
    });
</script>




{{--
	<script type="text/javascript" src="/js/main.js"></script>
--}}

</body>
</html>
