
@extends('layouts.admin')

@section('content')

	<div id="nav">
		<ul class="menu">

			@foreach ($menu as $link)
				@if ($link->id_cat == $id)
					<li> <a style = "color:#2684cd!important"  href='/admin/{{$link->id_cat}}'>  {{ $link->name }} </a>
				@else
					<li> <a  href='/admin/{{$link->id_cat}}'>  {{ $link->name }} </a>
				@endif
			@endforeach
		</ul>
	</div>

	`
	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

	<div id="featured-section" style = "padding: 15px; width: 1020px;">

		@if ($places->active == 0)
			<form action = "/admin/active/{{$places->id_place }}" method = "get">
				<button style = "background-color: #ea4949; border-radius: 5px; padding: 5px;">Активировать</button>
			</form>
		@endif

		<form action = "/admin/delete/{{$places->id_place }}" method = "get">
			<button style = "background-color: #ea4949; border-radius: 5px; padding: 5px; float:right; margin-top:-27px;">Удалить место</button>
		</form>

		<p style = 'font-size: 26px; float: bottom; padding-top:50px; font-weight:bold;'>
			{{ $places->name }}</p>
		<img src = "{{ $places->Main_image }}" style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;'>


		<div id = 'contacts'>
			<b>Адрес:</b>
			<p>{{ $places->adress }}</p>
			<b>Телефон для справок:</b>
			<p>{{ $places->contacts }}</p>
			<b>Официальный сайт:</b>
			<a href = "{{ $places->main_link }}" target='_blank'>{{ $places->main_link }}</a>

			<p style = 'margin: 10px; font-size:22px; font-weight:bold;'> Как нас найти: </p>

		</div>
		<div style = 'font-size:25px; padding: 7px;'>{{ $places->descript }}</div>

		<div align = 'center' style = 'margin-top: 30px;'> {!! $places->map !!}</div>

		<p style = 'margin:30px; font-size:27px; font-weight: bold;'>Фотографии:</p>
		{!!  $places->Images !!}

		<p style = 'margin:30px; font-size:27px; font-weight: bold;'>Комментарии:</p>

        <?php $i = 1; ?>
		@foreach($comments as $comment)

			<p style = "font-size: 15px; color: #52297a">Комментарий {{$i}}</p>
			<div style = "width: 500px; border: 1px solid #52297a; margin: 20px; padding: 20px; border-radius:5px;">
				<p style = "color: #1f648b; padding-bottom: 10px; font-weight: bold; "> {{$comment->name_user}}</p>
				<p> {{$comment->text}}</p>
				<form action = "/admin/delete_comment/{{$comment->id }}" method = "get">
					<button style = "background-color: #ea4949; border-radius: 5px; padding: 5px; margin-top:20px;">Удалить</button>
				</form>
			</div>

    <?php $i++; ?>
	@endforeach






@endsection