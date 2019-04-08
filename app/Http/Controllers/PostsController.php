<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
USE DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index','show'
        ]);
       

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //using my sql 
        // $posts = DB::select('SELECT * FROM posts');

        // $posts = post::all();
        // $posts = post::orderBy('title','desc')->take(1)->get();
        // $posts = post::orderBy('title','desc')->get();

        /*creating paginations*/
        $posts = post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create post 
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request ,[
            'title'=>'required',
            'body' => 'required'
        ]);

        // Create post

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        //to redirect 

        return redirect('posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('posts.post')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = post::find($id);
        //check if the user can edit 

        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error','Sorry you cannot edit this post'); 
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request ,[
            'title'=>'required',
            'body' => 'required'
        ]);

        // Create post

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        
        $post->save();
        //to redirect 

        return redirect('posts')->with('success','Post Updated');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error','Sorry you cannot delete this post'); 
        }
        $post->delete();
        //to redirect 
        return redirect('posts')->with('success','Post Deleted');
    }
}
