<?php

use Illuminate\Support\Facades\Session;
?>

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

		<script type="text/javascript" src="{{ asset('js/my.js') }}"></script>

	
	
	</head>
		
		<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		

	<body class="home">

		<div id="wrap">

			<?php if (Session::has('admin')) { ?>
			<form method = "post" action = "/admin/exit" style = "margin:20px;">
				<button type = "submit">Выход из админ панели</button>
				{{  csrf_field() }}
			</form>
			<?php } ?>

			@yield('content')


	</body>

</html>