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
		if (Auth::user()->role == 1 || Auth::user()->role == 10)
		{
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{

				$raw = Visit::getFilter(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));

				$data['roles_list'] = Visit::whereRaw($raw)->where('active','1')->orderBy('created_at', 'desc')->paginate(15);
			
			}

			else
				$data['roles_list'] = Visit::where('active','1')->orderBy('created_at', 'desc')->paginate(15);
		} else {
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{
				$raw = Visit::getFilter(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));
				$data['roles_list'] = Visit::whereRaw($raw)->where('active','1')->where('user_created', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
			}
			else
				$data['roles_list'] = Visit::where('user_created', Auth::user()->id)->where('active','1')->orderBy('created_at', 'desc')->paginate(15);
		}
		$this->layout = View::make('visit.list', $data);
	}


public function tablelistorario($orario)
	{

		
		$data['roles_list'] = Visit::where('orario',$orario)->where('giorno',date('d'))->where('active','1')->orderBy('created_at', 'desc')->paginate(100);
		$data['orario'] = $orario;
		$this->layout = View::make('visit.listpista', $data);
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
		$data['selectFQ'] = array('una volta a settimana' => 'una volta a settimana',
			'una volta ogni 15 giorni' => 'una volta ogni 15 giorni',
			'una volta al mese' => 'una volta al mese',
			'mai' => 'mai',
			);
	  $data['v'] = Visit::find($id);
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



		
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		
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

			return Redirect::to('/redir/'.Input::get('id'))->withInput()->withErrors($role->errors());
		}else
		{

			if (Input::has('unipol'))
			{
				$role->typevisit = 1;

			} else if (Input::has('fondiaria'))
			{
				$role->typevisit = 2;

			} else if (Input::has('milano'))
			{
				$role->typevisit = 3;

			} else
				$role->typevisit = 1;

			//$role->data_nascita = Decoder::convert_date_in($userdata['data_nascita']);
			$role->targa = Input::get('targa');
			//$role->km = Input::get('km');
			$role->active = 0;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();

			$idc = DB::getPdo()->lastInsertId();
			
			return Redirect::to('/visit/wip/'.Input::get('id').'/'.$idc.'/?targa='.Input::get('targa').'&km='.Input::get('km').'&data_nascita='.Input::get('data_nascita'));
		}
		
	}


	public function storems()
	{
		$userdata = Input::all();

 		$role = new Visit;

	 	if( $role->valida($userdata) == false)
		{

			return Redirect::to('/ms')->withInput()->withErrors($role->errors());
		}else
		{


			if (Input::has('unipol'))
			{
				$role->typevisit = 1;

			} else if (Input::has('fondiaria'))
			{
				$role->typevisit = 2;

			} else if (Input::has('milano'))
			{
				$role->typevisit = 3;

			} else if (Input::has('clienti'))
			{
				$role->typevisit = 4;

			} else
				$role->typevisit = 1;


		
			//$role->data_nascita = Decoder::convert_date_in($userdata['data_nascita']);
			$role->targa = Input::get('targa');
			//$role->km = Input::get('km');
			$role->active = 0;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();

			$idc = DB::getPdo()->lastInsertId();
			
			return Redirect::to('/visit/wipms/'.Input::get('id').'/'.$idc.'/?targa='.Input::get('targa').'&km='.Input::get('km').'&data_nascita='.Input::get('data_nascita'));
		}
		
	}


	public function store2()
	{
		$userdata = Input::all();

 		$role = new Visit;

	 	if( $role->valida($userdata) == false)
		{

			return Redirect::to('/a/'.Input::get('id'))->withInput()->withErrors($role->errors());
		}else
		{

			if (Input::has('unipol'))
			{
				$role->typevisit = 1;

			} else if (Input::has('fondiaria'))
			{
				$role->typevisit = 2;

			} else if (Input::has('milano'))
			{
				$role->typevisit = 3;

			} else
				$role->typevisit = 1;

			//$role->data_nascita = Decoder::convert_date_in($userdata['data_nascita']);
			$role->targa = Input::get('targa');
			//$role->km = Input::get('km');
			$role->km = Input::get('id');
			$role->active = 0;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();

			$idc = DB::getPdo()->lastInsertId();
			
			return Redirect::to('/visit/a2/'.Input::get('id').'/'.$idc.'/?targa='.Input::get('targa').'&km='.Input::get('km').'&data_nascita='.Input::get('data_nascita'));
		}
		
	}

	public function store2a()
	{
		$userdata = Input::all();

 		$role = new Visit;

	 	if( $role->valida($userdata) == false)
		{


		

			return Redirect::to('/unipol/444')->withInput()->withErrors($role->errors());
		}else
		{

			
			if (Input::has('unipol'))
			{
				$role->typevisit = 1;

			} else if (Input::has('fondiaria'))
			{
				$role->typevisit = 2;

			} else if (Input::has('milano'))
			{
				$role->typevisit = 3;

			} else
				$role->typevisit = 1;

			//$role->data_nascita = Decoder::convert_date_in($userdata['data_nascita']);
			$role->targa = Input::get('targa');
			//$role->km = Input::get('km');
			$role->km = 0;
			$role->active = 0;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();

			$idc = DB::getPdo()->lastInsertId();
			
			return Redirect::to('/visit/unipol/'.Input::get('id').'/'.$idc.'/?targa='.Input::get('targa').'&km='.Input::get('km').'&data_nascita='.Input::get('data_nascita'));
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
			if (Input::has('cons_12')) $role->cons_12 = Input::get('cons_12');
			if (Input::has('cons_13')) $role->cons_13 = Input::get('cons_13');
			if (Input::has('cons_14')) $role->cons_14 = Input::get('cons_14');
			if (Input::has('cons_15')) $role->cons_15 = Input::get('cons_15');
			if (Input::has('cons_16')) $role->cons_16 = Input::get('cons_16');
			if (Input::has('cons_17')) $role->cons_17 = Input::get('cons_17');
			if (Input::has('cons_18')) $role->cons_18 = Input::get('cons_18');
			if (Input::has('cons_19')) $role->cons_19 = Input::get('cons_19');
			if (Input::has('cons_20')) $role->cons_20 = Input::get('cons_20');
			$role->mcons_12 = Input::get('mcons_12');
			$role->mcons_13 = Input::get('mcons_13');
			$role->mcons_14 = Input::get('mcons_14');
			$role->mcons_15 = Input::get('mcons_15');
			$role->mcons_16 = Input::get('mcons_16');
			$role->mcons_17 = Input::get('mcons_17');
			$role->mcons_18 = Input::get('mcons_18');
			$role->mcons_19 = Input::get('mcons_19');
			$role->mcons_20 = Input::get('mcons_20');

			$role->nbarman = Input::get('nbarman');
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

	public function showWip($idp,$id)
	{
		$data['role_detail'] = Visit::find($id);
		$data['id'] = $id;
		$data['idp'] = $idp;
		$this->layout = View::make('visit.wip', $data);
	}

	public function showThanks($idp,$id)
	{
		$role = Visit::find($id);
		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$this->layout = View::make('visit.thanks', $data);
	}


    public function showWipms($idp,$id)
	{
		$data['role_detail'] = Visit::find($id);
		$data['id'] = $id;
		$data['idp'] = $idp;
		$this->layout = View::make('visit.wipms', $data);
	}

	public function showThanksms($idp,$id)
	{
		$role = Visit::find($id);
		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$data['type'] = $role->typevisit;
		VisitController::showplay($idp,$id);
	}

	public function showThanksmscli($idp,$id)
	{
		$role = Visit::find($id);
		$role->active = 1;
		$role->km = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$data['type'] = $role->typevisit;
		VisitController::showplay($idp,$id);
	}

	public function nextslot($idp,$id)
	{
		$role = Visit::find($id);
		$orario = Input::get('orario');

		$orario = $orario+1 ;

		$frequenza = Frequenze::where('orario',$orario)->first();
		if (is_object($frequenza))
		{
			$role->orario = $orario;
			$role->sistema = $frequenza->sistema;
			$role->save();


			$vince=1;
			$degree = 360 * 5;
			$win = 1;
			$hour = $frequenza->sistema;
			
			
			$data['role_detail'] = $role;
			$data['id'] = $id;
			$data['idp'] = $idp;
			$data['type'] = $role->typevisit;
			$data['degree'] = $degree;
			$data['win'] = $win;
			$data['hour'] = $hour;
			
			$data['orario'] = $orario;
			$data['sistema'] = $frequenza->sistema;
			$this->layout = View::make('visit.thanksresultok', $data);



		} else
		{
			$vince=1;
			$degree = 360 * 5;
			$win = 1;

			$data['role_detail'] = $role;
			$data['id'] = $id;
			$data['idp'] = $idp;
			$data['type'] = $role->typevisit;
			$data['degree'] = $degree;
			$data['win'] = $win;
			$data['hour'] = $role->sistema;
			$data['orario'] = $orario;
			$data['sistema'] = '';
			$this->layout = View::make('visit.thanksresultok', $data);
		}

		
	}


	public function rinuncia($idp,$id)
	{
		$role = Visit::find($id);
		$role->orario = 0;
		
		$role->sistema = 'Rinuncia';
		$role->save();
		return Redirect::to('/ms');

		
	}

	public function rinunciaAdm($id,$orario)
	{
		$role = Visit::find($id);
		$role->orario = 0;
		
		$role->sistema = 'Rinuncia';
		$role->save();
		return Redirect::to('/listafrequenze/'.$orario);

		
	}

	public function conferma($idp,$id)
	{
		$role = Visit::find($id);
		$role->orario = Input::get('orario');
		$role->sistema = Input::get('sistema');
		
		$role->giorno = date('d');
		$role->save();
		return Redirect::to('/ms');

		
	}
	public function showThanksplay($idp,$id)
	{
		$role = Visit::find($id);
		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$data['type'] = $role->typevisit;
		$this->layout = View::make('visit.thanksgame', $data);
	}

	public function showplay($idp,$id)
	{

		$degree =  rand ( 1200 ,2024 );
		$orario = date('H');
		$giorno = date('d');

		$frequenza = Frequenze::where('orario', $orario)->first();
		

		if (is_object($frequenza))
		{
			$vittorie = Visit::where('orario',$orario)->where('giorno',$giorno)->count();
			
			if ($vittorie >= $frequenza->giri )
			{
				$vince = 0 ;
			} else
			{
				
				if ($frequenza->freq == 100)
				{
					$vince = 1 ;
				} else
				{

					$degree =  rand ( 1 ,100 ); 
					if ($degree < $frequenza->freq)
						$vince = 1 ;
					else
						$vince = 0 ;
				}
			}

		}
		else
		{
			$vince = 0 ;
		}


		if ($vince==1)
		{
			
			$degree = 360 * 5;
			$win = 1;
			$hour = $frequenza->sistema;
		}
		else
		{
			$degree = 250 * 5;
			$win = 0;
			$hour = '';
		}



	
		
		$role = Visit::find($id);
		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$data['type'] = $role->typevisit;
		$data['degree'] = $degree;
		$data['win'] = $win;
		$data['hour'] = $hour;
		$data['orario'] = $orario;
		$data['sistema'] = $hour;
		$this->layout = View::make('visit.thanksresult', $data);


	}



	public function showWip2($idp,$id)
	{
		$data['role_detail'] = Visit::find($id);
		$data['id'] = $id;
		$data['idp'] = $idp;
		

		$this->layout = View::make('visit.wip2', $data);
	}

	public function showThanks2($idp,$id)
	{
		$role = Visit::find($id);

		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
		$data['idp'] = $idp;
		$this->layout = View::make('visit.thanks2', $data);
	}



	public function showWip2a($id)
	{
		$data['role_detail'] = Visit::find($id);
		$data['id'] = $id;
	
		

		$this->layout = View::make('visit.wip2a', $data);
	}

	public function showThanks2a($id)
	{
		$role = Visit::find($id);

		$role->active = 1;
		$role->save();
		$data['role_detail'] = $role;
		$data['id'] = $id;
	
		$this->layout = View::make('visit.thanks2a', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Visit::find($id);
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('VisitController@tablelist');
	}

	public function getIntroducer()
    {
        $term      = Input::get('term');
        $associate = array();
        $search    = DB::select(
                       "
            select id , rank_id ,associate_no as value ,CONCAT(name ,'  ID  ',associate_no) as label
            from associates
            where match (name, associate_no )
            against ('+{$term}*' IN BOOLEAN MODE)
            "
        );

        foreach ($search as $result) {
            $associate[] = $result;

        }

        return json_encode($associate);

    }
    
    public function getRanklist()
    {
        $get_rank_id = Input::get('rank_id');
        $ranklist    = Rank::select('id', 'rankname')->where('rank_no', '<=', $get_rank_no)->get();

        return $ranklist;
    }


 public function showBack($idp,$id)
	{
		$role = Visit::find($id);
		$role->errore = 1;
		$role->save();
		return Redirect::to('/ms');
		
	}

}