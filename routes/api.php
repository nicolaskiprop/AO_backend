<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('signup', 'Auth\AuthController@signup');
    Route::get('signup/activate/{token}', 'Auth\AuthController@signupActivate');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
        //Account apis
        Route::get('account/same_id', 'AccountController@SameId');
        Route::get('account/newly_opened', 'AccountController@NewlyOpened');
        Route::get('account/dormant', 'AccountController@DomantAccount');
        Route::get('account/staffs', 'AccountController@StaffAccount');
        Route::get('dashboard_counts', 'DashboardController@Counts');
        Route::get('loans/top', 'MobileLoanController@TopLoan');
    });
    Route::group([    
      'namespace' => 'Auth',    
      'middleware' => 'api',    
      'prefix' => 'password'
  ], function () {    
      Route::post('create', 'PasswordResetController@create');
      Route::get('find/{token}', 'PasswordResetController@find');
      Route::put('reset', 'PasswordResetController@reset');
  });
});
