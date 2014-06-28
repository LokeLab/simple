<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

include 'routes_FP.php';
include 'routes_BM.php';


Route::get('/', 'HomeController@redirectToHome');
Route::post('home', 'HomeController@redirectToHome');




// Login logout 
Route::get('login', 'HomeController@login');
Route::post('login', function(){
	$rules = array(
        'username' => 'required|email',
        'password' => 'required'
    );

    $value = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );

    $userForLogin = new User;
    if( $userForLogin->validaLogin($value) == false)
    {
        return Redirect::to('login')->withInput()->withErrors($userForLogin->errors());
    }
    else 
    {
    	return Redirect::to('login_process');
    }
});
 
Route::post('login_process', array(
							
							'uses' => 'HomeController@login_process'
							));


Route::get('logout', array('uses' => 'HomeController@logout'));


/*
|--------------------------------------------------------------------------
| User Personal profile
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('profile', array( 'uses' => 'UsersController@showProfile'));
	Route::get('profile/edit', array( 'uses' => 'UsersController@editProfile'));
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('users', array('uses' => 'UsersController@tablelist'));

	Route::get('users/add', array( 'uses' =>  'UsersController@add'));

	Route::get('users/{id}', array('uses' => 'UsersController@view'));

	Route::get('users/{id}/edit', array( 'uses' => 'UsersController@edit'));

	Route::put('users/{id}/edit', array('as' => 'user.update','uses' => 'UsersController@update'));

	Route::post('users', array('as' => 'user.add',  'uses' => 'UsersController@store'	));

	Route::delete('users/{id}', array( 'uses' => 'UsersController@destroy'));

	Route::put('users/{id}/activate', array( 'uses' => 'UsersController@activate'));

	Route::put('users/{id}/disactivate', array( 'uses' => 'UsersController@disactivate'));
});


/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('roles', array( 'uses' => 'RoleController@tablelist'));

	Route::get('roles/add', array( 'uses' =>  'RoleController@add'));

	Route::get('roles/{id}', array( 'uses' => 'RoleController@view'));

	Route::get('roles/{id}/edit', array( 'uses' => 'RoleController@edit'));

	Route::put('roles/{id}', array('as' => 'role.update','uses' => 'RoleController@update'));

	Route::post('roles', array('as' => 'role.add',  'uses' => 'RoleController@store'));

	Route::delete('roles/{id}', array('uses' => 'RoleController@destroy'));

});


/*
|--------------------------------------------------------------------------
| HelpDesk Routes
|--------------------------------------------------------------------------
 */
Route::group(array('before'=>'auth'), function() 
{
	Route::get('helpdesk', array('uses' => 'HomeController@helpdesk'));
    Route::post('helpdesk', array('as' => 'helpdesk.send',  'uses' => 'HomeController@send'));
	
});
