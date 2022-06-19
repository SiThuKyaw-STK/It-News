<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','BlogController@index')->name('index');
Route::get('/detail/{slug}','BlogController@detail')->name('detail');
Route::get('/category/{id}','BlogController@baseOnCategory')->name('baseOnCategory');
Route::get('/uploader/{id}','BlogController@baseOnUser')->name('baseOnUser');

Route::view('/about','blog.about')->name('about');



Auth::routes();

Route::prefix('dashboard')->middleware(["auth","isBaned"])->group(function (){

    Route::middleware(['AdminOnly'])->group(function (){
        //User Manger
        Route::get('/user-manger','UserMangerController@index')->name('user-manger.index');
        Route::post('/make-admin','UserMangerController@makeAdmin')->name('user-manger.makeAdmin');
        Route::post('/ban-user','UserMangerController@banUser')->name('user-manger.banUser');
        Route::post('/restore-user','UserMangerController@restoreUser')->name('user-manger.restoreUser');
        Route::post('/change-user-password','UserMangerController@changeUserPassword')->name('user-manger.changeUserPassword');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');


    Route::prefix('profile')->group(function(){
        // Main Frame Route
        Route::get('/','ProfileController@profile')->name('profile');
        Route::get('/edit-photo','ProfileController@editPhoto')->name('profile.edit.photo');
        Route::get('/edit-password','ProfileController@editPassword')->name('profile.edit.password');
        Route::get('/edit-name-and-email','ProfileController@editNameEmail')->name('profile.edit.name.email');
        Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
        Route::post('/change-name','ProfileController@changeName')->name('profile.changeName');
        Route::post('/change-email','ProfileController@changeEmail')->name('profile.changeEmail');
        Route::post('/change-phone','ProfileController@changePhone')->name('profile.changePhone');
        Route::post('/change-address','ProfileController@changeAddress')->name('profile.changeAddress');
        Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');
        Route::post("/update-user-info","ProfileController@updateInfo")->name("profile.update.info");
    });
});
