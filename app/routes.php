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
	Route::get('home_partner', array('uses' => 'HomeController@home_promoter'));
	Route::get('home_tecnico', array('uses' => 'HomeController@home_tecnico'));
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
	Route::put('update_profile', array(
                            
                            'uses' => 'UsersController@update_profile'
                            ));

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

	Route::get('activities/add', array( 'uses' =>  'ActivityController@add'));

	Route::get('activities/{id}', array( 'uses' => 'ActivityController@view'));

	Route::get('activities/{id}/edit', array( 'uses' => 'ActivityController@edit'));

	Route::put('activities/{id}', array('as' => 'role.update','uses' => 'ActivityController@update'));

	Route::post('activities', array('as' => 'role.add',  'uses' => 'ActivityController@store'));

	Route::delete('activities/{id}', array('uses' => 'ActivityController@destroy'));

});


Route::group(array('before'=>'auth'), function() 
{
	Route::get('budget/{id}', array( 'uses' => 'BudgetController@tablelist'));
	Route::get('currency', array( 'uses' => 'BudgetController@tablelistCurrency'));

	Route::get('budget/add', array( 'uses' =>  'BudgetController@add'));

	Route::get('budget/{id}/edit', array( 'uses' => 'BudgetController@edit'));

	Route::put('budget/{id}', array('as' => 'role.update','uses' => 'BudgetController@update'));

	Route::post('budget', array('as' => 'role.add',  'uses' => 'BudgetController@store'));

	Route::delete('budget/{id}', array('uses' => 'BudgetController@destroy'));

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
	Route::get('visit', array( 'uses' => 'VisitController@tablelist'));
	Route::get('visitSospese', array( 'uses' => 'VisitController@tablelistSospese'));

	Route::get('visit/add', array( 'uses' =>  'VisitController@add'));

	Route::get('visit/{id}', array( 'uses' => 'VisitController@view'));

	Route::get('visit/{id}/edit', array( 'uses' => 'VisitController@edit'));

	Route::put('visit/{id}', array('as' => 'visit.update','uses' => 'VisitController@update'));

	Route::post('visit/step1', array('as' => 'visit.add',  'uses' => 'VisitController@storestep1'));
	Route::post('visit/step2', array('as' => 'visit.add',  'uses' => 'VisitController@storestep2'));
	Route::post('visit/step3', array('as' => 'visit.add',  'uses' => 'VisitController@storestep3'));

	Route::post('visit', array('as' => 'visit.add',  'uses' => 'VisitController@store'));
	
	Route::delete('visit/{id}', array('uses' => 'VisitController@destroy'));
	Route::delete('visitSospese/{id}', array('uses' => 'VisitController@destroySospese'));

	Route::get('visit1/add/{id}', array( 'uses' =>  'VisitController@addstep1'));
	Route::get('visit2/add/{id}', array( 'uses' =>  'VisitController@addstep2'));
	Route::get('visit3/add/{id}', array( 'uses' =>  'VisitController@addstep3'));

	Route::post('visit/{id}/edit', array('as' => 'visit.update','uses' => 'VisitController@update'));
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
	Route::get('reporting', array('uses' => 'ReportController@home'));
	Route::post('reporting', array('uses' => 'ExporterController@getFiltered'));
	Route::post('reportingMax', array('uses' => 'ExporterController@getFilteredMax'));
});


Route::group(array('before'=>'auth'), function() 
{
	Route::get('/export/weekall/{anno}/{settimana}/', array('uses' => 'ExporterController@getWeekAll'));
	
	Route::get('/export/weekRoleall/{anno}/{settimana}/{role}', array('uses' => 'ExporterController@getWeekRoleAll'));
	Route::get('/export/week/{anno}/{settimana}/{id}', array('uses' => 'ExporterController@getWeek'));
	Route::get('/export/monthall/{anno}/{settimana}/', array('uses' => 'ExporterController@getMonthAll'));
	Route::get('/export/monthallmax/{anno}/{settimana}/', array('uses' => 'ExporterController@getMonthAllMax'));
	Route::get('/export/allmax', array('uses' => 'ExporterController@getAllMax'));
	
	Route::get('/export/monthalldetail/{anno}/{mese}/', array('uses' => 'ExporterController@getMonthAll'));
	Route::get('/export/useralldetail/{user}/', array('uses' => 'ExporterController@getUserAll'));

	
	Route::post('/async/{id}/disactivate', array( 'uses' => 'ReportController@disactivate'));
});



Route::get('associates/add_to_introducer_id' , 'AdminAssociatesController@getIntroducer');
    Route::get('associates/add_to_rank_list' , 'AdminAssociatesController@getRanklist');
    Route::get('report/cron' , 'ExporterController@jobSheduler');


