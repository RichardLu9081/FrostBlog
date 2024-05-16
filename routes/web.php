<?php
/*这段代码解除注释后，便可以实现在页面显示原生sql语句的效果，方便调试。
 \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {

    echo'<pre>';

    var_dump($query->sql);

    var_dump($query->bindings);

    var_dump($query->time);

    echo'</pre>';

});
 */
//Route::group(['middleware' => 'auth:web'], function(){
// 文章
Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');

Route::get('/login', "LoginController@index")->name('login');
Route::post('/login', "LoginController@login");
Route::get('/logout', "LoginController@logout");

Route::get('/register', "RegisterController@index");
Route::post('/register', "RegisterController@register");

// 需要admin才可以登陆的
/* Route::get('/home', 'HomeController@index')->middleware('admin'); */

Route::middleware(['auth', 'can:access-frost-home'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('frost.home');
    // 用户管理/home/AmendPassword
    Route::get('/home/AmendPassword', 'UserController@AmendPasswordView');
    Route::post('/home/AmendPassword', 'UserController@AmendPassword');

    Route::delete('/home/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('/home/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/home/user/EditSubmit/{id}', 'UserController@EditSubmit')->name('user.EditSubmit');
    Route::get('/home/users', 'UserController@users')->name('users');
   
    // 文章管理
    Route::get('/home/PostList', 'PostController@PostList')->name('post.list');
    Route::delete('/home/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
    Route::get('/home/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::put('/home/post/EditSubmit/{id}', 'PostController@EditSubmit')->name('post.EditSubmit');
    Route::get('/home/post/add', "PostController@add");
    Route::post('/home/post/AddSubmit', "PostController@AddSubmit");
    Route::post('/home/post/img/upload', 'PostController@imageUpload')->name('uploadImage');
    
});


//---------------以下测试的路由------------------------
Route::get('/select2', 'PostController@select2');
//以下两个路由是完成获取公网IP并发送邮件的效果。
//Route::get('/sendEmail', 'SendEmailController@sendEmail');
Route::get('/ip', 'SendEmailController@ip');
//以下路由是测试路由
Route::get("/SummaryLink", ['as' => 'SummaryLink', 'uses' => 'FeedbackController@SummaryLink']); // SummaryLink的 模拟

