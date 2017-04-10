
 @extends('layouts.admin')
 
 @section('content')


	 <div id="featured-section" style = "width: 70%; margin: 10% 0 10% 15%; padding: 30px; font-size: 20px; position: relative;">

	 <form class="form-horizontal" action = "{{ url('send_place') }}" method="post">

		 <div class="form-group">
			 <label class="col-sm-2 control-label" style = "">Главное фото</label>
			 <div class="col-sm-10">
				 <input type = "file" name = "img" accept="image/png,image/jpeg">
			 </div>
		 </div>

		 <div class="form-group">
			 <label class="col-sm-2 control-label" style = "">Название*</label>
			 <div class="col-sm-10">
				 <input name = "name" class="form-control" required>
			 </div>
		 </div>


		 <div class="form-group">
             <label class="col-sm-2 control-label">Категория</label>
             <div class="col-sm-10">
		 <select name = "categ">
             @foreach($categories as $categ)
                 <option>{{  $categ->name  }}</option>
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
				 <input type = "tel" name = "phone" class="form-control">
			 </div>
		 </div>

		 <div class="form-group">
			 <label class="col-sm-2 control-label">Ссылка</label>
			 <div class="col-sm-10">
				 <input name = "link" class="form-control">
			 </div>
		 </div>

		 <div class="form-group">
			 <label class="col-sm-2 control-label" style = "">Другие фото</label>
			 <div class="col-sm-10">
				 <input type = "file" name = "images" multiple accept="image/png,image/jpeg">
			 </div>
		 </div>

		 <div class="form-group">
			 <div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-default">Отправить</button>
			 </div>
		 </div>

		 {{  csrf_field() }}
	 </form>


</div>
 @endsection