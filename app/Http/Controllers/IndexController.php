<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request; 
use App\Category;
use Validator;
use App\User ;
use App\Place; //для работой с бд подключаем созданную модельuse 
use App\Other;
use App\Comment;


class IndexController extends Controller {
 
  
  public function main_page() {
	 $images = Category::select(['id_cat','Image']) -> get();	
	 $slider = Place::select(['Main_image', 'id_place'])->where('id_place', '<' , 5)->get();

      if (Session::has('admin'))
          Session::forget('admin');

      if (Session::has('session_user_id')) {
          $user = User::select()->where('id', Session::get('session_user_id'))->first();
          return view('user_log/welcome')->with(['images' => $images, 'slider' => $slider, 'name' => $user->name]); //передача переменных
      }
	 return view('user/welcome')->with(['images' => $images, 'slider' => $slider]); //передача переменных
  }
  
   public function list1($id_cat) {
	 $list = Place::where('id_cat',$id_cat)->get();
	 $menu = Category::select(['id_cat', 'name'])->get();

	 return view('user/list')->with(['list' => $list, 'menu' => $menu, 'id'=>$id_cat]); //передача переменных
  }
  
   public function place1($id_place)
   {
       $places = Place::where('id_place', $id_place)->first();
       $menu = Category::select(['id_cat', 'name'])->get();

       /*------------ Comments-------------*/
       $comments = Comment::where('id_place', $id_place)->get();

       if (Session::has('session_user_id')) {
           return view('user_log/article')->with(['places' => $places, 'menu' => $menu, 'id' => $places->id_cat,
               'comments' => $comments]);
       }
       else
       return view('user/article')->with(['places' => $places, 'menu' => $menu, 'id' => $places->id_cat,
           'comments' => $comments]);
   }
  
   public function search(Request $request) {
		 $search = $request->all();
		 $validator = Validator::make($search, ['search' => 'required|min:4']);
		 if (!$validator->fails()) {
			$menu = Category::select(['id_cat', 'name'])->get();
			$places = Place::select(['Main_image','id_place', 'name', 'descript', 'id_cat'])
			->whereRaw("MATCH(name,descript) AGAINST(? IN BOOLEAN MODE)",$search)->get();

             if (Session::has('session_user_id')) {
                 return view('user_log/search')->with(['list'=> $places, 'menu'=> $menu,
                     'search' => array_first($search), 'count'=> count($places)]);
             }
             else
                return view('user/search')->with(['list'=> $places, 'menu'=> $menu,
                'search' => array_first($search), 'count'=> count($places)]);
            }
		else
			return back();
	}
	
	public function others($id_place) {
        $places = Other::select(['name', 'id_place', 'contacts'])->where('id_place', $id_place)->get();
		 $menu = Category::select(['id_cat', 'name'])->get();

        if (Session::has('session_user_id')) {
            return view('user_log/others')->with(['places'=>$places, 'menu' => $menu]);
        }
		 return view('user/others')->with(['places'=>$places, 'menu' => $menu]);
	}

    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user == NULL) echo "Вы не зарегистрированы";
        else if ($user->password != $password) echo "Пароль не верный";
        else {
            Session::put('session_user_id', $user->id);
            $images = Category::select(['id_cat','Image']) -> get();
            $slider = Place::select(['Main_image', 'id_place'])->where('id_place', '<' , 5)->get();

            if ($user->admin == 1)
                return  view('admin/welcome')->with(['images' => $images,
                    'slider' => $slider, 'name' => $user->name, 'admin' => true]);
            return  view('user_log/welcome')->with(['images' => $images,
                'slider' => $slider, 'name' => $user->name]);
        }

    }

    public function registration(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');

        if ($password1 != $password2)
            echo "Неверное подтверждение пароля";
        else
            { $users = User::where('email', $email)->first();
                if ($users != NULL)
                    echo "Пользователь с таким email уже зарегистрирован на сайте";
                 else {
                     User::insert(
                         ['email' => $email, 'name' => $name, 'password' => $password1]
                     );
                     echo($name.", регистрация прошла успешно");
                     return redirect('/login');
                 }
            }
    }


    public function new_password(Request $request)
    {
        $email = $request->input('email');

        $users = User::where('email', $email)->first();
        if ($users == NULL)
            echo "Пользователя с таким email не существует";
        else {
            echo "Вам на указанным почтовый адрес отправлен новый пароль";
            return redirect('/');
        }
    }



}