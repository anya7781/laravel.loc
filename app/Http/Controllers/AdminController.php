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
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {

    public function admin() {
        if (Session::has('admin')){
            $images = Category::select(['id_cat','Image']) -> get();
            return view('admin/welcome')->with(['images' => $images]);
        }
        else return view('admin/login');
    }

    public function exit1() {
        Session::forget('admin');
        return redirect('/');
    }

    public function login(Request $request) {

        $password = $request->input('password');
        $admin = User::select(['password'])->where('email', 'admin')->first();
         if ($password == $admin->password){
             Session::put('admin', true);

             $images = Category::select(['id_cat','Image']) -> get();
             return view('admin/welcome')->with(['images' => $images]);
         }
         else echo "Пароль введен неверно";
         return back();
        }


    public function list1($id_cat) {
        $list = Place::where('id_cat',$id_cat)->get();
        $menu = Category::select(['id_cat', 'name'])->get();

        return view('admin/list')->with(['list' => $list, 'menu' => $menu, 'id_cat'=>$id_cat]); //передача переменных
    }

    public function place1($id_place)
    {
        $places = Place::where('id_place', $id_place)->first();
        $menu = Category::select(['id_cat', 'name'])->get();

        /*------------ Comments-------------*/
        $comments = Comment::where('id_place', $id_place)->get();

            return view('admin/article')->with(['places' => $places, 'menu' => $menu, 'id' => $places->id_cat,
                'comments' => $comments]);
    }

    public function active($id_place) {
       DB::update('update places set active = 1 where id_place = ?', [$id_place]);
        return back();
    }

    public function delete($id_place) {
        $place = Place::select(['id_cat'])->where('id_place', $id_place)->first();
        $id_cat = $place->id_cat;
        DB::delete('delete from places where id_place = ?', [$id_place]);

        $list = Place::where('id_cat',$id_cat)->get();
        $menu = Category::select(['id_cat', 'name'])->get();
        return view('admin/list')->with(['list' => $list, 'menu' => $menu, 'id_cat'=>$id_cat]); //передача переменных
    }

    public function delete_other($id_oth) {
        $place = Other::select(['id_place'])->where('id_oth', $id_oth)->first();
        $id_place = $place->id_place;
        DB::delete('delete from others where id_oth = ?', [$id_oth]);

        $places = Other::select(['name', 'id_place', 'contacts'])->where('id_place', $id_place)->get();
        $menu = Category::select(['id_cat', 'name'])->get();
        return view('admin/others')->with(['places'=>$places, 'menu' => $menu]);}


    public function others($id_place) {
        $places = Other::where('id_place', $id_place)->get();
        $menu = Category::select(['id_cat', 'name'])->get();

        return view('admin/others')->with(['places'=>$places, 'menu' => $menu]);
    }

    public function delete_comment($id)
    {
        DB::delete('delete from comments where id = ?', [$id]);
        return back();
    }
}