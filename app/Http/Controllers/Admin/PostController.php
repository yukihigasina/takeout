<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $cond_storename = $request->cond_storename;
        if($cond_storename != ''){
            $posts = Post::where('storename', $cond_storename)->where('user_id', Auth::id())->get();
        }
        else{
            $posts = Post::where('user_id', Auth::id())->get();
        }
        return view('admin.post.index', ['posts' => $posts, 'cond_storename' => $cond_storename]);
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post; 
        $form = $request->all();
        
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $post->image_path = Storage::disk('s3')->url($path);
        
        
        unset($form['_token']);
        unset($form['image']);
          
        $post->fill($form);
        $post->user_id = Auth::id();
        $post->save();
        
        return redirect('admin/post/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show(Request $request)
    {
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $post=Post::find($request->post);
        if (empty($post)) {
            abort(404);    
        }
        
        return view('admin.post.edit', ['post_form' => $post]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $this->validate($request, Post::$update_rules);
        // Modelからデータを取得する
        $post = Post::find($request->id);
        // 送信されてきたフォームデータを格納する
        $post_form = $request->all();
        if (isset($post_form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$post_form['image'],'public');
            $post->image_path = Storage::disk('s3')->url($path);
        }
        
        unset($post_form['image']);
        unset($post_form['_token']);
        // 上書きして保存
        $post->fill($post_form)->save();
        
        return redirect('admin/post');    
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post');
        
    }
    
}