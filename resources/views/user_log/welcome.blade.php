@extends('layouts.logged')
 
 @section('content')


	<div id="featured-section">

		@if (isset($name))
			<p align="center" style = "color: #52297a; font-size: 20px;">Здравствуй, {{$name}}! Добро пожаловать на наш сайт!</p>
		@endif

		<div class ="circles">
			@foreach($images as $one_image)
				<a href = "/{{$one_image->id_cat}} "> {!!  $one_image->Image !!} </a>
			@endforeach
		</div>
		<!--end circles-->
		
	</div>
	<!--end featured-section-->


	<div id="frontpage-main">
		<div id="frontpage-content">
			  <h3>Информация о городе:</h3>
			  <p>	Таганрог – второй по величине город в Ростовской области, 
			  расположенный на северном побережье Таганрогского залива Азовского моря.
			  Его можно смело назвать городом-курортом – он привлекателен для людей, 
			  стремящихся отдохнуть на море и позагорать на городских пляжах.
			  </p>
			  <p> Множество опрятных двориков, словно игрушечных домов и морской климат создают приятное впечатление, если вас радует тихая, умиротворенная и спокойная атмосфера, то этот город — то, что вам нужно.</p>
		
			<h3 style = "margin-top: 50px; margin-bottom:40px; font-weight: bold; padding-left: 30px;">Советуем посетить:</h3>
			
			<ul id="flexiselDemo3">
				@foreach($slider as $image)
					<li><a href="place/{{ $image->id_place }}" class='circles'><img src="{{$image->Main_image}}" /></a></li>	
				@endforeach
			</ul>
			
		</div>
	</div>


		
	
		<!--end frontpage-content-->
	
	@endsection
	