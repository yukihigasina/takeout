<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::groupBy('storename')->get('storename');
        $news=Post::all()->sortByDesc('updated_at');
        
        return view('post.top', ['posts' => $posts,'news'=>$news]);
    } 
    
    public function show(Request $request)
    {
        
        /*dd($request->storename);*/
        $storename  = $request->storename;
        $posts = Post::where('storename', $storename)->get();
        
        
        return view('post.show', ['posts'=>$posts, 'storename'=>$storename]);
    }
}