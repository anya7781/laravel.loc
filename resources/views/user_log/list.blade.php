@extends('layouts.logged')
 
 @section('content') 
 
	<div id="nav">
      <ul class="menu">
        <li><a href="/">Главная</a></li>
		
		@foreach ($menu as $link)
			@if ($link->id_cat == $id_cat)
						<li> <a style = "color:#2684cd!important"  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@else 
						<li> <a  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@endif		
		@endforeach			
	</ul>
    </div>
 
   
   <div id="featured-section" style = "padding: 15px; width: 1020px;">

	   <form action = "/new_place" method = "post">
		   <button type = "submit"  style = "float: right; border-radius: 5px; padding: 5px; font-size: 20px;"> Добавить место </button>
		   {{  csrf_field() }}
	   </form>
		
		@if ($id_cat != 8)
			@foreach($list as $note)
				@if ($note->active == 1)
					<a href = "/place/{{$note->id_place }}"> 
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description'> {{  $note->descript }}
							<a href = '/place/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
						</div>
					</div>
			   @endif
			@endforeach
		@else
			@foreach($list as $note)
					<a href = "/others/{{$note->id_place }}"> 
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description' > {{  $note->descript }}
							<a href = '/others/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
						</div>
					</div>
			@endforeach
		@endif
		
	</div>

 @endsection