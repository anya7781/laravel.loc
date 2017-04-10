@extends('layouts.admin')
 
 @section('content') 
 
	<div id="nav">
      <ul class="menu">
		
		@foreach ($menu as $link)
			@if ($link->id_cat == $id_cat)
						<li> <a style = "color:#2684cd!important"  href='/admin/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@else 
						<li> <a  href='/admin/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@endif		
		@endforeach			
	</ul>
    </div>
 
   
   <div id="featured-section" style = "padding: 15px; width: 1020px;">


		@if ($id_cat != 8)
			@foreach($list as $note)

					<a href = "/admin/place/{{$note->id_place }}">
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description'> {{  $note->descript }}
							<a href = '/admin/place/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
                            @if ($note->active == 0)
                                <form action = "/admin/active/{{$note->id_place }}" method = "get">
                                    <button style = "background-color: #ea4949; border-radius: 5px; padding: 5px;">Активировать</button>
                                </form>

                            @endif
                            <form action = "/admin/delete/{{$note->id_place }}" method = "get">
                                <button style = "background-color: #ea4949; border-radius: 5px; padding: 5px; float:right; margin-top:-40px;">Удалить место</button>
                            </form>

						</div>
					</div>

			@endforeach
		@else
			@foreach($list as $note)
					<a href = "/admin/others/{{$note->id_place }}">
						<p style = 'font-size: 28px; padding-top:50px;'>{{  $note->name }}</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = "{{ asset($note->Main_image)}}">
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description' > {{  $note->descript }}
							<a href = '/admin/others/{{$note->id_place }}'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
						</div>
					</div>
			@endforeach
		@endif
		
	</div>

 @endsection