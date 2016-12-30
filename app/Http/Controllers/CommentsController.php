<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //
//    }

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
    public function store(Request $request ,Post $posts)
    {
        $this->validate($request,
            [

                'body'=>'required|min:10'

            ]
        );

        $comment = new Comment($request->all());
        $comment->user_id=Auth::user()->id;
//        $comment->body=$request->body;
        $posts->comments()->save($comment);
//        $posts->comments()->create($request->all());



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
//        $posts=Post::with('user','comments.user')->find(1);

//       return $comment->load('user','post.user');
        
//        return view('Comments.edit',    compact('comment'));
//        return $comment->Post->user;

        if(Auth::user()->id==$comment->user->id){


                 return view('Comments.edit',compact('comment'));
        }else{
            return redirect()->action('PostsController@show', [$comment->post]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        $posts= $comment->post;
        return redirect()->action('PostsController@show', [$posts]);
//        return back();
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
    }
}
