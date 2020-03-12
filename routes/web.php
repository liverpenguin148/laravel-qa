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

Route::get('/home', 'HomeController@index')->name('home');

//Route::resourceを指定することで、CRUDルーティングを一度に行うことができる
/*
HTTPメソッド | URI	             | コントローラのメソッド  |	 用途
GET          | /users	         | index()	             |  一覧表示
GET	         | /users/create	 | create()	             |  追加ページ
POST	     | /users	         | store()	             |  追加
GET	         | /users/{id}	     | show()	             |  該当データ表示
GET	         | /users/{id}/edit	 | edit()	             |  更新ページ
PUT	         | /users/{id}	     | update()	             |  更新
DELETE	     | /users/{id}	     | destroy()	         |  削除
*/
Route::resource('questions', 'QuestionsController'); //index()のコントローラを呼ぶ
