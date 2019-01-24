<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


Route::get('/forum', 'ForumsController@index')->name('forum');

Route::get('discussions/{slug}',['uses'=>'DiscussionsController@show', 'as'=>'discussions']);

Route::get('channels/{slug}',['uses'=>'ForumsController@channel', 'as'=>'channel']);

Route::get('{provider}/auth',['uses'=>'SocialsController@auth', 'as'=>'social.auth']);

Route::get('/{provider}/redirect',['uses'=>'SocialsController@auth_callback', 'as'=>'social.callback']);

//---------------------------------------------------------------------------------------------------------------

Route::group(['middleware'=> 'auth'], function (){

    Route::resource('channels','ChannelsController');

    Route::get('discussions/create/new',['uses'=>'DiscussionsController@create', 'as'=>'discussions.create']);

    Route::post('discussions/store',['uses'=>'DiscussionsController@store', 'as'=>'discussions.store']);

    Route::get('discussions/edit/{slug}',['uses'=>'DiscussionsController@edit', 'as'=>'discussions.edit']);

    Route::post('discussions/update/{id}',['uses'=>'DiscussionsController@update', 'as'=>'discussions.update']);

    Route::post('discussions/reply/{id}',['uses'=>'DiscussionsController@reply', 'as'=>'discussions.reply']);

    Route::get('discussion/watch/{id}',['uses'=>'WatchersController@watch', 'as'=>'discussion.watch']);

    Route::get('discussion/unwatch/{id}',['uses'=>'WatchersController@unwatch', 'as'=>'discussion.unwatch']);

    Route::get('discussion/best/reply/{id}',['uses'=>'RepliesController@best_answer', 'as'=>'discussion.best.answer']);

//--------------------------------------------------------------------------------------------------------

    Route::get('reply/like/{id}',['uses'=>'RepliesController@like', 'as'=>'reply.like']);

    Route::get('reply/unlike/{id}',['uses'=>'RepliesController@unlike', 'as'=>'reply.unlike']);

    Route::get('reply/edit/{id}',['uses'=>'RepliesController@edit', 'as'=>'reply.edit']);

    Route::post('reply/update/{id}',['uses'=>'RepliesController@update', 'as'=>'reply.update']);

});
