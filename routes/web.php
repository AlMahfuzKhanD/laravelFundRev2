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


Route::get('/test', function(){
    return "Hi !! How are you?";
});

Route::get('/about', function(){

    return "hi about page";

});

Route::get('/contact', function(){

    return "hi contact page";

});

Route::get('/post/{id}', function($id){
return " this is post ". $id ;
});

Route::get('/admin/posts/example',array('as'=>'admin.home', function(){

    $url = route('admin.home');
    return "this is naming" . $url;

}));

Route::get('/admin/posts/naming', array('as'=>'admin.naming', function(){
    $url = route('admin.naming');
    return "this is ". $url;

}));
