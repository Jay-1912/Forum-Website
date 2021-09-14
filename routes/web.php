<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\FrontendController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-topic', function () {
    return view('client-side.new-topic');
});

Route::get('/category/overview/{id}', 'App\Http\Controllers\FrontendController@categoryOverview')->name('category.overview');

Route::middleware(['auth','admin'])->group(function(){
    route::get('dashboard/home', 'App\Http\Controllers\DashboardController@home');
//Category
route::get('dashboard/category/new', 'App\Http\Controllers\CategoryController@create')->name('category.new');
route::post('dashboard/category/new', 'App\Http\Controllers\CategoryController@store')->name('category.store');
route::get('dashboard/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');
route::get('dashboard/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');
route::get('dashboard/EditCategory/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
route::post('dashboard/EditCategory/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
route::get('dashboard/DeleteCategories/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');

//Forum
route::get('dashboard/forum/new','App\Http\Controllers\ForumController@create')->name('forum.new');
route::post('dashboard/forum/new', 'App\Http\Controllers\ForumController@store')->name('forum.store');
route::get('dashboard/forums', 'App\Http\Controllers\ForumController@index')->name('forums');
route::get('dashboard/forums/{id}', 'App\Http\Controllers\ForumController@show')->name('forum.show');
route::get('dashboard/forums/EditForum/{id}', 'App\Http\Controllers\ForumController@edit')->name('forum.edit');
route::post('dashboard/forums/EditForum/{id}', 'App\Http\Controllers\ForumController@update')->name('forum.update');
route::get('dashboard/forums/DeleteForum/{id}', 'App\Http\Controllers\ForumController@destroy')->name('forum.delete');

//Users
Route::get('dashboard/users/{id}', 'App\Http\Controllers\DashboardController@show')->name('user.show');
Route::get('dashboard/users', 'App\Http\Controllers\DashboardController@users')->name('users');
Route::post('dashboard/users/delete/{id}', 'App\Http\Controllers\DashboardController@delete')->name('user.delete');
Route::get('dashboard/admin/profile/{id}','App\Http\Controllers\DashboardController@profile')->name('admin.profile');

Route::get('dashboad/users/', 'App\Http\Controllers\DashboardController@notifications')->name('notifications');
Route::get('dashboad/users/mark-as-read/{id}', 'App\Http\Controllers\DashboardController@markAsRead')->name('notification.read');
Route::get('dashboad/users/delete/{id}', 'App\Http\Controllers\DashboardController@deleteNotification')->name('notification.delete');
Route::get('dashboad/setting/form', 'App\Http\Controllers\DashboardController@settingForm')->name('setting.form');
Route::post('dashboad/setting/new', 'App\Http\Controllers\DashboardController@newSetting')->name('setting.new');

});

Route::get('/topic', function () {
    return view('client-side.topic');
});

Route::get('/forum/overview/{id}', 'App\Http\Controllers\FrontendController@forumOverview')->name('forum.overview');

Route::get('/topic/overview/{id}', 'App\Http\Controllers\FrontendController@topicOverview')->name('topic.overview');



//Topic
route::get('client-side/topic/new/{id}','App\Http\Controllers\TopicController@create')->name('topic.new');
route::post('client-side/topic/new', 'App\Http\Controllers\TopicController@store')->name('topic.store');
route::post('client-side/topic/overview/{id}', 'App\Http\Controllers\TopicController@reply')->name('topic.reply');
route::get('client-side/topic/reply/delete/{id}', 'App\Http\Controllers\TopicController@destroy')->name('reply.delete');
// route::get('dashboard/topic', 'App\Http\Controllers\TopicController@index')->name('topic');
// route::get('dashboard/topic/{id}', 'App\Http\Controllers\TopicController@show')->name('topic.show');
// route::get('dashboard/topic/EditForum/{id}', 'App\Http\Controllers\TopicController@edit')->name('topic.edit');
// route::post('dashboard/topic/EditForum/{id}', 'App\Http\Controllers\TopicController@update')->name('topic.update');
route::get('client-side/topic/delete/{id}', 'App\Http\Controllers\TopicController@remove')->name('topic.delete');


Route::get('/updates','App\Http\Controllers\TopicController@updates');

Route::post('user/update/{id}','App\Http\Controllers\UserController@update')->name('user.update');


route::get('client-side/user/{id}', 'App\Http\Controllers\FrontendController@profile')->middleware('auth')->name('client.user.profile');

Route::get('clients/users', 'App\Http\Controllers\FrontendController@users')->middleware('auth')->name('client.users');

Route::post('user/update/image/{id}','App\Http\Controllers\UserController@updateImage')->name('user.profile.update');

Route::get('reply/like/{id}','App\Http\Controllers\TopicController@like')->name('reply.like');
Route::get('reply/dislike/{id}','App\Http\Controllers\TopicController@dislike')->name('reply.dislike');
Route::post('category/search','App\Http\Controllers\CategoryController@search')->name('category.search');

