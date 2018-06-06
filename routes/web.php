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
})->name('welcome');

Route::get('/users', function()
{
    $users = \App\User::all();
    return View::make('users')->with('users', $users);
})->name('index_users');



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


Route::get( '/home', 'HomeController@show')
    ->name('home.get');

// Route::get('users', 'UserController@getIndex');
//Route::resource('Articles','ArticlesController');
//Route::resource('Pages','PagesController');
//Route::resource('Categories','CategoriesController');
// "{{asset('css/admin.css')}}"
// "{{action('CategoriesController@store')}}"
// <input type="hidden" name="_token" value="{{csrf_token()}}"/
// "{{action('CategoriesController@edit',['categories'=>$category->id])}}"

// <input type="hidden" name="_method" value="PUT"/>
// $('.del').click(function()
//{
//    parent=$(this).parent().parent();//получаем родителя нашего span. parent будет содержать объект tr (строку нашей таблицы)
//    id = parent.children().first().html(); //id будет содержать id нашей категории, которое берется из первой ячейки строки
//    confirm_var = confirm('Удалить категорию?');//запрашиваем подтверждение на удаление
//    if (!confirm_var) return false;
//    $.ajax({
    //url:'/adminzone/categories/'+id, //url куда мы мы передаем delete запрос
    //method: 'DELETE',
    //data: {'_token':"{{csrf_token()}}" }, //не забываем передавать токен, или будет ошибка.
    //success: function(msg)
    //{
    //    parent.remove(); // удаляем строчку tr из таблицы
    //    alert('Category '+msg+' destroy');
    //},
    //error: function(msg)
    //{
    //    console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
    //}
    //});
//});

//<td>
//<form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
//<input type="hidden" name="_method" value="delete"/>
//<input type="hidden" name="_token" value="{{csrf_token()}}"/>
//<input type="text" value="Удалить"/>
//</form>
//</td>
//
//<form method="POST" action="{{action('CategoriesController@update',['categories'=>$category->id])}}"/>
//Название категории<br>
//<input type="text" name="title" value="{{$category->title}}"/><br>
//<input type="hidden" name="_method" value="put"/>
//<input type="hidden" name="_token" value="{{csrf_token()}}"/>
//<input type="submit" value="Сохранить">