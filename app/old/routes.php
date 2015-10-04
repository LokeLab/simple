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


Route::get('/', 'HomeController@showWelcome');
Route::get('/redir/{id}', 'HomeController@redirect2home');
Route::post('/redir/{id}', 'HomeController@redirect2home');

Route::get('/ms', 'HomeController@redirect2homems');
Route::post('/ms', 'HomeController@redirect2homems');

Route::get('/a/{id}', 'HomeController@redirect2home2');
// Route::get('/unipol', 'HomeController@redirect2home3');
Route::get('/unipol/{id}', 'HomeController@redirect2home3');
Route::post('/a/{id}', 'HomeController@redirect2home2');

Route::group(array('before'=>'auth'), function() 
{
	Route::post('home', 'HomeController@redirectToHome');
	Route::get('home', 'HomeController@redirectToHome');
	Route::get('home_admin', array('uses' => 'HomeController@home_admin'));
	Route::get('home_promoter', array('uses' => 'HomeController@home_promoter'));
	Route::get('home_tecnico', array('uses' => 'HomeController@home_tecnico'));

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
	Route::put('update_pr_profile', array(
                            
                            'uses' => 'UsersController@update_pr_profile'
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

Route::group(array('before'=>'auth'), function() 
{
	Route::get('frequenze', array( 'uses' => 'FqController@tablelist'));

	Route::get('frequenze/{id}/edit', array( 'uses' => 'FqController@edit'));
	Route::get('frequenze/{id}/prenota/{dat}', array( 'uses' => 'FqController@prenota'));

	Route::put('frequenze/{id}', array('as' => 'role.update','uses' => 'FqController@update'));

});

	Route::post('visit', array('as' => 'visit.add',  'uses' => 'VisitController@store'));
	Route::post('visita', array('as' => 'visit.add',  'uses' => 'VisitController@store2'));
	Route::post('visitaI', array('as' => 'visit.add',  'uses' => 'VisitController@store2a'));
	Route::post('visitms', array('as' => 'visit.add',  'uses' => 'VisitController@storems'));
	Route::post('prenotaposto', array('as' => 'visit.add',  'uses' => 'FqController@prenotaposto'));
    
    Route::get('visit/unipol/{id}', array( 'uses' => 'VisitController@showWip2a'));
   

	Route::get('visit/wip/{idp}/{id}', array( 'uses' => 'VisitController@showWip'));
	Route::get('visit/wipms/{idp}/{id}', array( 'uses' => 'VisitController@showWipms'));
	Route::get('visit/a2/{idp}/{id}', array( 'uses' => 'VisitController@showWip2'));
	Route::get('visit/thanks2/{id}', array( 'uses' => 'VisitController@showThanks2a'));
	Route::get('visit/thanks/{idp}/{id}', array( 'uses' => 'VisitController@showThanks'));
	Route::get('visit/thanksms/{idp}/{id}', array( 'uses' => 'VisitController@showThanksms'));
	Route::get('visit/back/{idp}/{id}', array( 'uses' => 'VisitController@showback'));
	Route::get('visit/thanksmscli/{idp}/{id}', array( 'uses' => 'VisitController@showThanksmscli'));
	Route::get('visit/thanksplay/{idp}/{id}', array( 'uses' => 'VisitController@showThanksplay'));
	Route::get('visit/nextslot/{idp}/{id}', array( 'uses' => 'VisitController@nextslot'));
	Route::get('visit/rinuncia/{idp}/{id}', array( 'uses' => 'VisitController@rinuncia'));
	Route::get('visit/rinunciaAdm/{id}/{orario}', array( 'uses' => 'VisitController@rinunciaAdm'));
	Route::get('visit/conferma/{idp}/{id}', array( 'uses' => 'VisitController@conferma'));
	Route::get('visit/msplay/{idp}/{id}', array( 'uses' => 'VisitController@showplay'));
	Route::get('visit/a3/{idp}/{id}', array( 'uses' => 'VisitController@showThanks2'));


Route::group(array('before'=>'auth'), function() 
{
	Route::get('visit', array( 'uses' => 'VisitController@tablelist'));
	Route::get('listafrequenze/{orario}', array( 'uses' => 'VisitController@tablelistorario'));

	Route::get('visit/add', array( 'uses' =>  'VisitController@add'));

	Route::get('visit/{id}', array( 'uses' => 'VisitController@view'));

	Route::get('visit/{id}/edit', array( 'uses' => 'VisitController@edit'));

	Route::put('visit/{id}', array('as' => 'visit.update','uses' => 'VisitController@update'));

	Route::post('visit/step1', array('as' => 'visit.add',  'uses' => 'VisitController@storestep1'));
	Route::post('visit/step2', array('as' => 'visit.add',  'uses' => 'VisitController@storestep2'));
	Route::post('visit/step3', array('as' => 'visit.add',  'uses' => 'VisitController@storestep3'));

	
	Route::delete('visit/{id}', array('uses' => 'VisitController@destroy'));

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
});


Route::group(array('before'=>'auth'), function() 
{
	Route::get('/export/weekall/{anno}/{settimana}/', array('uses' => 'ExporterController@getWeekAll'));
	Route::get('/export/all', array('uses' => 'ExporterController@getAll'));
	Route::get('/export/weekRoleall/{anno}/{settimana}/{role}', array('uses' => 'ExporterController@getWeekRoleAll'));
	Route::get('/export/week/{anno}/{settimana}/{id}', array('uses' => 'ExporterController@getWeek'));
	Route::get('/export/monthall/{anno}/{settimana}/', array('uses' => 'ExporterController@getMonthAll'));
	
});



Route::get('associates/add_to_introducer_id' , 'AdminAssociatesController@getIntroducer');
    Route::get('associates/add_to_rank_list' , 'AdminAssociatesController@getRanklist');
 
