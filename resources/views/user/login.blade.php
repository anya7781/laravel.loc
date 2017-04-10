
 @extends('layouts.site')
 
 @section('content')

	 <p style = "margin-top: 30px;" align="center" hidden = "true">Регистрация прошла успешно! Пожалуйста, авторизуйтесь.</p>

	 <div id="featured-section" style = "width: 50%; margin: 10% 0 10% 25%; padding: 30px; font-size: 20px; position: relative;">

	 <form class="form-horizontal" action = "{{ url('/') }}" method="post" id = "user">
		 <div class="form-group">
			 <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			 <div class="col-sm-10">
				 <input type="email" name = "email" class="form-control" id="inputEmail3" placeholder="Email" required>
			 </div>
		 </div>
		 <div class="form-group">
			 <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			 <div class="col-sm-10">
				 <input type="password" name = "password" class="form-control" id="inputPassword3" placeholder="Password" required>
			 </div>
		 </div>

		 <div class="form-group">
			 <div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-default">Войти</button>
				 <p> <a style = "font-size: 15px; margin-top: 5px;" href = "/forgot_password"> Забыли пароль? </a></p>
			 </div>
		 </div>

		 <p hidden = "true"> Вы не зарегистрированы </p>
		 <p hidden = "true"> Неверный пароль </p>

		 {{  csrf_field() }}
	 </form>

		 <form action = "registration">
			 <div class="form-group" style = "position: absolute; right: 5%; bottom:22%;">
				 <button type="submit" class="btn btn-default">Регистрация</button>
			 </div>
		 </form>

</div>
 @endsection