
 @extends('layouts.site')
 
 @section('content')

	<div id="nav">
      <ul class="menu">
        <li><a href="/">Главная</a></li>
		
		@foreach ($menu as $link)
			<li> <a  href='/category/{{$link->id_cat}}'>  {{ $link->name }} </a> 			
		@endforeach			
	</ul>
    </div>
	
	<div id="featured-section" style = "padding: 15px; width: 1020px;">
		
		<p style = "font-size:25px;"> Результаты поиска по запросу  <b>"{{ $search }}" </b>: </p>
		
		@if ($count > 0)
		
		
			@foreach($list as $note)
			@if ($note->id_cat != 8)
					<a href = "/place/{{$note->id_place }}"> 
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description'> {{  $note->descript }}
							<a href = '/place/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
						</div>
					</div>
			@else
					<a href = "/others/{{$note->id_place }}"> 
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description' > {{  $note->descript }}
							<a href = '/others/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
						</div>
					</div>
			@endif
			@endforeach
		
		
			
		@else 
			<p style = "padding:50px 0 50px 100px; font-size:30px;">По данному запросу ничего не найдено!</p>
		@endif
		
	</div>

	 

							

 @endsection