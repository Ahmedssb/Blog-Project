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
   return redirect(route('Web.Main'));
});

Route::get('test',function(){
    return view("test_view");
});

Route::get('laravel',function(){
    return view("post_view");
});

Route::get('admin/main',function(){
    return view("test_admin_view");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/')->group(function(){

    Route::get('Main','Web\Main\Main_cont@index')->name('Web.Main');

    Route::get('ContactUs','Web\Msg\Msg_cont@send')->name('Web.Msg');
    Route::post('ContactUs','Web\Msg\Msg_cont@send')->name('Web.Msg');

    Route::get('Profile','Auth\Profile_cont@update')->name('Web.Profile');
    Route::post('Profile','Auth\Profile_cont@update')->name('Web.Profile');

 
    Route::prefix('Section')->group(function(){
        Route::get('/{id}','Web\Section\Section_cont@index')->name('Web.Section.Index');
    });

    Route::prefix('Post')->group(function(){
        Route::get('/{id}','Web\Post\Post_cont@index')->name('Web.Post.Index');
        Route::post('/{id}','Web\Post\Post_cont@index')->name('Web.Post.Index');

        Route::get('/Comment/{id}','Web\Post\Post_cont@editComment')->name('Web.Comment.Edit');
        Route::post('/Comment/{id}','Web\Post\Post_cont@editComment')->name('Web.Comment.Edit');

        Route::get('/Comment/Delete/{id}','Web\Post\Post_cont@deleteComment')->name('Web.Comment.Delete');

    });
 
   });

  // start Admin route 
Route::prefix('Admin')->middleware('AdminPanel')->group(function(){
        Route::get('/Main','Admin\Main\Main_cont@index')->name('Admin.Main');

        Route::prefix('Section')->middleware('AdminRole')->group(function(){
                Route::get('/','Admin\Section\Section_cont@index')->name('Section.Index');

                Route::get('Add','Admin\Section\Section_cont@add')->name('Section.Add');
                Route::post('Add','Admin\Section\Section_cont@add')->name('Section.Add');

                Route::get('Update/{id}','Admin\Section\Section_cont@update')->name('Section.Update');
                Route::post('Update/{id}','Admin\Section\Section_cont@update')->name('Section.Update');

                Route::get('Delete/{id}','Admin\Section\Section_cont@delete')->name('Section.Delete');
                Route::post('Delete/{id}','Admin\Section\Section_cont@delete')->name('Section.Delete');
        });

        Route::prefix('Image')->group(function(){

                Route::get('/','Admin\Image\Image_cont@index')->name('Image.Index');

                Route::get('Add','Admin\Image\Image_cont@add')->name('Image.Add');
                Route::post('Add','Admin\Image\Image_cont@add')->name('Image.Add');

                Route::get('Delete/{id}','Admin\Image\Image_cont@delete')->name('Image.Delete');
                Route::post('Delete/{id}','Admin\Image\Image_cont@delete')->name('Image.Delete');
        });


        Route::prefix('Post')->group(function(){

                Route::get('/','Admin\Post\Post_cont@index')->name('Post.Index');

                Route::get('Add','Admin\Post\Post_cont@add')->name('Post.Add');
                Route::post('Add','Admin\Post\Post_cont@add')->name('Post.Add');

                Route::get('Delete/{id}','Admin\Post\Post_cont@delete')->name('Post.Delete');
                Route::post('Delete/{id}','Admin\Post\Post_cont@delete')->name('Post.Delete');


                Route::get('Update/{id}','Admin\Post\Post_cont@update')->name('Post.Update');
                Route::post('Update/{id}','Admin\Post\Post_cont@update')->name('Post.Update');
        });

        Route::prefix('User')->group(function(){

            Route::get('/','Admin\User\User_cont@index')->name('User.Index');

            Route::get('Add','Admin\User\User_cont@add')->name('User.Add');
            Route::post('Add','Admin\User\User_cont@add')->name('User.Add');

            Route::get('Delete/{id}','Admin\User\User_cont@delete')->name('User.Delete');
            Route::post('Delete/{id}','Admin\User\User_cont@delete')->name('User.Delete');


            Route::get('Update/{id}','Admin\User\User_cont@update')->name('User.Update');
            Route::post('Update/{id}','Admin\User\User_cont@update')->name('User.Update');
    });

    Route::prefix('Msg')->group(function(){

         Route::post('Delete/{id}','Admin\Msg\Msg_cont@delete')->name('Msg.Delete');

        Route::get('/Read{id}','Admin\Msg\Msg_cont@read')->name('Msg.Read');

        Route::get('/{type}','Admin\Msg\Msg_cont@index')->name('Msg.Index');

       
});

});// end of admin route 