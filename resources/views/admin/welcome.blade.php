@extends('layouts.admin')
 
 @section('content')

	<div id="featured-section">

		<p align="center" style = "color: #52297a; font-size: 20px;">Добро пожаловать в админ панель!</p>

		<div class ="circles">
			@foreach($images as $one_image)
				<a href = "admin/{{$one_image->id_cat}} "> {!!  $one_image->Image !!} </a>
			@endforeach
		</div>
		<!--end circles-->
		
	</div>

	
	@endsection
	