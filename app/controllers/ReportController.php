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
		$data['roles_list'] = User::whereRaw('role not in (1,6)')->orderBy('surname','asc')->get();
		
		$data['datemese_list'] = DB::table('visit_date_mese')->get();
		$data['report_list'] = VisitReport::whereNascosto('0')->whereTipo('2')->get();
		$data['report_list_max'] = VisitReport::whereNascosto('0')->whereTipo('1')->get();

		$data['fanno'] = (Input::has('anno')?Input::get('anno'):date('Y'));
		$data['fmese'] = (Input::has('mese')?Input::get('mese'):date('m'));
		$data['date_list'] = DB::table('visit_date_settimana')
			->where('anno', $data['fanno'])
			->where('mese', $data['fmese'])
			->orderBy('settimana')
			->get();

		$this->layout = View::make('report.list', $data);
	}


	 public function disactivate($id)
	 {
	 	$user = VisitReport::find($id);
	 	$user->nascosto = 1;
	 	$user->save();
		 return Redirect::action('ReportController@home');
	 }

	

}