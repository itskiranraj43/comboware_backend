<?php

Route::redirect('/', 'admin/home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ($company) {
    Auth::routes(['register' => false]);
});
    // Authentication Routes...
    Route::get('login', 'Front\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Front\LoginController@login');
    Route::post('logout', 'Front\LoginController@logout')->name('logout');
    // Registration Routes...
    Route::get('register', 'Front\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Front\RegisterController@register');
    // // Password Reset Routes...
    Route::get('password/reset', 'Front\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Front\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Front\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Front\ResetPasswordController@reset');

Route::group(['middleware' => ['auth', 'role:type1|type2']], function () {
    Route::get('/home', 'Front\HomeController@index')->name('home');
});



Route::group(['middleware' => ['auth', 'role:administrator|subadmin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/subCategory', 'Admin\SubCategoryController');
    Route::resource('/variant', 'Admin\VariantController');
    Route::resource('/variantOption', 'Admin\VariantOptionController');
    Route::resource('/product', 'Admin\ProductController');
    Route::get('/image/delete/{id}', 'Admin\ProductController@ImageDelete');
    
    // Change Password Routes...
    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change_password');
    Route::patch('changepassword', 'Auth\ChangePasswordController@changePassword')->name('changepassword');    
});