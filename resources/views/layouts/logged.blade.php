<!DOCTYPE html>
<html lang="rus">
	<head>
		<title>Город говорит</title>
		<meta charset="utf-8">
		<link  rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="shortcut icon" href="{{ asset('images/g.jpg') }}" type="image/x-icon">
		<link  rel="stylesheet" href="{{  asset('css/style.css') }}" />
		<link  rel="stylesheet" href="{{  asset('css/skin.css') }}" />
		<link  rel="stylesheet" href="{{  asset('css/reset.css') }}" />
		<link  rel="stylesheet" href="{{ asset('css/styles.css') }}" /> 
		<link  rel="stylesheet" href="{{ asset('css/jquery.rating.css') }}" />


		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
			
			<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
			<script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
			<script type="text/javascript" src="{{ asset('js/jquery.cookies.js') }}"></script>
			
			<script type="text/javascript" src="{{ asset('js/jquery.rating-2.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/my.js') }}"></script>

		<script type="text/javascript">
            $(window).load(function() {

                $("#flexiselDemo3").flexisel({
                    visibleItems: 3,
                    itemsToScroll: 1,
                    autoPlay: {
                        enable: true,
                        interval: 5000,
                        pauseOnHover: true
                    }
                });
            });
		</script>
	</head>
		
		<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		

	<body class="home">

		<div id="wrap">
			<div id="header" > <a href = "/"><img src="{{ asset('images/1.png') }}" /></a>
				<div id = "text">
					<p>Вы в Таганроге и не знаете, как провести свободное время?</p>
					<p>Тогда этот сайт - то, что вам нужно!</p>
				</div>
				<p id = "taganrog">Таганрог</p>

				<form method="post" action="/exit">
					<button type="submit" style = "position: absolute; font-size: 20px; top:70%; margin-left:30px;">Выход</button>
					{{  csrf_field() }}
				</form>

				<form style = "padding-top:110px; right:10px; position:absolute; " action="{{ route('search_form') }}" method="post" name="form_s">
					<p><input name="search" type="text" size="20" maxlength="40" class="search_t">
					<input type="submit" name="submit_s" value="Поиск" class="search_b"></p>
					{{  csrf_field() }}
					<p style = "font-size:13px; color:#6E706C;">Введите не менее 4 символов</p>
				</form>
				
				
			</div>
			
			
			

			@yield('content')
						
					
		<div id="footer">
				<p> ИТА ЮФУ Таганрог 2016 </p>
				<p>По любым вопросам обращаться на почту: <a>cherednikova_any@mail.ru</a></p>
			</div>
		</div>
		
		
		

	</body>

</html>