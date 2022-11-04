<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsModalController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
       
     return view('comments.modal',['post_id' => $id] );
}
}
    

