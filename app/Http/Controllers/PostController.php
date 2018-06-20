<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use  Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all bog post in it form database

        $posts = Post::orderBy('id','desc')->paginate(4);
        // return a view and pass in the above varibale
        return view('posts.index')->withPosts($posts);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //validate te data
        $this->validate($request, array(
            'title' =>'required|max:255',
            'slugs'=>'required|alpha_dash|min:5|max:255|unique:posts,slugs',
            'body'=>'required' 
        ));
        // store in the database
        $post = new Post;

        $post-> title= $request->title;
        $post->slugs=$request->slugs;
        $post-> body=$request->body;

        $post->save();

        Session::flash('success', 'The blog was successfully saved');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as var
        $post =Post::find($id);
        return view('posts.edit')->withPost($post);
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
        $post =Post::find($id);
        if($request->input('slugs')== $post->slugs){
          $this->validate($request, array(
            'title' =>'required|max:255',
            'body'=>'required' 
        ));
        }
        else{
        //validate te data
        $this->validate($request, array(
            'title' =>'required|max:255',
            'slugs'=>'required|alpha_dash|min:5|max:255|unique:posts,slugs',
            'body'=>'required' 
        ));}

        // save data to db
        $post =Post::find($id);

        $post->title=  $request->input('title');
        $post->slugs=$request->input('slugs');
         $post->body=  $request->input('body');

         $post->save();
         // set flash data with sucess message
         Session::flash('success', 'The post was successfully update');

        //redirect with flas data to post.show
         return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        $post->delete();

        Session::flash('success','The post was successfully deleted');

        return redirect()->route('posts.index');
    }
}
