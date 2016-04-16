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

	 	$userdata = array(
	 		'activity' => Input::get('activity')
				);

 		$activities = Activity::find($id);

	 	if( $activities->valida($userdata) == false)
		{
			return Redirect::action('ActivityController@edit', $id )->withInput()->withErrors($activities->errors());
		}
		else
		{		
			$activities->activity =  $userdata['activity'];
		
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
		$userdata = array(
	 		'activity' => Input::get('activity')
				);


 		$activities = new Activity;

	 	if( $activities->valida($userdata) == false)
		{
			return Redirect::action('ActivityController@add')->withInput()->withErrors($activities->errors());
		}else
		{
			$activities->activity =  $userdata['activity'];
		
			
			$activities->save();
			return Redirect::action('ActivityController@tablelist');
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

}