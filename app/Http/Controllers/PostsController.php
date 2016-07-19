<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;


class PostsController extends Controller
{


    public function getAll()
    {


        return DB::select('call get_posts');
    }

    public function searchPost($keyword)
    {
//        $keyword=$request['keyword'];
        if (!empty($keyword)){
            return DB::select('call search_posts(?)',array($keyword));

        }
        return "error 404";



    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $posts = DB::table('posts')->get();
        $posts = Post::all();
       return view('Posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/posts');  //or  redirect()->action('PostsController@index' );

    }


    public function store(Request $request )
    {
        $this->validate($request,
            [
                'title'=>'required|min:3',
                'content'=>'required|min:10'
            ]

        );


        $post = new Post($request->all());
        $post->user_id=Auth::user()->id;
        $post->save();

        return back();
    }



    public function show(Post $posts)
    {
//        $post=Post::find($id);
//        return $posts->load('user','comments');
        return view('Posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $posts)
    {
        if (Auth::user()->id== $posts->user_id) {
            return view('Posts.edit',compact('posts'));
        }else{
            return view('Posts.show',compact('posts'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $posts)
    {

        if (Auth::user()->id== $posts->user_id) {

            $posts->update($request->all());

            return redirect()->action('PostsController@show', [$posts]);
        }
        else{
            return view('Posts.show',compact('posts'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $posts)
    {
       $posts->delete();
        return redirect('/posts');

    }
}
