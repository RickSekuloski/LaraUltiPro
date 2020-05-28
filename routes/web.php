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

Route::get('/','LandingPageController@index')->name('landing-page');
Route::get('/post/{post}-{slug}','LandingPageController@show')->name('post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Pages Controller
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/contact', 'PagesController@contact')->name('contact');


//Users Controller

Route::middleware(['auth','can:user-access'])->prefix('/user')->name('user.')->group(function(){
    Route::resource('/post','UsersPostController');
    Route::resource('/profile','UsersController');
});

Route::get('/blog', function () {
    return view('blog-page');
});


//Post Search
Route::get('/search','SearchPostsController@index')->name('search');

//Admin
// Route::get('/admin',function(){
//     return view('admin.index');
// })->name('admin');

//Route::get('/admin','AdminController@index')->name('admin');

// Route::get('/admin/login','Auth\LoginAdminController@index')->name('login.admin');
// Route::post('/admin/login','Auth\LoginAdminController@login')->name('login.admin');
Route::prefix('/admin')->name('admin.')->group(function(){

    Route::namespace('Auth')->group(function(){
        Route::get('/login','LoginAdminController@index')->name('login');
        Route::post('/login','LoginAdminController@login')->name('login');
    });
    Route::get('/','AdminController@index')->middleware('can:admin-access')->name('index');
    Route::get('/create','AdminController@create')->middleware('can:admin-access')->name('create');
    Route::post('/store','AdminController@store')->middleware('can:admin-access')->name('store');
    Route::resource('/users','AdminUsersController')->middleware('can:admin-access');
    Route::post('/users/{user}', 'AdminUsersController@updateStatus')->name('users.status');
});