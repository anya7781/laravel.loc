
@extends('layouts.logged')

@section('content')

	<div id="featured-section" style = "width: 80%; margin: 10% 0 10% 15%; padding: 30px; font-size: 20px; position: relative;">

		<form class="form-horizontal" action = "/send_place" method="post">

			<div class="form-group">
				<label class="col-sm-2 control-label">Фото</label>
				<div class="col-sm-10">
					<input type = "file" name = "img" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Название*</label>
				<div class="col-sm-10">
					<input name = "name" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Категория</label>
				<div class="col-sm-10">
					<select name = "categ">
					@foreach($categories as $category)
						<option>{{$category->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Описание</label>
				<div class="col-sm-10">
					<textarea name = "description" class="form-control"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Адрес</label>
				<div class="col-sm-10">
					<input name = "adress" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Телефон</label>
				<div class="col-sm-10">
					<input name = "phone" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Ссылка</label>
				<div class="col-sm-10">
					<input name = "link" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Фото</label>
				<div class="col-sm-10">
					<input type = "file" name = "images" multiple>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10">
					<input style = "margin-top: 15px;" type = "submit" value = "Отправить">
				</div>
			</div>


			{{  csrf_field() }}
		</form>


	</div>
@endsection