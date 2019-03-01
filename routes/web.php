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

Route::get('/', 'Home\index@index');

//Route::get('admin/index', 'Admin\index@index');

//前台路由组
Route::group(['namespace' => 'Home'], function(){
    // 控制器在 "App\Http\Controllers\Home" 命名空间下

    //前台index
    Route::get('/', [
        'as' => 'index', 'uses' => 'Index@index'
    ]);

});

//后台路由组
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下

    //后台index
//    Route::get('/', [
//        'as' => 'index', 'uses' => 'Index@index'
//    ]);

    //话题列表
    Route::get('topic/index', [
        'as' => 'topic/index', 'uses' => 'TopicController@index'
    ]);

    //话题创建
    Route::post('topic/store', [
        'as' => 'topic/store', 'uses' => 'TopicController@store'
    ]);

    //话题更新
    Route::put('topic/update/{id}', [
        'as' => 'topic/update/{id}', 'uses' => 'TopicController@update'
    ]);

    //话题删除
    Route::delete('topic/delete/{id}', [
       'as' => 'topic/delete/{id}', 'uses' => 'TopicController@delete'
    ]);

    //话题删除
    Route::get('topic/show/{id}', [
        'as' => 'topic/show/{id}', 'uses' => 'TopicController@show'
    ]);

    //话题发布
    Route::put('topic/publish/{id}', [
        'as' => 'topic/publish/{id}', 'uses' => 'TopicController@publish'
    ]);

    //话题下线
    Route::put('topic/offline/{id}', [
        'as' => 'topic/offline/{id}', 'uses' => 'TopicController@offline'
    ]);


    //公告列表
    Route::get('announcement/index', [
        'as' => 'announcement/index', 'uses' => 'AnnouncementController@index'
    ]);

    //公告创建
    Route::post('announcement/store', [
        'as' => 'announcement/store', 'uses' => 'AnnouncementController@store'
    ]);

    //公告更新
    Route::put('announcement/update/{id}', [
        'as' => 'announcement/update/{id}', 'uses' => 'AnnouncementController@update'
    ]);

    //公告删除
    Route::delete('announcement/delete/{id}', [
        'as' => 'announcement/delete/{id}', 'uses' => 'AnnouncementController@delete'
    ]);

});
