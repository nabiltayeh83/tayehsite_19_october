<?php
if(Session::get('locale') == '' || !Session::get('locale')){
\Session::put('locale', App::getLocale());
}


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

Route::get('lang/{locale}', function ($locale) {
	\Session::put('locale', $locale);	
	return redirect()->route("homepage");
	});

Route::get('/', 'HomePageController')->name('homepage');

Route::get('/category/{id}', 'HomePageController@category');
Route::get('/details/{id}', 'HomePageController@details');
Route::get('/page/{id}', 'HomePageController@page');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/articles', 'admin\ArticleController');
Route::get('admin/articles/delete/{id}', 'admin\ArticleController@destroy');
Route::get('admin/articles/active/{id}', 'admin\ArticleController@active');


Route::resource('admin/categories', 'admin\CategoryController');
Route::get('admin/categories/delete/{id}', 'admin\CategoryController@destroy');
Route::get('admin/categories/active/{id}', 'admin\CategoryController@active');



Route::resource('admin/pages', 'admin\PageController');
Route::get('admin/pages/active/{id}', 'admin\PageController@active');


Route::resource('admin/users', 'admin\UserController');
Route::get('admin/users/delete/{id}', 'admin\UserController@destroy');
Route::get('admin/users/changepassword', 'admin\UserController@changepassword')->name('changepassword');
Route::PUT('admin/users/updatepassword', 'admin\UserController@updatepassword');
Route::get('admin/users/permission/{id}', 'admin\UserController@permission');
Route::post('admin/users/permission/{id}', 'admin\UserController@setpermission');
Route::get('admin/users/active/{id}', 'admin\UserController@active');
