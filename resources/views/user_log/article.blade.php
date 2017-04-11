
 @extends('layouts.logged')
 
 @section('content')

	 <script type="text/javascript">

         $(function(){
             $('#rating_2').rating({
                 fx: 'half',
                 image: '{{ asset("images/stars.png") }}',
                 loader: '{{ asset("images/ajax-loader.gif") }}',
                 //url: 'rating.php',
                 callback: function(responce){
                     this.vote_success.fadeOut(2000);
                     alert('Общий бал: '+this._data.val);
                 }
             });
         });

         $(window).load(function() {

             $("#flexiselDemo3").flexisel({
                 visibleItems: 3,
                 itemsToScroll: 1,
                 autoPlay: {
                     enable: true,
                     interval: 5000,
                     pauseOnHover: true
                 }
             });
         });


         $(document).ready(function(){
             total_reiting = 3; // итоговый рейтинг
             id_arc = 4; // id статьи
             var star_widht = total_reiting*17 ;
             $('#raiting_votes').width(star_widht);
             $('#raiting_info h5').append(total_reiting);
             he_voted = $.cookies.get(id_arc); // проверяем есть ли кука?
             if(he_voted == null){
                 $('#raiting').hover(function() {
                         $('#raiting_votes, #raiting_hover').toggle();
                     },
                     function() {
                         $('#raiting_votes, #raiting_hover').toggle();
                     });
                 var margin_doc = $("#raiting").offset();
                 $("#raiting").mousemove(function(e){
                     var widht_votes = e.pageX - margin_doc.left;
                     if (widht_votes == 0) widht_votes =1 ;
                     user_votes = Math.ceil(widht_votes/17);
                     // обратите внимание переменная  user_votes должна задаваться без var, т.к. в этом случае
                     // она будет глобальной и мы сможем к ней обратиться из другой ф-ции
                     //(нужна будет при клике на оценке).
                     $('#raiting_hover').width(user_votes*17);
                 });
                 // отправка
                 $('#raiting').click(function(){
                     $('#raiting_info h5, #raiting_info img').toggle();
                     $.get(
                         "raiting.php",
                         {id_arc: id_arc, user_votes: user_votes},
                         function(data){
                             $("#raiting_info h5").html(data);
                             $('#raiting_votes').width((total_reiting + user_votes)*17/2);
                             $('#raiting_info h5, #raiting_info img').toggle();
                             $.cookies.set('article'+id_arc, 123, {hoursToLive: 1}); // создаем куку
                             $("#raiting").unbind();
                             $('#raiting_hover').hide();
                         }
                     )
                 });
             }

         });
	 </script>

	<div id="nav">
      <ul class="menu">
        <li><a href="/">Главная</a></li>
		
		@foreach ($menu as $link)
			@if ($link->id_cat == $id)
						<li> <a style = "color:#2684cd!important"  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@else 
						<li> <a  href='/{{$link->id_cat}}'>  {{ $link->name }} </a>
					@endif		
		@endforeach			
	</ul>
    </div>
	
	<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! Rating !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
	
	<div class="border-wrap">
			<div id="rating_2">
                <input type="hidden" name="val" value="3.75"/>
            </div>
		</div>
		
 `
	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
 
	 <div id="featured-section" style = "padding: 15px; width: 1020px;">
		
				<p style = 'font-size: 26px; float: bottom; padding-top:50px; font-weight:bold;'>
				{{ $places->name }}</p> 
				<img src = "{{ $places->Main_image }}" style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;'>


		 <div id = 'contacts'>
			 <b>Адрес:</b>
			 <p>{{ $places->adress }}</p>
			 <b>Телефон для справок:</b>
			 <p>{{ $places->contacts }}</p>
			 <b>Официальный сайт:</b>
			 <a href = "{{ $places->main_link }}" target='_blank'>{{ $places->main_link }}</a>

			 <p style = 'margin: 10px; font-size:22px; font-weight:bold;'> Как нас найти: </p>

		 </div>
		 <div style = 'font-size:25px; padding: 7px;'>{{ $places->descript }}</div>

		 <div align = 'center' style = 'margin-top: 30px;'> {!! $places->map !!}</div>

		 <p style = 'margin:30px; font-size:27px; font-weight: bold;'>Фотографии:</p>
			{!!  $places->Images !!}

		 <p style = 'margin:30px; font-size:27px; font-weight: bold;'>Комментарии:</p>

		 <?php $i = 1; ?>
	 @foreach($comments as $comment)

			 <p style = "font-size: 15px; color: #52297a">Комментарий {{$i}}</p>
		 <div style = "width: 500px; border: 1px solid black; margin: 20px; padding: 20px;">
			 <p style = "color: #1f648b; padding-bottom: 10px; "> {{$comment->name_user}}</p>
			 <p> {{$comment->text}}</p>
		 </div>

		 <?php $i++; ?>
	 @endforeach

		 <p style = 'margin:30px; font-size:25px; font-weight: bold;'>Добавить комментарий:</p>
	 <form method = "post" action = "/place/{{$places->id_place}}" style = "margin-left:20px;">
		 <textarea name = "comment" placeholder="Введите текст комментария" cols = "50" rows = "7" required></textarea>
		<br> <button style = "margin: 15px 0 10px 10px">Отправить</button>
		 {{  csrf_field() }}
	 </form>
					
			
			

 @endsection