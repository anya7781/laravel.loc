
 @extends('layouts.admin')
 
 @section('content')

	 <p align = "center" style = "margin: 10% 0 2% 0; font-size: 20px;">Вход в админ панель</p>

	 <div id="featured-section" style = "width: 50%; margin: 0 0 10% 25%; padding: 30px; font-size: 20px; position: relative;">


	 <form class="form-horizontal" action = "{{ url('/admin') }}" method="post">
		 <div class="form-group">
			 <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
			 <div class="col-sm-10">
				 <input type="password" name = "password" class="form-control" id="inputPassword3" placeholder="Password" required>
			 </div>
		 </div>

		 <div class="form-group">
			 <div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-default">Войти</button>
			 </div>
		 </div>

		 {{  csrf_field() }}
	 </form>

</div>
 @endsection