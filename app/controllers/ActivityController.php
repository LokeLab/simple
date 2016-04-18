<?php
//TODO:adattare
class ActivityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['activities_list'] = Activity::all();;
		$this->layout = View::make('activities.list', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  $data['activities_detail'] = Activity::find($id);
	  $data['activitiesList'] = Activity::lists('description', 'id');
	  $this->layout = View::make('activities.view', $data);
	 }

	 /**
	  * Show the form for editing the specified activities.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['activities_detail'] = Activity::find($id);
	  
	  $data['array_type'] = Typeactivity::lists('description','description');
	  $this->layout = View::make('activities.edit', $data);
	 }

	 /**
	  * Update the specified activities in storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function update($id)
	 {

	 	$userdata = Input::all();

 		$activities = Activity::find($id);

	 	if( $activities->valida($userdata) == false)
		{
			return Redirect::action('ActivityController@edit', $id )->withInput()->withErrors($activities->errors());
		}
		else
		{		
			$activities->activity =  $userdata['activity'];
			$activities->typeactivity =  $userdata['typeactivity'];
			$activities->d_document_start = isset($userdata['d_document_start'])? Decoder::convert_date_in($userdata['d_document_start']) : '';
			$activities->d_document_stop = isset($userdata['d_document_stop'])? Decoder::convert_date_in($userdata['d_document_stop']) : '';
			$activities->from_nation = $userdata['from_nation'];
			$activities->from_city = $userdata['from_city'];
			$activities->partner = $userdata['partner'];
			$activities->place = $userdata['place'];
			$activities->summary = $userdata['summary'];
		
			 $activities->save();

			 return Redirect::action('ActivityController@tablelist');
		}
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$data['array_type'] = Typeactivity::lists('description','description');
		$this->layout = View::make('activities.add',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$userdata = Input::all();



 		$activities = new Activity;

	 	if( $activities->valida($userdata) == false)
		{
			return Redirect::action('ActivityController@add')->withInput()->withErrors($activities->errors());
		}else
		{
			$activities->activity =  $userdata['activity'];
			$activities->typeactivity =  $userdata['typeactivity'];
			$activities->d_document_start = isset($userdata['d_document_start'])? Decoder::convert_date_in($userdata['d_document_start']) : '';
			$activities->d_document_stop = isset($userdata['d_document_stop'])? Decoder::convert_date_in($userdata['d_document_stop']) : '';
			$activities->from_nation = $userdata['from_nation'];
			$activities->from_city = $userdata['from_city'];
			$activities->partner = $userdata['partner'];
			$activities->place = $userdata['place'];
			$activities->summary = $userdata['summary'];
		
			
			$activities->save();

			$last_id = DB::getPdo()->lastInsertId();

			$template_detail = DB::table('activities_detail_model')->where('deleted', 0)->get();

						 foreach ($template_detail as $element) {
						 	DB::table('activities_detail')->insert(
						 			array(
						 				'title' => $element->title,
						 				'typeindicator' => $element->typeindicator,
						 				'forseen' => 0  ,
						 				'realized' => 0,
						 				'activity' => $last_id
						 				)

						 		);
						 }
			return Redirect::action('ActivityController@edit',$last_id);
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
		$data['activities_detail'] = Activity::find($id);
		$this->layout = View::make('activities.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$activities = Activity::find($id);
		$activities ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('ActivityController@tablelist');
	}


	public function saveInformationSource() {
		$input = Input::all();
		unset($input['_token']);
		unset($input['_method']);

		if ($input['id'] == -1) {
			$is = new Activitydetail();
		} else {
			$is = Activitydetail::getById($input['id']);
		}

		foreach ($input as $k => $v) {
			if ($k == 'id') continue;

			$is->$k = $v;
		}

		$is->save();

		return Response::json(array('data' => $is));
	}



	public function getInformationSource($id) {
		return Response::json(array('data' => Activitydetail::getById($id)));
	}



}