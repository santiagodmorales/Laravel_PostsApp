<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //ORM-1  Consulta posts:
        $datos = Post::all(['post_id','text','created_at','user_id']);

        //Posts mes de agosto
        //$datos = Post::whereBetween('created_at',['2022-08-01','2022-08-31'])
        //->get();


        //ORM-3 Posts que posean la letra T o ID_usuario = 1/3/5/7/9.
        //$datos = Post::where('text','like','%t%')
        //->orWhere('user_id',[1, 3, 5, 7, 9])
        //->get();

        //DB-1  posts que posean más de 5 comentarios
       // $datos = DB::table('posts') 
        //->join('comments', 'posts.post_id','=','comments.post_id')
        //->select('posts.*',DB::raw('COUNT(comment_id) as comments_count'))
        //->groupBy('post_id','user_id','text','created_at','updated_at')
        //->having('comments_count', '>', 5)
        //->get();
        
        //DB-3  Mostrar posts con comentaros eliminados
        //$datos = DB::table('posts') 
        //->join('comments', 'posts.post_id','=','comments.post_id')
        //->select('posts.*')
        //->where('comments.deleted',1)
        //->get();



        return view('posts.list',['datos' => $datos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post();
        $newPost->text = $request->text;
        $newPost->user_id = '1';
        $newPost->save();

        return redirect()->route('posts.index')-> with('success',"Se creó nuevo post! N°{$newPost->post_id}");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
