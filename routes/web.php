<?php

/*-------------------------------- Админ ---------------------------------*/
Route::get('admin',  'AdminController@admin');

Route::post('admin', 'AdminController@login');

//вывод списка мест
Route::get('admin/{id_cat}', 'AdminController@list1');

//открываем конкретную страницу
Route::get('/admin/place/{id_place}', 'AdminController@place1');

Route::get('/admin/active/{id_place}', 'AdminController@active');

Route::get('/admin/delete/{id_place}', 'AdminController@delete');

Route::any('/admin/delete_other/{id_oth}', 'AdminController@delete_other');

Route::get('/admin/others/{id_place}', 'AdminController@others');

Route::any('/admin/exit', 'AdminController@exit1');

Route::any('/admin/delete_comment/{id}', 'AdminController@delete_comment');


/*-------------------------------- Не зарегистрированный -------------------------------------*/

Route::get('/', 'IndexController@main_page')->name('categoryShow');

//вывод списка мест
Route::get('category/{id_cat}', 'IndexController@list1');

//открываем конкретную страницу
Route::get('place/{id_place}', 'IndexController@place1');

//вход
Route::any('login', function(){
   return view("user/login");
});

Route::post('/', 'IndexController@login');

//забыли пароль
Route::any('forgot_password', function(){
    return view("user/forgot_password");
});

Route::post('new_password', 'IndexController@new_password');


// Регистрация
Route::any('registration', function(){
    return view("user/registration");
});
Route::post('regist', 'IndexController@registration');


//передача данных через форму
Route::post('search', 'IndexController@search')->name('search_form');

Route::get('others/{id_place}', 'IndexController@others');


/*-------------------------------- Зарегистрированный -------------------------------------*/

//вывод списка мест
Route::get('/{id_cat}', 'LoggedController@list1');

Route::post('new_place', 'LoggedController@new_place');

Route::post('/send_place', 'LoggedController@send_place');

Route::post('/exit', 'LoggedController@exit1');

Route::post('place/{id_place}', 'LoggedController@place1');




