  
<?php
Route::resource('invoices', 'Invoice\InvoiceController',  ['except' => ['create', 'edit']]);
Route::get('invoice/{code}', 'Invoice\InvoiceController@showInvoices');
Route::get('pqrresponse/', 'PQR\PqrController@showNoAnswered');
Route::get('notifications/{code}', 'Invoice\InvoiceController@consultNotification');
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::get('users-count', 'User\UserController@count');
Route::resource('usersinfa', 'User\UserSinfaController', ['except' => ['create', 'edit']]);
Route::resource('news', 'News\NewsController', ['except' => ['create', 'edit']]);
Route::resource('points', 'Pays\PointsPaysController', ['except' => ['create', 'edit']]);
Route::get('points-count', 'Pays\PointsPaysController@count');
Route::resource('points', 'Pays\PointsPaysController', ['except' => ['create', 'edit']]);
Route::resource('pqr', 'PQR\PqrController', ['except' => ['create', 'edit']]);
Route::get('pqr-count', 'PQR\PqrController@count');
Route::resource('file', 'File\FileController', ['except' => ['create', 'edit']]);
Route::resource('pqrans', 'PQR\PqrAnsweredController', ['except' => ['create', 'edit']]);


Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendLinkEmail');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset');
    Route::post('login', 'AuthController@login');
    Route::post('loginAdmin', 'AuthController@loginAdmin');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('user', 'AuthController@user');
    });
});