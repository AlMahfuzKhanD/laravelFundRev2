<?php


use App\Post;
use App\User;
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
    return $delete;
});

/*
|--------------------------------------------------------------------------
| Database eloquent
|--------------------------------------------------------------------------
*/

Route::get('/find', function(){

$posts = Post::find(3);

return $posts->title;

});


Route::get('/findwhere', function(){
    $post = Post::where('id',2)->orderBy('id', 'desc')->take(1)->get();
    return $post;
});

Route::get('/findmore', function(){
    // $post = Post::findOrFail(3);
    // return $post;

    $posts = Post::where('users_count', '<', 50)->firstOrFail();
    return $posts;
});


Route::get('/basicinsert', function(){
    $post = new Post;
    $post->title = 'new title';
    $post->body = 'new body';

    $post->save();
});


Route::get('/basicupdate', function(){
    $post = Post::find(2);
    $post->title = 'updated title';
    $post->body = 'updated body';

    $post->save();
});


Route::get('/create', function(){
    Post::create(['title'=>'created title', 'body'=>'create body']);
});

Route::get('/update', function(){
    Post::where('id',5)->update(['title'=>'updated title', 'body'=>'updated body']);
});


Route::get('/delete', function(){
    $post = Post::find(2);
    $post->delete();
});


Route::get('/delete2', function(){

Post::destroy([4,5]);

});

Route::get('/softdelete', function(){
    Post::find(13)->delete();
});

Route::get('/readsoftdelete', function(){
    // $post = Post::find(8);
    // return $post;

    // $post = Post::withTrashed()->where('id',8)->get();
    // return $post;

    $post = Post::onlyTrashed()->get();
     return $post;

});

Route::get('/restored', function(){
    Post::withTrashed()->restore();
});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->forceDelete();
});

/*
|--------------------------------------------------------------------------
|  eloquent relationship 
|--------------------------------------------------------------------------
*/

// one to one

Route::get('/user/{id}/post', function($id){
    return User::find($id)->post;
});

// inverse one to one

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});

// one to many

Route::get('/posts', function(){
    $user = User::find(1);
    foreach($user->posts as $post){
        echo $post->title . "<br>";

    }
});

//many to many

Route::get('/user/{id}/roles', function($id){

    $user = User::find($id);
    foreach($user->roles as $role){
        echo $role->name;
    }
});


//accessing pivot table

Route::get('/user/pivot', function(){
    $user = User::find(1);
    foreach($user->roles as $role){
        echo $role->pivot->created_at;
    }

});