<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('consumers', function () {
    $consumers = App\Consumers::all();
    echo json_encode($consumers);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

	# Route to a View directly
	Route::get('/', function () {
	    return view('welcome');
	});

	# Route to a controller called PagesController
	Route::get('register', 'PagesController@register');
	Route::get('login', 'PagesController@login');

	Route::get('auth/register', 'UserController@getRegister');
	Route::post('auth/register', 'UserController@postRegister');

	Route::get('auth/logout', 'UserController@getLogout');

    Route::get('auth/login', [
        'uses' => 'UserController@getLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest']
    ]);

    Route::post('auth/login', [
        'uses' => 'UserController@postLogin',
        'middleware' => ['guest']
    ]);
});