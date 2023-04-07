<?php

Route::group(['middleware' => ['revalidate']], function () {

    Route::get('admin', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);

    Route::post('login', ['as' => 'login', 'uses' => 'Admin\AdminController@Check_login']);

    Route::get('logout', ['as' => 'logout', 'uses' => 'Admin\AdminController@logout']);

    Route::get('/', ['as' => 'home', 'uses' => 'Frontend\MainController@home']);

    Route::get('category', ['as' => 'category', 'uses' => 'Frontend\MainController@Category']);
    Route::get('/getCategoryCourse', ['as' => 'getCategoryCourse', 'uses' => 'Frontend\MainController@filtercat']);
    Route::get('/getPrice', ['as' => 'getPrice', 'uses' => 'Frontend\MainController@pricecat']);

    Route::get('product-list', ['as' => 'productlist', 'uses' => 'Frontend\MainController@product_list']);
    Route::get('products/{slug}', ['as' => 'products', 'uses' => 'Frontend\MainController@product']);
    Route::get('product-details/{slug}', ['as' => 'productdetails', 'uses' => 'Frontend\MainController@productdetails']);
    Route::get('my-account', ['as' => 'myaccount', 'uses' => 'Frontend\MainController@Myaccount']);
    Route::get('order-details/{id}',['as'=>'orderdetails','uses'=>'Frontend\MainController@orderdetail']);
    Route::get('checkout-page', ['as' => 'checkout', 'uses' => 'Frontend\MainController@checkoutpage']);

//Start Cart Route
    Route::get('cart', ['as' => 'cart', 'uses' => 'Frontend\MainController@cart']);
    Route::post('cart-save', ['as' => 'cartsave', 'uses' => 'Backend\Cart\CartController@addcart']);
    Route::post('update-save', ['as' => 'updatecart', 'uses' => 'Backend\Cart\CartController@updatecart']);
    Route::post('remove-cart', ['as' => 'removecart', 'uses' => 'Backend\Cart\CartController@removecart']);
//End Cart Route

//Start Front Login Route
    Route::get('loginfront', ['as' => 'loginfront', 'uses' => 'Frontend\UserAuthController@frontlogin']);
    Route::post('save-register', ['as' => 'saveregister', 'uses' => 'Frontend\UserAuthController@registersave']);
    Route::post('save-login', ['as' => 'loginsave', 'uses' => 'Frontend\UserAuthController@loginsave']);
    Route::post('update-password', ['as' => 'updatepassword', 'uses' => 'Frontend\UserAuthController@updatepassword']);
    Route::get('user-logout', ['as' => 'ulogout', 'uses' => 'Frontend\UserAuthController@logout']);
//End Front Login Route

//User Profile
    Route::post('user-profile-update', ['as' => 'profileupdate', 'uses' => 'Frontend\UserAuthController@updateprofile']);
//End User Profile

// Start Forget Password Route
    Route::get('forget-password', ['as' => 'forgetpassword', 'uses' => 'Frontend\UserAuthController@forgetpassword']);
    Route::post('reset-forget-password', ['as' => 'resetforgetpassword', 'uses' => 'Frontend\UserAuthController@updateforgetpassword']);
    Route::get('change-forget-password/{id}', ['as' => 'changeforgetpassword', 'uses' => 'Frontend\UserAuthController@showResetPasswordForm']);
    Route::post('submitforgetpassword/{id}', ['as' => 'submitforgetpassword', 'uses' => 'Frontend\UserAuthController@submitResetPasswordForm']);
//End Forget Password Route

    /* Users Address route start*/
    Route::get('manage-user-address', ['as' => 'Useraddress', 'uses' => 'Backend\UserAddress\UserAddressController@index']);
    Route::get('add-user-address', ['as' => 'addUseraddress', 'uses' => 'Backend\UserAddress\UserAddressController@addUser']);
    Route::post('save-user-address', ['as' => 'saveUseraddress', 'uses' => 'Backend\UserAddress\UserAddressController@saveUserAddress']);
    Route::get('edit-user-address', ['as' => 'editUseraddress', 'uses' => 'Backend\UserAddress\UserAddressController@editUserForm']);
    Route::post('update-user-address', ['as' => 'updateUseraddress', 'uses' => 'Backend\UserAddress\UserAddressController@editUser']);
    Route::get('del-user-address', ['as' => 'delUseraddress', 'uses' => 'Backend\UserAddress\UserAddressController@delUser']);
    Route::post('active-inactive-user-address/', ['as' => 'active_inactive_Useraddress', 'uses' => 'Backend\UserAddress\UserAddressController@active_inactive_user']);
    /* Users Address route end*/

//Order Route
    Route::post('save-order', ['as' => 'saveorder', 'uses' => 'Backend\Order\OrderController@saveorder']);
    Route::post('pay-online', ['as' => 'payonline', 'uses' => 'Backend\Order\OrderController@payonline']);
    Route::post('update-pay-online', ['as' => 'updatepayonline', 'uses' => 'Backend\Order\OrderController@updatepayonline']);
//End Order Route

//Route::get('export', 'MyController@export')->name('export');
//Route::get('importExportView', 'MyController@importExportView');
//Route::post('import', 'MyController@import')->name('import');

    Route::get('/dump', function () {
        exec('composer dump-autoload');
        echo 'composer dump-autoload complete';;
    });

});
