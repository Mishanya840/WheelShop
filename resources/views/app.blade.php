<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="/css/app.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="container header-logo-row">
		<div class="media">
			<div class="media-left">
				<a href="#">
					<img src="/image/logo.png" alt="..." class="header-logo img-responsive img-rounded">
				</a>
			</div>
			<div class="media-body">
				<h3 class="media-heading">ШиноМаг</h3>
				<h4 class="header-text">Интернет-магазин колёс на ваш автомобиль</h4>
			</div>
			<div class="media-right ">
				<a href="#">
					<img src="/image/glyphicons-203-shopping-cart.png" alt="..." class="shopping-cart">
					<span class="badge">4</span>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<nav class="navbar mynavbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li ><a href="/">Галавная</a></li>
					<li><a href="/wheel">Колёса</a></li>
					<li><a href="/tire">Шины</a></li>
					<li><a href="/disk">Диски</a></li>
					<li><a href="/other">Прочее</a></li>
				</ul>
				<p class="navbar-text navbar-right">Звоните : 8(981)80-97-883</p>
			</div>
		</nav>
	</div>
</div>

	@yield('content')

			<!-- Scripts-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
