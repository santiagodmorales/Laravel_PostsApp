<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Cache\Store;

class ImageController extends Controller
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
        //DB-2
       // $datos = DB::table('images')
       // ->join('comments', 'images.comment_id','=','comments.comment_id')
       // ->select('images.filename')
        //->whereMonth('comments.created_at',1)
        //->orWhereMonth('comments.created_at',2)
       // ->get();


        
        return view('images.list',['images'=> Image::all(), 'comment_id' => $id]);
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
        $filename = $request->file('image')->getClientOriginalName();
        //$path = $request->file('image')->store('');
        $path = Storage::putFile('', $request->file('image'));
        $image = new Image();
        $image->filename = $filename;
        $image->path = $path;
        $image->comment_id = $request->comment_id;
        $image->save();
       
        return redirect()->route('posts.index')-> with('success',"Se cargó nueva imagen");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($filename)
    {
        
        //$path = storage_path("app/files/{$filename}");
        //return response()->file($patch);

        return Storage::get($filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($filename)
    {
       Storage::delete($filename);
       return redirect()->route('posts.index')-> with('success',"Se eliminó la imagen $filename");
    }
}
