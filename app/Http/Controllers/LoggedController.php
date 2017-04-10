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


class LoggedController extends Controller {

    /*************  Register **************/


    public function list1($id_cat) {
        $list = Place::where('id_cat',$id_cat)->get();
        $menu = Category::select(['id_cat', 'name'])->get();
        return view('user_log/list')->with(['list' => $list, 'menu' => $menu, 'id_cat'=>$id_cat]); //передача переменных
    }

    public function send_place(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $img = $request->input('img');
        $images = $request->input('images');
        $adress = $request->input('adress');
        $phone = $request->input('phone');
        $link = $request->input('link');
        $categ_name = $request->input('categ');

        $id_cats = Category::select(['id_cat'])->where('name', $categ_name)->get();
        foreach ($id_cats as $id_cat)
            $id = $id_cat->id_cat;

               Place::insert(
                    ['id_cat' => 1,'name' => $name, 'descript' => $description, 'adress' => $adress, 'contacts' => $phone,
                        'main_link' => $link, 'Main_image' => $img, 'Images' => $images, 'id_cat' => $id]
                );

       return redirect('/');
    }


    public function new_place()
    {
        $categories = Category::select(['id_cat', 'name'])->get();
        return view('user_log/new_place')->with(['categories'=>$categories]);
    }


    public function exit1()
    {
        Session::forget('session_user_id');
        return redirect('/');
    }

    public function place1(Request $request, $id_place)
    {
        $comment = $request->input('comment');

        $id_user =  Session::get('session_user_id');
        $user = User::select('name')->where('id', $id_user)->first();

        Comment::insert(
            ['name_user' => $user->name,'id_place' => $id_place, 'text' => $comment]
        );

        $places = Place::select(['name', 'descript', 'adress', 'contacts', 'main_link',
            'Images', 'Main_image', 'id_cat', 'rating', 'id_place', 'map'])->where('id_place', $id_place)->first();
        $menu = Category::select(['id_cat', 'name'])->get();

        /*------------ Comments-------------*/
        $comments = Comment::where('id_place', $id_place)->get();

            return view('user_log/article')->with(['places' => $places, 'menu' => $menu, 'id' => $places->id_cat,
                'comments' => $comments]);
    }

}