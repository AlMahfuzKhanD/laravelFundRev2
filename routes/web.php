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


// Route::get('/test', function(){
//     return "Hi !! How are you?";
// });

// Route::get('/about', function(){

//     return "hi about page";

// });

// Route::get('/contact', function(){

//     return "hi contact page";

// });

// Route::get('/post/{id}', function($id){
// return " this is post ". $id ;
// });

// Route::get('/admin/posts/example',array('as'=>'admin.home', function(){

//     $url = route('admin.home');
//     return "this is naming" . $url;

// }));

// Route::get('/admin/posts/naming', array('as'=>'admin.naming', function(){
//     $url = route('admin.naming');
//     return "this is ". $url;

// }));

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });

//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });

// Route::middleware(['first','second'])->group(function(){

//     Route::get('/', function(){

//     });

//     Route::get('/', function(){

//     });

// });

// Route::middleware(['first','second'])->group(function(){

//     Route::get('/put', function(){

//     });

//     Route::put('/put', function(){

//     });

// });


// Route::get('/post/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');
// Route::get('/contact', 'PostsController@contact');

// Route::get('/posts/{id}', 'PostsController@showPost');

/*
|--------------------------------------------------------------------------
| Database raw sql
|--------------------------------------------------------------------------
*/

Route::get('/insert', function(){
    DB::insert('insert into posts(title, body) values(?, ?)', ['php with laravel','laravel is a framework']);


});

Route::get('/read', function(){
    $results = DB::select('select * from posts where id=?', [1]);

    foreach($results as $post){
        return $post->title;
    }
});

Route::get('/update', function(){
    $update = DB::update('update posts set title = "updated title" where id =?', [1]);
    return $update;
});

Route::get('/delete', function(){
    $delete = DB::delete('delete from posts where id=?', [1]);
    return $delete
});

/*
|--------------------------------------------------------------------------
| Database eloquent
|--------------------------------------------------------------------------
*/