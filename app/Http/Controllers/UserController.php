<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //ORM-5
        //$datos = User::where('updated_at','=','2022-08-17 21:31:26')
                    //(Dejar esta linea comentada!!)---where('updated_at','=','created_at' ) --- por algun motivo no funciona!!
        //->where('email', 'like','%@gmail.com%')
        //->get();


        //DB - 4
        $datos = DB::table('users') 
        ->join('posts','posts.user_id', 'users.user_id')
        //->join('comments','comments.post_id', 'posts.post_id')
        ->select('users.user_id','users.name','users.email','users.updated_at',DB::raw('COUNT(posts.post_id) as posts_count'))//,DB::raw('COUNT(distinct comment_id) as comments_count'))
        ->groupBy('users.user_id','users.name','users.email','users.updated_at')
        //->having('comments_count', '>', 0)
        ->having('posts_count', '>', 0)
        ->get();



        //DB - 5 -Obtener todos los usuarios cuyo correo electrónico no se sea de dominio @outlook.com y a su vez el perfil sea 1.
        //$datos = DB::table('users')
        //->select('user_id','name','email','updated_at','profile')
        //->where('email','like','%@outlook.com%')
        //->where('profile',1)
        //->get();

            return view('users.list',['datos' => $datos]);
        
    }
}
