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




Route::get('/', 'HomeController@redirectToHome');

Route::get('updateCurrency', 'ImporterController@getCurrency');

Route::group(array('before' => 'auth_admin'), function() {
	Route::controller('translations', 'Barryvdh\TranslationManager\Controller');
});


Route::group(array('before'=>'auth'), function() 
{
	Route::post('home', 'HomeController@redirectToHome');
	Route::get('home', 'HomeController@redirectToHome');
	Route::get('home_admin', array('uses' => 'HomeController@home_admin'));
	Route::get('adminfunction', array('uses' => 'HomeController@home_adminfunction'));
	Route::get('home_partner', array('uses' => 'HomeController@home_partner'));
	Route::get('home_pm', array('uses' => 'HomeController@home_pm'));
	Route::get('home_auditor', array('uses' => 'HomeController@home_auditor'));
	Route::get('home_auditorext', array('uses' => 'HomeController@home_auditorext'));
	Route::get('faq', array('uses' => 'HomeController@faq'));

});


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
	Route::put('update_profile', array( 'uses' => 'UsersController@update_profile'));

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
| Typeactivity Routes
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('typeactivity', array( 'uses' => 'TypeactivityController@tablelist'));

	Route::get('typeactivity/add', array( 'uses' =>  'TypeactivityController@add'));

	Route::get('typeactivity/{id}', array( 'uses' => 'TypeactivityController@view'));

	Route::get('typeactivity/{id}/edit', array( 'uses' => 'TypeactivityController@edit'));

	Route::put('typeactivity/{id}', array('as' => 'role.update','uses' => 'TypeactivityController@update'));

	Route::post('typeactivity', array('as' => 'role.add',  'uses' => 'TypeactivityController@store'));

	Route::delete('typeactivity/{id}', array('uses' => 'TypeactivityController@destroy'));

});



/*
|--------------------------------------------------------------------------
| Activity Routes
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('activities', array( 'uses' => 'ActivityController@tablelist'));
	Route::get('activitiesrecapp', array( 'uses' => 'ActivityController@recapp'));

	Route::get('activities/add', array( 'uses' =>  'ActivityController@add'));

	Route::get('activities/{id}', array( 'uses' => 'ActivityController@view'));

	Route::get('activities/{id}/edit', array( 'uses' => 'ActivityController@edit'));

	Route::put('activities/{id}', array('as' => 'role.update','uses' => 'ActivityController@update'));

	Route::post('activities', array('as' => 'role.add',  'uses' => 'ActivityController@store'));

	Route::delete('activities/{id}', array('uses' => 'ActivityController@destroy'));


	Route::post('activities/detail', 'ActivityController@saveInformationSource');
	Route::get('activities/detail/{id}', 'ActivityController@getInformationSource');

});


Route::group(array('before'=>'auth'), function() 
{
	Route::get('budget/{id}', array( 'uses' => 'BudgetController@tablelist'));
	Route::get('financialsummary/{id}', array( 'uses' => 'BudgetController@financialsummary'));
	Route::get('currency', array( 'uses' => 'BudgetController@tablelistCurrency'));

	Route::get('budget/add', array( 'uses' =>  'BudgetController@add'));

	Route::get('budget/{id}/edit', array( 'uses' => 'BudgetController@edit'));

	Route::put('budget/{id}', array('as' => 'role.update','uses' => 'BudgetController@update'));

	Route::post('budget', array('as' => 'role.add',  'uses' => 'BudgetController@store'));

	Route::delete('budget/{id}', array('uses' => 'BudgetController@destroy'));
	
	Route::get('activationfunction/{id}', array( 'uses' => 'HomeController@activationfunction'));
	Route::get('financialsummary/exportbudget/{id}', array( 'uses' => 'ExporterController@getBudgetPartner'));
	Route::get('financialsummary/exportchapterspent/{id}/{chapter}', array( 'uses' => 'ExporterController@getChapterExpensesPartner'));


});



/*
|--------------------------------------------------------------------------
| Partner Routes
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'auth'), function() 
{
	Route::get('partners', array( 'uses' => 'PartnerController@tablelist'));

	Route::get('partners/add', array( 'uses' =>  'PartnerController@add'));

	Route::get('partners/{id}', array( 'uses' => 'PartnerController@view'));

	Route::get('partners/{id}/edit', array( 'uses' => 'PartnerController@edit'));

	Route::put('partners/{id}', array('as' => 'partner.update','uses' => 'PartnerController@update'));

	Route::post('partners', array('as' => 'partner.add',  'uses' => 'PartnerController@store'));

	Route::delete('partners/{id}', array('uses' => 'PartnerController@destroy'));

});

Route::group(array('before'=>'auth'), function() 
{
	Route::get('cost', array( 'uses' => 'CostController@tablelist'));
	Route::get('tobechecked', array( 'uses' => 'CostController@tablelistTobeverified'));

	Route::get('cost/add', array( 'uses' =>  'CostController@add'));

	Route::get('cost/{id}', array( 'uses' => 'CostController@view'));

	Route::get('cost/{id}/edit', array( 'uses' => 'CostController@edit'));
	Route::get('cost/{id}/check', array( 'uses' => 'CostController@view'));
	Route::get('cost/{id}/approve', array( 'uses' => 'CostController@activate'));
	Route::post('cost/{id}/reject', array( 'uses' => 'CostController@disactivate'));


	Route::put('cost/{id}', array('as' => 'cost.update','uses' => 'CostController@update'));

	

	Route::post('cost', array('as' => 'cost.add',  'uses' => 'CostController@store'));
	
	Route::delete('cost/{id}', array('uses' => 'CostController@destroy'));
	Route::delete('costSospese/{id}', array('uses' => 'CostController@destroySospese'));



	Route::post('cost/{id}/edit', array('as' => 'cost.update','uses' => 'CostController@update'));
});




