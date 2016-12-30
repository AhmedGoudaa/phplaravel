<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();



Route::get('post','PostsController@getAll');
Route::get('post/{keyword}','PostsController@searchPost');
Route::get('/home', 'HomeController@index');


Route::get('welcome', function () {


//    Session::flash('status','welcome there');
//    Session::put('status', 'welcome there');
//    Session::put(['status'=> 'welcome there']);
//    session(['status'=>'welcome there']);
//    session()->flash('status', 'welcome there');
    flash('welcome there');

    return redirect('/');

});


Route::get('/', function () {


    $people =['ahmed','gouda','mohamed','kamal'];

    return view('welcome')->withPeople($people);

});

Route::resource('mycon', 'MyconController');
Route::resource('posts','PostsController');
Route::post('posts/{posts}/comment','CommentsController@store');
Route::get('comment/{comment}/edit','CommentsController@edit');
Route::patch('comment/{comment}','CommentsController@update');




Route::get('show/{a}', array('as' => 'mycon', 'uses' => 'MyconController@ali'));
Route::get('show/{a}/{b}', array('as' => 'mycon', 'uses' => 'MyconController@show'));


Route::get('ali', array('as' => 'ali', 'uses' => 'MyconController@ali'));


