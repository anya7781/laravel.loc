
 @extends('layouts.site')
 
 @section('content')



	 <div id="featured-section" style = "width: 50%; margin: 10% 0 10% 25%; padding: 30px; font-size: 20px; position: relative;">

	 <form class="form-horizontal" action = "{{ url('new_password') }}" method="post">
		 <div class="form-group">
			 <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			 <div class="col-sm-10">
				 <input type="email" name = "email" class="form-control" id="inputEmail3" placeholder="Введите ваш Email" required>
			 </div>
		 </div>

		 <div class="form-group">
			 <div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-default">Новый пароль</button>
			 </div>
		 </div>


		 {{  csrf_field() }}
	 </form>


</div>
 @endsection