<?php
//TODO:adattare
class VisitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		if (Auth::user()->role == 1)
		{
			if (Input::has('filter'))
				$data['roles_list'] = Visit::where('typevisit',Input::get('filter') )->where('active','1')->orderBy('visit_at', 'desc')->paginate(15);
			else
				$data['roles_list'] = Visit::where('active','1')->orderBy('visit_at', 'desc')->paginate(15);
		} else {
			if (Input::has('filter'))
				$data['roles_list'] = Visit::where('typevisit',Input::get('filter') )->where('active','1')->where('user_created', Auth::user()->id)->orderBy('visit_at', 'desc')->paginate(15);
			else
				$data['roles_list'] = Visit::where('user_created', Auth::user()->id)->where('active','1')->orderBy('visit_at', 'desc')->paginate(15);
		}
		$this->layout = View::make('visit.list', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  //$data['role_detail'] = Visit::find(Input::get('id'));
	  $data['v'] = Visit::find($id);

	  

	  $this->layout = View::make('visit.view', $data);
	 }

	 /**
	  * Show the form for editing the specified visit.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['role_detail'] = Visit::find(Input::get('id'));
	  $data['typerole_list'] = Visit::getTypeList();
	  $this->layout = View::make('visit.edit', $data);
	 }

	 /**
	  * Update the specified role in storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function update($id)
	 {

	 	$userdata = array(
	 		'visit_at' => Input::get('visit_at')
				);

 		$role = Visit::find(Input::get('id'));

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('VisitController@edit', $id )->withInput()->withErrors($role->errors());
		}
		else
		{		
			$role->visit_at = $userdata['visit_at'];

			$role->city = Input::get('city');
			$role->address = Input::get('address');
			$role->local = Input::get('local');
			$role->local_definition = Input::get('local_definition');
			$role->code = Input::get('code');
			$role->furniture = Input::get('furniture');
			$role->code_team_sell_out = Input::get('code_team_sell_out');
			$role->name = Input::get('name');
			$role->surname = Input::get('surname');
			$role->role_description = Input::get('role_description');
			$role->role = Input::get('role');
			$role->user_manager = Input::get('user_manager');
			$role->user_agente = Input::get('user_agente');
			$role->user_developer = Input::get('user_developer');

			$role->aperitif_auto = Input::get('aperitif_auto');
			$role->aperitif_auto_fq = Input::get('aperitif_auto_fq');
			$role->advocacy = Input::get('advocacy');
			$role->advocacy_fq = Input::get('advocacy_fq');
			$role->s_consumer = Input::get('s_consumer');
			$role->s_consumer_fq = Input::get('s_consumer_fq');
			$role->l_advocacy = Input::get('l_advocacy');
			$role->l_advocacy_fq =Input::get('l_advocacy_fq');

			$role->typevisit =Input::get('typevisit');
			$role->first_visit =Input::get('first_visit');
			$role->pot =Input::get('pot');
			$role->re =Input::get('re');
			$role->qsmr =Input::get('qsmr');
			$role->qscc =Input::get('qscc');





			$role->updated_at = date('Y-m-d H:i');
			$role->user_updated = Auth::user()->id;

			$role->save();

			 return Redirect::action('VisitController@tablelist');
		}
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$data['selectFQ'] = array('una volta a settimana' => 'una volta a settimana',
			'una volta ogni 15 giorni' => 'una volta ogni 15 giorni',
			'una volta al mese' => 'una volta al mese',
			'mai' => 'mai',
			);
		$this->layout = View::make('visit.add',$data);
	}


	public function addstep1($id)
	{
		$data['id'] = $id;
		$data['visit'] = Visit::find($id);
		$this->layout = View::make('visit.add1',$data);
	}

	public function addstep2($id)
	{
		$data['id'] = $id;
		$data['visit'] = Visit::find($id);
		$this->layout = View::make('visit.add2',$data);
	}

	public function addstep3($id)
	{
		$data['id'] = $id;
		
		$data['visit'] = Visit::find($id);
		

		$this->layout = View::make('visit.add3',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$userdata = Input::all();

 		$role = new Visit;

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('VisitController@add')->withInput()->withErrors($role->errors());
		}else
		{

			$role->visit_at = Decoder::convert_date_in($userdata['visit_at']);

			$role->city = Input::get('city');
			$role->address = Input::get('address');
			$role->local = Input::get('local');
			$role->local_definition = Input::get('local_definition');
			$role->code = Input::get('code');
			$role->furniture = Input::get('furniture');
			//$role->code_team_sell_out = Input::get('code_team_sell_out');
			$role->name = Input::get('name');
			$role->surname = Input::get('surname');
			$role->role_description = Input::get('role_description');
			$role->role = Input::get('role');
			$role->user_manager = Input::get('user_manager');
			$role->user_agente = Input::get('user_agente');
			$role->user_developer = Input::get('user_developer');

			$role->aperitif_auto = Input::get('aperitif_auto');
			$role->aperitif_auto_fq = Input::get('aperitif_auto_fq');
			$role->advocacy = Input::get('advocacy');
			$role->advocacy_fq = Input::get('advocacy_fq');
			$role->s_consumer = Input::get('s_consumer');
			$role->s_consumer_fq = Input::get('s_consumer_fq');
			

			$role->typevisit =Input::get('typevisit');
			$role->first_visit =Input::get('first_visit');
			$role->pot =Input::get('pot');
			$role->re =Input::get('re');
			$role->qsmr =Input::get('qsmr');
			$role->qscc =Input::get('qscc');

			$role->created_at = date('Y-m-d H:i:s');
			$role->user_created = Auth::user()->id;
			
			$role->save();

			$id = DB::getPdo()->lastInsertId();

			return Redirect::to(Visit::selectRedirect(Auth::user()->role, Input::get('typevisit'), $id));
		}
		
	}


	public function storestep1()
	 {

	 	$userdata = Input::all();;

 		
 		$role = new Visit;

	 	if( $role->validastep1($userdata) == false)
		{
			return Redirect::back()->withInput()->withErrors($role->errors());
		}
		else
		{	

			$role = Visit::find(Input::get('id'));

			

			$role->case_1 = Input::get('case_1');
			$role->case_2 = Input::get('case_2');
			$role->case_3 = Input::get('case_3');
			$role->case_4 = Input::get('case_4');
			$role->case_5 = Input::get('case_5');
			$role->case_6 = Input::get('case_6');
			$role->case_7 = Input::get('case_7');
			$role->case_8 = Input::get('case_8');
			$role->case_9 = Input::get('case_9');
			$role->case_10 = Input::get('case_10');
			$role->case_11 = Input::get('case_11');
			$role->case_12 = Input::get('case_12');
			$role->case_13 = Input::get('case_13');
			$role->case_14 = Input::get('case_14');
			$role->case_15 = Input::get('case_15');
			$role->case_16 = Input::get('case_16');
			$role->case_17 = Input::get('case_17');
			$role->case_18 = Input::get('case_18');
			
			$role->description_ma = Input::get('description_ma');
			$role->description_ma2 = Input::get('description_ma2');
			$role->note_visit = Input::get('note_visit');
			
			$role->active = 1;
			$role->updated_at = date('Y-m-d H:i:s');
			$role->user_updated = Auth::user()->id;

			$role->save();

			$message = 'Inserita una nuova visita '.Visit::getTypeLabel($role->typevisit).' '.date('d/m/Y H:i:s');
			$type = 'info';
			User::setEvents(Auth::user()->id, $message, $type);

			 return Redirect::action('VisitController@tablelist');
		}
	 }

	 public function storestep2()
	 {

	 	$userdata = Input::all();

 		
 		$role = new Visit;

	 	if( $role->validastep2($userdata) == false)
		{
			return Redirect::back()->withInput()->withErrors($role->errors());
		}
		else
		{	

			$role = Visit::find(Input::get('id'));

			

			$role->case_1 = Input::get('case_1');
			$role->case_2 = Input::get('case_2');
			$role->case_3 = Input::get('case_3');
			$role->case_5 = Input::get('case_5');
			$role->case_12 = Input::get('case_12');
			$role->case_13 = Input::get('case_13');
			$role->nbarman = Input::get('nbarman');
			
			$role->description_ma = Input::get('description_ma');
			$role->description_ma2 = Input::get('description_ma2');
			$role->note_visit = Input::get('note_visit');
			
			$role->active = 1;
			$role->updated_at = date('Y-m-d H:i:s');
			$role->user_updated = Auth::user()->id;

			$role->save();

			$message = 'Inserita una nuova visita '.Visit::getTypeLabel($role->typevisit).' '.date('d/m/Y H:i:s');
			$type = 'info';
			User::setEvents(Auth::user()->id, $message, $type);

			 return Redirect::action('VisitController@tablelist');
		}
	 }

	 public function storestep3()
	 {

	 	$userdata = Input::all();


 		
 		$role = new Visit;

	 	if( $role->validastep3($userdata) == false)
		{
			return Redirect::back()->withInput()->withErrors($role->errors());
		}
		else
		{	

			$role = Visit::find(Input::get('id'));

			
			$role->case_1 = Input::get('case_1');
			$role->case_2 = Input::get('case_2');
			$role->case_3 = Input::get('case_3');
			$role->case_5 = Input::get('case_5');
			$role->case_12 = Input::get('case_12');
			$role->case_13 = Input::get('case_13');
			$role->nbarman = Input::get('nbarman');
			
			$role->description_ma = Input::get('description_ma');
			$role->description_ma2 = Input::get('description_ma2');

			if (Input::has('cons_1')) $role->cons_1 = Input::get('cons_1');
			if (Input::has('cons_2')) $role->cons_2 = Input::get('cons_2');
			if (Input::has('cons_3')) $role->cons_3 = Input::get('cons_3');
			if (Input::has('cons_4')) $role->cons_4 = Input::get('cons_4');
			if (Input::has('cons_5')) $role->cons_5 = Input::get('cons_5');
			if (Input::has('cons_6')) $role->cons_6 = Input::get('cons_6');
			if (Input::has('cons_7')) $role->cons_7 = Input::get('cons_7');
			if (Input::has('cons_8')) $role->cons_8 = Input::get('cons_8');
			if (Input::has('cons_9')) $role->cons_9 = Input::get('cons_9');
			if (Input::has('cons_10')) $role->cons_10 = Input::get('cons_10');
			if (Input::has('cons_11')) $role->cons_11 = Input::get('cons_11');
			if (Input::has('cons_12')) $role->cons_12 = Input::get('cons_12');
			if (Input::has('cons_13')) $role->cons_13 = Input::get('cons_13');
			if (Input::has('cons_14')) $role->cons_14 = Input::get('cons_14');
			if (Input::has('cons_15')) $role->cons_15 = Input::get('cons_15');
			if (Input::has('cons_16')) $role->cons_16 = Input::get('cons_16');
			if (Input::has('cons_17')) $role->cons_17 = Input::get('cons_17');
			if (Input::has('cons_18')) $role->cons_18 = Input::get('cons_18');
			if (Input::has('cons_19')) $role->cons_19 = Input::get('cons_19');
			if (Input::has('cons_20')) $role->cons_20 = Input::get('cons_20');


			$role->mcons_1 = Input::get('mcons_1');
			$role->mcons_2 = Input::get('mcons_2');
			$role->mcons_3 = Input::get('mcons_3');
			$role->mcons_4 = Input::get('mcons_4');
			$role->mcons_5 = Input::get('mcons_5');
			$role->mcons_6 = Input::get('mcons_6');
			$role->mcons_7 = Input::get('mcons_7');
			$role->mcons_8 = Input::get('mcons_8');
			$role->mcons_9 = Input::get('mcons_9');
			$role->mcons_10 = Input::get('mcons_10');
			$role->mcons_11 = Input::get('mcons_11');
			$role->mcons_12 = Input::get('mcons_12');
			$role->mcons_13 = Input::get('mcons_13');
			$role->mcons_14 = Input::get('mcons_14');
			$role->mcons_15 = Input::get('mcons_15');
			$role->mcons_16 = Input::get('mcons_16');
			$role->mcons_17 = Input::get('mcons_17');
			$role->mcons_18 = Input::get('mcons_18');
			$role->mcons_19 = Input::get('mcons_19');
			$role->mcons_20 = Input::get('mcons_20');
			
			$role->cons_ma2 = Input::get('cons_ma2');
			
			$role->note_visit = Input::get('note_visit');
		
			$role->active = true;
				
			$role->updated_at = date('Y-m-d H:i:s');
			$role->user_updated = Auth::user()->id;
			
			$role->save();

			$message = 'Inserita una nuova visita '.Visit::getTypeLabel($role->typevisit).' '.date('d/m/Y H:i:s');
			$type = 'info';
			User::setEvents(Auth::user()->id, $message, $type);

			 return Redirect::action('VisitController@tablelist');
		}
	 }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['role_detail'] = Visit::find(Input::get('id'));
		$this->layout = View::make('visit.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Visit::find(Input::get('id'));
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('VisitController@tablelist');
	}

}