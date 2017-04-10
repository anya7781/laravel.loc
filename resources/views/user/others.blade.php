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
		<table>
			@foreach($places as $note)
					
				<tr>
				
					<td> 
						<p style = 'font-size: 28px; padding-top:50px; color: #1D1670'>
							{{  $note->name }}
						</p> 
					</td>	
					<td style = "padding:10px 0 70px 200px; font-size:25px"> 
						{{  $note->contacts }}
					</td>
				
						
				<tr>	
					
			@endforeach
		</table>
		
	</div>

 @endsection