
@extends('layouts.site')

@section('content')

	<div id="featured-section" style = "width: 50%; margin: 10% 0 10% 25%; padding: 30px; font-size: 20px; position: relative;">

		<form class="form-horizontal" action = "{{ url('regist') }}" method="post">

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Имя*</label>
				<div class="col-sm-10">
					<input name = "name" class="form-control" placeholder="Введите ваше имя" required>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email*</label>
				<div class="col-sm-10">
					<input type="email" name = "email" class="form-control" id="inputEmail3" placeholder="email" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Пароль*</label>
				<div class="col-sm-10">
					<input type="password" name = "password1" class="form-control" id="inputPassword3" placeholder="пароль" required>
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword2" class="col-sm-2 control-label" style = "font-size: 15px;">Повторите*</label>
				<div class="col-sm-10">
					<input type="password" name = "password2" class="form-control" id="inputPassword2" placeholder="пароль" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Зарегистрироваться</button>
				</div>
			</div>

			<p hidden = "true"> Пользователь с таким email уже существует </p>
			<p hidden = "true"> Неверное подтверждение пароль </p>

			{{  csrf_field() }}
		</form>


	</div>
@endsection