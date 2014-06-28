<?php
//TODO:adattare
class RoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['roles_list'] = Role::all();;
		$this->layout = View::make('role.list', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  $data['role_detail'] = Role::find($id);
	  $data['roleList'] = Role::lists('description', 'id');
	  $this->layout = View::make('role.view', $data);
	 }

	 /**
	  * Show the form for editing the specified role.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['role_detail'] = Role::find($id);
	  $this->layout = View::make('role.edit', $data);
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

 		$role = role::find($id);

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
		$this->layout = View::make('role.add');
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
		$data['role_detail'] = Role::find($id);
		$this->layout = View::make('role.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::find($id);
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('RoleController@tablelist');
	}

}