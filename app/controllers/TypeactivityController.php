<?php
//TODO:adattare
class TypeactivityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['typeactivity_list'] = Typeactivity::all();;
		$this->layout = View::make('typeactivity.list', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  $data['typeactivity_detail'] = Typeactivity::find($id);
	  $data['typeactivityList'] = Typeactivity::lists('description', 'id');
	  $this->layout = View::make('typeactivity.view', $data);
	 }

	 /**
	  * Show the form for editing the specified typeactivity.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['typeactivity_detail'] = Typeactivity::find($id);
	  $this->layout = View::make('typeactivity.edit', $data);
	 }

	 /**
	  * Update the specified typeactivity in storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function update($id)
	 {

	 	$userdata = array(
	 		'description' => Input::get('description')
				);

 		$typeactivity = typeactivity::find($id);

	 	if( $typeactivity->valida($userdata) == false)
		{
			return Redirect::action('TypeactivityController@edit', $id )->withInput()->withErrors($typeactivity->errors());
		}
		else
		{		
			$typeactivity->description = $userdata['description'];
			 $typeactivity->save();

			 return Redirect::action('TypeactivityController@tablelist');
		}
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$this->layout = View::make('typeactivity.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$userdata = array(
	 		'description' => Input::get('description')
				);

 		$typeactivity = new Typeactivity;

	 	if( $typeactivity->valida($userdata) == false)
		{
			return Redirect::action('TypeactivityController@add')->withInput()->withErrors($typeactivity->errors());
		}else
		{
			$typeactivity->description =  $userdata['description'];
			
			
			$typeactivity->save();
			return Redirect::action('TypeactivityController@tablelist');
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
		$data['typeactivity_detail'] = Typeactivity::find($id);
		$this->layout = View::make('typeactivity.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$typeactivity = Typeactivity::find($id);
		$typeactivity ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('TypeactivityController@tablelist');
	}

}