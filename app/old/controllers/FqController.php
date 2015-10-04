<?php
//TODO:adattare
class FqController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['roles_list'] = Frequenze::all();
		$this->layout = View::make('frequenze.list', $data);
	}

	 public function prenota($id,$dat)
	 {
	  		$role = new Visit;
			$role->typevisit = 1;		
			$role->targa = 'Prenotazione';
			$role->giorno = date('d');
			$role->orario = $id;
			$role->sistema = $dat;

			$role->active = 1;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();


	  $data['roles_list'] = Frequenze::all();
	  $this->layout = View::make('frequenze.list', $data);
	 }

	 public function prenotaposto()
	 {
	  		$role = new Visit;
			$role->typevisit = 1;		
			$role->targa = Input::get('targa');
			$role->giorno = date('d');
			$role->orario = Input::get('orario');
			$role->sistema = Input::get('sistema');

			$role->active = 1;
			$role->created_at = date('Y-m-d H:i:s');
			//$role->user_created = Auth::user()->id;
			
			$role->save();


	  $data['roles_list'] = Frequenze::all();
	  $this->layout = View::make('frequenze.list', $data);
	 }


	 /**
	  * Show the form for editing the specified role.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['user_detail'] = Frequenze::where('id',$id)->first();
	  $this->layout = View::make('frequenze.edit', $data);
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

 		$role = Frequenze::find($id);

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('FqController@edit', $id )->withInput()->withErrors($role->errors());
		}
		else
		{		
			$role->sistema = $userdata['sistema'];
			$role->giri = $userdata['giri'];
			$role->freq = $userdata['freq'];
			$role->save();

			return Redirect::action('FqController@tablelist');
		}
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