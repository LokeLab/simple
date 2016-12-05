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
		if(Session::has('filter')) 
			$arr_filter = Session::get('filter');
		else
			$arr_filter = array('partner' => '' , 
			'code' => '',
			'budgetrow' => '',
			'activity' => '',
			'notpayed' => '0',
			'withproblem' => '0',
			'checked' => '0'); 
		if (Input::has('all'))
		{
			$arr_filter = array('partner' => '' , 
			'code' => '',
			'budgetrow' => '',
			'activity' => '',
			'notpayed' => '0',
			'withproblem' => '0',
			'checked' => '0');
		} else
		{
			$arr_filter['partner'] = Input::has('partner')?Input::get('partner'):$arr_filter['partner'] ;
			$arr_filter['code'] = Input::has('code')?Input::get('code'):$arr_filter['code'];
			$arr_filter['budgetrow'] = Input::has('budgetrow')?Input::get('budgetrow'):$arr_filter['budgetrow'];
			$arr_filter['activity'] = Input::has('activity')?Input::get('activity'):$arr_filter['activity'];
			$arr_filter['notpayed'] = Input::has('notpayed')?Input::get('notpayed'):$arr_filter['notpayed'];
			$arr_filter['withproblem'] = Input::has('withproblem')?Input::get('withproblem'):$arr_filter['withproblem'];
			$arr_filter['checked'] = Input::has('checked')?Input::get('checked'):$arr_filter['checked'];
		}
		

		$data['arr_parner'] = array('' =>'Select partner')+Partner::lists('description', 'id');
		if (Auth::user()->role == 1 || Auth::user()->role == 10)
		{
				$raw = Visit::getFilter($arr_filter);

				$data['roles_list'] = Visit::whereRaw($raw)->where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);
		} else {

				$arr_filter['partner'] = Auth::user()->partner;
				

				$raw = Visit::getFilter($arr_filter);
				$data['roles_list'] = Visit::whereRaw($raw)->where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);

		}

		$data['arrFilter'] = $arr_filter;
		$this->layout = View::make('visit.list', $data);
	}


	public function tablelistTobeverified()
	{
		if(Session::has('filterCheck')) 
			$arr_filter = Session::get('filterCheck');
		else
			$arr_filter = array('partner' => '' , 
			'code' => '',
			'budgetrow' => '',
			'activity' => '',
			'notpayed' => '0',
			'withproblem' => '0',
			'checked' => '0'); 
		if (Input::has('all'))
		{
			$arr_filter = array('partner' => '' , 
			'code' => '',
			'budgetrow' => '',
			'activity' => '',
			'notpayed' => '0',
			'withproblem' => '0',
			'checked' => '0');
		} else
		{
			$arr_filter['partner'] = Input::has('partner')?Input::get('partner'):$arr_filter['partner'] ;
			$arr_filter['code'] = Input::has('code')?Input::get('code'):$arr_filter['code'];
			$arr_filter['budgetrow'] = Input::has('budgetrow')?Input::get('budgetrow'):$arr_filter['budgetrow'];
			$arr_filter['activity'] = Input::has('activity')?Input::get('activity'):$arr_filter['activity'];
			
		
		}

		$data['arr_parner'] =array('' =>'Select partner')+ Partner::lists('description', 'id');
		if (Auth::user()->role == 1 || Auth::user()->role == 10)
		{
			
			$raw = Visit::getFilterSospese($arr_filter);

			$data['roles_list'] = Visit::whereRaw($raw)->where('verified',0)->where('active',1)->where('deleted',0)->orderBy('d_document', 'asc')->paginate(15);
			$data['arrFilter'] = $arr_filter;
			$this->layout = View::make('visit.listSospese', $data);
		} 
		
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
			if ($role->active)
				return Redirect::action('VisitController@tablelistTobeverified')->withMessage(trans('generic.success'));
			else
			 	return Redirect::action('VisitController@tablelist')->withMessage(trans('generic.success'));
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


	
	 /**
	  * Sets active a given admin.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function activate($id)
	 {
	 	$user = Visit::find($id);
	 	$user->verified = 1;
	 	$user->verified_at = date('Y-m-d H:i:s');
	 	
	 	$user->save();
		return Redirect::action('VisitController@tablelistTobeverified')->withMessage(Lang::get('generic.activation'));
	 }

	 /**
	  * Sets inactive a given admin.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function disactivate($id)
	 {
	 	$user = Visit::find($id);
	 	$user->active = 0;
	 	$user->rejection = Input::get('rejection');
		$user->rejected = 1;
	 	$user->rejected_at = date('Y-m-d H:i:s');

	 	$user->save();
		 return Redirect::to('tobechecked')->withMessage(trans('generic.rejection'));
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