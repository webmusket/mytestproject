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

// Route::get('/{any}', function () {
//   return view('admin');
// })->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'HomeController@admin')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //Category
    Route::post('/add-category','CategoryController@add_category');
    Route::get('category','CategoryController@all_category');
    Route::get('category/{id}','CategoryController@delete_category');
    Route::get('editcategory/{id}','CategoryController@edit_category');
    Route::post('update-category/{id}','CategoryController@update_category');
// //SubCategory
    Route::get('/subcategory','SubcategoryController@all_subcategory');
    Route::post('/add-subcategory','SubcategoryController@save_subcategory');
    Route::get('/subcategory/{id}','SubcategoryController@delete_subcategory');
    Route::get('/editsubcategory/{id}','SubcategoryController@edit_subcategory');
    Route::post('/update-subcategory/{id}','SubcategoryController@update_subcategory');
});