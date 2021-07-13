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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Blog','prefix' => 'blog'],function (){
    Route::resource('posts','PostController')->names('blog.posts');
});

//Route::resource('rest','RestTestController')->names('restTest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin

$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];

Route::group($groupData,function (){
    $methods = ['index','edit','store','update','create',];
    Route::resource('categories','CategoryController')->only($methods)->names('blog.admin.categories');
    Route::resource('posts','PostController')->except(['show'])->names('blog.admin.posts');
});

$groupDataPatterns = [
    'namespace' => 'Designpatterns',
    'prefix' => '/designpatterns',
];

Route::group(['prefix' => 'designpatterns'],function (){
    Route::get('/propertycontroller/', [\App\Http\Controllers\DesignpatternsController::class, 'propertycontroller']);
    Route::get('/delegation/', [\App\Http\Controllers\DesignpatternsController::class, 'delegation']);
});