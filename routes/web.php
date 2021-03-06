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

use Illuminate\Http\Request;

Route::get('phpinfo', function()
{
    phpinfo();
});

Route::get('/', function ()
{
    return view('welcome');
})->name('welcome');

Route::get('/users', function()
{
    $users = \App\User::all();
    return $users;
});



Route::get('/login', 'Auth\LoginController@show')
    ->name('login.get');
Route::post('/login', 'Auth\LoginController@login')
    ->name('login.post');

Route::get('/logout', 'Auth\LoginController@logout')
    ->name('logout');

Route::get('/register', 'Auth\RegisterController@show')
    ->name('register.get');
Route::post('/register', 'Auth\RegisterController@register')
    ->name('register.post');

// -_____________________________-

Route::get( '/home', 'HomeController@show')
    ->name('home');

Route::get('/user/{login}', 'ProfileController@show')
    ->name('profile.get')
    ->where(['login' => '[A-Za-z0-9_-]+']);


Route::get('/me', 'ProfileController@show_auth_user')
    ->name('profile.auth');

Route::get('/me/edit', 'ProfileController@edit')
    ->name('me.edit');


Route::delete('/me', 'ProfileController@destroy')
    ->name('me.delete');

Route::put('/me', 'ProfileController@update')
    ->name('me.update');
// _____________________________

Route::resource('/post', 'PostController');

//Route::post('/comment/{parent}', 'CommentController@store')
//    ->name('comment.store')
//    ->where(['parent' => '[0-9]']);
//

//Route::apiResources([
//   'photos' => 'PhotoController',
//   'posts' => 'PostController'
//]);

//Route::resource('comment', 'CommentController')
//   ->except(['index']);
