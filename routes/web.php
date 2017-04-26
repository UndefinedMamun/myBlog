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

Route::get('/l', function () {
    return view('welcome');
});

Route::get('/','main@index');
Route::get('/add-post','main@add_post');
Route::get('/get-sub-categories/{id}','main@get_sub_categories');
Route::get('/edit-post/get-sub-categories/{id}','main@get_sub_categories');
Route::post('/new-post-submited','main@save_new_post');
Route::post('/update-post','main@update_post');
Route::get('/single-post/{title}','main@single_post');
Route::get('/edit-post/{title}','main@edit_post');
Route::get('/check-post-title/{title}','main@check_post_title');
Route::get('/edit-post/check-post-title/{title}','main@check_post_title');
Route::post('/add-comment','main@add_comment');





Route::get('/admin','admin_controller@log_in');
Route::get('/manage-post','SuperAdminController@manage_post');
Route::post('/auth-check','admin_controller@auth_check');
Route::get('/dashboard','SuperAdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');
Route::get('/add-main-category','SuperAdminController@add_main_category');
Route::get('/add-sub-category','SuperAdminController@add_sub_category');
Route::get('/manage-main-category','SuperAdminController@manage_main_category');
Route::get('/manage-sub-category','SuperAdminController@manage_sub_category');
Route::get('/manage-comments','SuperAdminController@manage_comments');
Route::post('/save-main-category','SuperAdminController@save_main_category');
Route::post('/save-sub-category','SuperAdminController@save_sub_category');
Route::get('/change-mc-ps/{id_ps}','SuperAdminController@change_mc_ps');
Route::get('/change-sc-ps/{id_ps}','SuperAdminController@change_sc_ps');
Route::get('/change-post-ps/{id_ps}','SuperAdminController@change_post_ps');
Route::get('/change-post-if/{id_ps}','SuperAdminController@change_post_if');
Route::get('/delete-mc/{id}','SuperAdminController@delete_mc');
Route::get('/delete-sc/{id}','SuperAdminController@delete_sc');
Route::get('/delete-comment/{id}','SuperAdminController@delete_comment');
Route::get('/delete-post/{id}','SuperAdminController@delete_post');
Route::get('/edit-main-category/{id}','SuperAdminController@edit_main_category');
Route::get('/edit-sub-category/{id}','SuperAdminController@edit_sub_category');
Route::post('/update-main-category','SuperAdminController@update_main_category');
Route::post('/update-sub-category','SuperAdminController@update_sub_category');



Auth::routes();

Route::get('/home', 'HomeController@index');
