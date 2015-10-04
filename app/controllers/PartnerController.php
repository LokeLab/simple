<?php
//TODO:adattare
class PartnerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['partners_list'] = Partner::listWithBudget();
		$this->layout = View::make('partner.list', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  $data['role_detail'] = Partner::find($id);
	  $data['roleList'] = Partner::lists('description', 'id');
	  $this->layout = View::make('partner.view', $data);
	 }

	 /**
	  * Show the form for editing the specified partner.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['role_detail'] = Partner::find($id);
	  $this->layout = View::make('partner.edit', $data);
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
	 		'description' => Input::get('description')
				);

 		$role = Partner::find($id);

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('RoleController@edit', $id )->withInput()->withErrors($role->errors());
		}
		else
		{		
			$role->description = $userdata['description'];
			 $role->save();

			 return Redirect::action('RoleController@tablelist');
		}
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$this->layout = View::make('partner.add');
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

 		$role = new Role;

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('RoleController@add')->withInput()->withErrors($role->errors());
		}else
		{
			$role->description =  $userdata['description'];
			$role->update = 0;
			
			$role->save();
			return Redirect::action('RoleController@tablelist');
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
		$data['role_detail'] = Partner::find($id);
		$this->layout = View::make('partner.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Partner::find($id);
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('RoleController@tablelist');
	}

}