<?php

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin::','prefix'=>'cpanel/admin','middleware' => ['web','AdminMiddleWare','revalidate']], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Admin\Dashboard\DashboardController@dashboard']);
    Route::get('changePassForm', ['as' => 'changePassForm', 'uses' => 'Admin\AdminController@changePassForm']);
    Route::post('ChangePass', ['as' => 'ChangePass', 'uses' => 'Admin\AdminController@ChangePass']);
    Route::get('profile/{id}', ['as' => 'profile', 'uses' => 'Admin\AdminController@profile']);
    Route::post('update-profile', ['as' => 'updateProfile', 'uses' => 'Admin\AdminController@updateProfile']);

    /* Users route start*/
    Route::get('manage-user', ['as'=>'manageUser' ,'uses'=>'Admin\User\UserController@index']);
    Route::get('add-user', ['as' => 'addUser', 'uses' => 'Admin\User\UserController@addUser']);
    Route::post('save-user', ['as' => 'saveUser', 'uses' => 'Admin\User\UserController@saveUser']);
    Route::get('edit-user-form/{id}', ['as' => 'editUserForm', 'uses' => 'Admin\User\UserController@editUserForm']);
    Route::post('edit-user', ['as' => 'editUser', 'uses' => 'Admin\User\UserController@editUser']);
    Route::get('del-user/{id}', ['as' => 'delUser', 'uses' => 'Admin\User\UserController@delUser']);
    Route::post('active-inactive-user/', ['as' => 'active_inactive_user', 'uses' => 'Admin\User\UserController@active_inactive_user']);
    /* Users route end*/

    /* Home Page route start*/
    Route::get('/allHomePage',['as'=>'allHomePage','uses'=>'Backend\Home\HomePageController@index']);
    Route::get('/addHomePage',['as'=>'addHomePage','uses'=>'Backend\Home\HomePageController@add']);
    Route::post('/saveHomePage',['as'=>'saveHomePage','uses'=>'Backend\Home\HomePageController@save']);
    Route::get('/editHomePage/{id}',['as'=>'editHomePage','uses'=>'Backend\Home\HomePageController@edit']);
    Route::post('/updateHomePage/{id}',['as'=>'updateHomePage','uses'=>'Backend\Home\HomePageController@update']);
    Route::get('/deleteHomePage/{id}',['as'=>'deleteHomePage','uses'=>'Backend\Home\HomePageController@delete']);
    Route::post('/statusHomePage',['as'=>'statusHomePage','uses'=>'Backend\Home\HomePageController@active_inactive_user']);
    /* Home Page route end*/

    /* Home Page Image route start*/
    Route::get('/allHomePageImage',['as'=>'allHomePageImage','uses'=>'Backend\Home\HomePageImageController@index']);
    Route::get('/addHomePageImage',['as'=>'addHomePageImage','uses'=>'Backend\Home\HomePageImageController@add']);
    Route::post('/saveHomePageImage',['as'=>'saveHomePageImage','uses'=>'Backend\Home\HomePageImageController@save']);
    Route::get('/editHomePageImage/{id}',['as'=>'editHomePageImage','uses'=>'Backend\Home\HomePageImageController@edit']);
    Route::post('/updateHomePageImage/{id}',['as'=>'updateHomePageImage','uses'=>'Backend\Home\HomePageImageController@update']);
    Route::get('/deleteHomePageImage/{id}',['as'=>'deleteHomePageImage','uses'=>'Backend\Home\HomePageImageController@delete']);
    Route::post('/statusHomePageImage',['as'=>'statusHomePageImage','uses'=>'Backend\Home\HomePageImageController@active_inactive_user']);
    /* Home Page Image route end*/

    /* Category route start*/
    Route::get('/allCategory',['as'=>'allCategory','uses'=>'Backend\Category\CategoryController@index']);
    Route::get('/addCategory',['as'=>'addCategory','uses'=>'Backend\Category\CategoryController@add']);
    Route::post('/saveCategory',['as'=>'saveCategory','uses'=>'Backend\Category\CategoryController@save']);
    Route::get('/editCategory/{id}',['as'=>'editCategory','uses'=>'Backend\Category\CategoryController@edit']);
    Route::post('/updateCategory/{id}',['as'=>'updateCategory','uses'=>'Backend\Category\CategoryController@update']);
    Route::get('/deleteCategory/{id}',['as'=>'deleteCategory','uses'=>'Backend\Category\CategoryController@delete']);
    Route::post('/status',['as'=>'status','uses'=>'Backend\Category\CategoryController@active_inactive_user']);
    /* Category route end*/

    /* Product route start*/
    Route::get('/allProduct',['as'=>'allProduct','uses'=>'Backend\Product\ProductController@index']);
    Route::get('/addProduct',['as'=>'addProduct','uses'=>'Backend\Product\ProductController@add']);
    Route::post('/saveProduct',['as'=>'saveProduct','uses'=>'Backend\Product\ProductController@save']);
    Route::get('/editProduct/{id}',['as'=>'editProduct','uses'=>'Backend\Product\ProductController@edit']);
    Route::post('/updateProduct/{id}',['as'=>'updateProduct','uses'=>'Backend\Product\ProductController@update']);
    Route::get('/deleteProduct/{id}',['as'=>'deleteProduct','uses'=>'Backend\Product\ProductController@delete']);
    Route::post('/statusProduct',['as'=>'statusProduct','uses'=>'Backend\Product\ProductController@active_inactive_user']);
    /* Product route end*/;

    /* Product Image route start*/
    Route::get('/allProductimage',['as'=>'allProductimage','uses'=>'Backend\Product\ProductImageController@index']);
    Route::get('/addProductimage/{id}',['as'=>'addProductimage','uses'=>'Backend\Product\ProductImageController@add']);
    Route::post('/saveProductimage',['as'=>'saveProductimage','uses'=>'Backend\Product\ProductImageController@save']);
    Route::get('/deleteProductimage/{id}',['as'=>'deleteProductimage','uses'=>'Backend\Product\ProductImageController@delete']);
    /* Product Image route end*/;
});
