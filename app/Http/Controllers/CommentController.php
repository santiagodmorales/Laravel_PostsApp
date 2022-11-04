<?php

namespace App\Http\Controllers;

use App\Models\{comment,image,post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Cache\Store;


class CommentController extends Controller
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
    public function index($id)
    {
        //ORM-2  Consulta comments:
        //$datos = Comment::all(['comment_id','text','created_at','user_id']);

        //Comments primera quincena de julio
        //$datos = Comment::whereBetween('created_at',['2022-07-01','2022-07-15'])
        //->get();
        
        //ORM-4  comentarios conjuntamente con sus imágenes
        //$datos = Comment::join('images','comments.comment_id','images.comment_id')
        //->select('images.filename','comments.*')
        //->get();
        $datos = Post::find($id);
        $datos = Comment::leftjoin('images','comments.comment_id','images.comment_id')
        ->select('comments.*','images.path', 'images.filename')
        ->where('comments.post_id','=',$id)
        ->get();

         return view('comments.list',['datos' => $datos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user_id = '1';
        $comment->post_id = $request->post_id;
        $comment->save();
       
        return redirect()->route('posts.index')-> with('success',"Se creó nuevo comentario! N°{$comment->comment_id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
