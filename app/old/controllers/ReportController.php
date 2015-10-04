<?php

class ReportController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$data['roles_list'] = User::whereRaw('role not in (1,6)')->orderBy('surname','desc')->get();
		$data['date_list'] = DB::table('visit_date_settimana')->get();
		$data['datemese_list'] = DB::table('visit_date_mese')->get();
		$this->layout = View::make('report.list', $data);
	}

	

}