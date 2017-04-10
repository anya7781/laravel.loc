
 @extends('layouts.logged')
 
 @section('content')

	<div id="nav">
      <ul class="menu">
        <li><a href="/">Главная</a></li>
		
		@foreach ($menu as $link)
			@if ($link->id_cat == $id)
						<li> <a style = "color:#2684cd!important"  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@else 
						<li> <a  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@endif		
		@endforeach			
	</ul>
    </div>
	
	<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! Rating !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
	
	<div class="border-wrap">
			<div id="rating_2">
                <input type="hidden" name="val" value="3.75"/>
            </div>
		</div>
		
 `
	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
 
	 <div id="featured-section" style = "padding: 15px; width: 1020px;">
		
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
		 <div style = "width: 500px; border: 1px solid black; margin: 20px; padding: 20px;">
			 <p style = "color: #1f648b; padding-bottom: 10px; "> {{$comment->name_user}}</p>
			 <p> {{$comment->text}}</p>
		 </div>

		 <?php $i++; ?>
	 @endforeach

		 <p style = 'margin:30px; font-size:25px; font-weight: bold;'>Добавить комментарий:</p>
	 <form method = "post" action = "/place/{{$places->id_place}}" style = "margin-left:20px;">
		 <textarea name = "comment" placeholder="Введите текст комментария" cols = "50" rows = "7" required></textarea>
		<br> <button style = "margin: 15px 0 10px 10px">Отправить</button>
		 {{  csrf_field() }}
	 </form>
					
			
			

 @endsection