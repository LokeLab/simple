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

		$data['arr_parner'] = Partner::lists('description', 'id');
		if (Auth::user()->role == 1 || Auth::user()->role == 10)
		{
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{

				$raw = Visit::getFilter(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));

				$data['roles_list'] = Visit::whereRaw($raw)->where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);
			
			}

			else
				$data['roles_list'] = Visit::where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);
		} else {
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{
				$raw = Visit::getFilter(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));
				$data['roles_list'] = Visit::whereRaw($raw)->where('deleted',0)->where('partner', Auth::user()->partner)->orderBy('d_document', 'asc')->paginate(15);
			}
			else
				$data['roles_list'] = Visit::where('partner', Auth::user()->partner)->where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);
		}
		$this->layout = View::make('visit.list', $data);
	}


	public function tablelistSospese()
	{
		if (Auth::user()->role == 1 || Auth::user()->role == 10)
		{
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{

				$raw = Visit::getFilterSospese(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));

				$data['roles_list'] = Visit::whereRaw($raw)->where('active',0)->orderBy('d_document', 'asc')->paginate(15);
			
			}

			else
				$data['roles_list'] = Visit::where('active',0)->orderBy('d_document', 'asc')->paginate(15);
		} else {
			if (Input::has('filter') || Input::has('code')||Input::has('local')||Input::has('name'))
			{
				$raw = Visit::getFilter(Input::get('filter'), Input::get('code'),Input::get('local'),Input::get('name'));
				$data['roles_list'] = Visit::whereRaw($raw)->where('active',0)->where('partner', Auth::user()->partner)->orderBy('d_document', 'asc')->paginate(15);
			}
			else
				$data['roles_list'] = Visit::where('partner', Auth::user()->partner)->where('active',0)->orderBy('d_document', 'asc')->paginate(15);
		}
		$this->layout = View::make('visit.listSospese', $data);
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



		$userdata = Input::all();

 		$role = Visit::find($id);

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('VisitController@edit', $id )->withInput()->withErrors($role->errors());
		}
		else
		{		
			$role->d_document = isset($userdata['d_document'])? Decoder::convert_date_in($userdata['d_document']) : '';
			$role->d_document_start = isset($userdata['d_document_start'])? Decoder::convert_date_in($userdata['d_document_start']) : '';
			$role->d_document_stop = isset($userdata['d_document_stop'])? Decoder::convert_date_in($userdata['d_document_stop']) : '';
			$role->partner = Auth::user()->partner;
			$role->description_cost = $userdata['description_cost'];
			$role->activity = $userdata['activity'];
			$role->budgetrow = $userdata['budgetrow'];
			$role->payedby = $userdata['payedby'];
			$role->d_document_paid = isset($userdata['d_document_paid'])? Decoder::convert_date_in($userdata['d_document_paid']) : '';
			$role->comment = $userdata['comment'];
			$role->tpc = $userdata['tpc'];
			$role->sub = $userdata['sub'];
			$role->d_document_start_travel = isset($userdata['d_document_start_travel'])? Decoder::convert_date_in($userdata['d_document_start_travel']) : '';
			$role->d_document_finish_travel = isset($userdata['d_document_finish_travel'])? Decoder::convert_date_in($userdata['d_document_finish_travel']) : '';
			$role->n_people = $userdata['n_people'];
			$role->name_people = $userdata['name_people'];
			$role->role_people = $userdata['role_people'];
			$role->from_nation = $userdata['from_nation'];
			$role->from_city = $userdata['from_city'];
			$role->to_nation = $userdata['to_nation'];
			$role->to_city = $userdata['to_city'];
			$role->currency = $userdata['currency'];
			$role->netamount = $userdata['netamount'];
			$role->vatamount = $userdata['vatamount'];


			
			//$role->updated_at = date('Y-m-d H:i');
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
		if (Input::has('type'))
		{
			$data['type'] = Input::get('type');
			$this->layout = View::make('visit.add',$data);
		} else
		{
			$data['type'] = '';
			$this->layout = View::make('visit.add_selection',$data);

		}
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

			$role->d_document = isset($userdata['d_document'])? Decoder::convert_date_in($userdata['d_document']) : '';
			$role->d_document_start = isset($userdata['d_document_start'])? Decoder::convert_date_in($userdata['d_document_start']) : '';
			$role->d_document_stop = isset($userdata['d_document_stop'])? Decoder::convert_date_in($userdata['d_document_stop']) : '';
			$role->partner = Auth::user()->partner;
			$role->description_cost = $userdata['description_cost'];
			$role->activity = $userdata['activity'];
			$role->budgetrow = $userdata['budgetrow'];
			$role->payedby = $userdata['payedby'];
			$role->d_document_paid = isset($userdata['d_document_paid'])? Decoder::convert_date_in($userdata['d_document_paid']) : '';
			$role->comment = $userdata['comment'];
			$role->tpc = $userdata['tpc'];
			$role->sub = $userdata['sub'];
			$role->d_document_start_travel = isset($userdata['d_document_start_travel'])? Decoder::convert_date_in($userdata['d_document_start_travel']) : '';
			$role->d_document_finish_travel = isset($userdata['d_document_finish_travel'])? Decoder::convert_date_in($userdata['d_document_finish_travel']) : '';
			$role->n_people = $userdata['n_people'];
			$role->name_people = $userdata['name_people'];
			$role->role_people = $userdata['role_people'];
			$role->from_nation = $userdata['from_nation'];
			$role->from_city = $userdata['from_city'];
			$role->to_nation = $userdata['to_nation'];
			$role->to_city = $userdata['to_city'];
			$role->currency = $userdata['currency'];
			$role->netamount = $userdata['netamount'];
			$role->vatamount = $userdata['vatamount'];



			$role->created_at = date('Y-m-d H:i:s');
			$role->user_created = Auth::user()->id;
			$destinationPath = '';
			$filename        = '';

			    if (Input::hasFile('doc1')) {
			    
			        $file            = Input::file('doc1');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc1 = $filename;

			       
			    }

			    if (Input::hasFile('doc2')) {
			    
			        $file            = Input::file('doc2');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc2 = $filename;

			       
			    }

			    if (Input::hasFile('doc3')) {
			    
			        $file            = Input::file('doc3');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc3 = $filename;

			       
			    }

			    if (Input::hasFile('doc4')) {
			    
			        $file            = Input::file('doc4');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc4 = $filename;

			       
			    }

			    if (Input::hasFile('doc5')) {
			    
			        $file            = Input::file('doc5');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc5 = $filename;

			       
			    }

			    if (Input::hasFile('doc6')) {
			    
			        $file            = Input::file('doc6');
			        $destinationPath = Config::get('app.url_upload', 'upload').'file/';    
			        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			      
			        $role->doc6 = $filename;

			       
			    }

			
			$role->save();

			$id = DB::getPdo()->lastInsertId();

			return Redirect::to('visit');
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

	public function destroySospese($id)
	{
		$role = Visit::find($id);
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('VisitController@tablelistSospese');
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

}