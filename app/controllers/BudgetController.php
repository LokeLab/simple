<?php
//TODO:adattare
class BudgetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist($id)
	{
		$data['roles_list'] = Budget::getAllbyPartner($id);
	
			
		$this->layout = View::make('budget.list', $data);
	}

	public function tablelistCurrency()
	{
		$data['DT'] = 'userTable';
		$data['currency_list'] = Currency::all();
		
		$this->layout = View::make('budget.currency', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function view($id)
	 {
	  $data['role_detail'] = Budget::find($id);
	  $data['roleList'] = Budget::lists('description', 'id');
	  $this->layout = View::make('budget.view', $data);
	 }

	 /**
	  * Show the form for editing the specified budget.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['role_detail'] = Budget::find($id);
	  $this->layout = View::make('budget.edit', $data);
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
			return Redirect::action('BudgetController@edit', $id )->withInput()->withErrors($role->errors());
		}
		else
		{		
			$role->description = $userdata['description'];
			 $role->save();

			 return Redirect::action('BudgetController@tablelist');
		}
	 }

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$this->layout = View::make('budget.add');
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

 		$role = new Budget;

	 	if( $role->valida($userdata) == false)
		{
			return Redirect::action('BudgetController@add')->withInput()->withErrors($role->errors());
		}else
		{
			$role->description =  $userdata['description'];
			$role->update = 0;
			
			$role->save();
			return Redirect::action('BudgetController@tablelist');
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
		$data['role_detail'] = Budget::find($id);
		$this->layout = View::make('budget.view', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Budget::find($id);
		$role ->delete();
		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::action('BudgetController@tablelist');
	}


	public function financialSummary($partner)
	{

		if(Auth::user()->role> 1 && Auth::user()->role<6 ){
			$partner = Auth::user()->partner;

			$data['partners_list'] = Partner::listWithBudget();
			


			$this->layout = View::make('budget.summary', $data);
		}else{
			return Redirect::action('HomeController@logout');
		}

	}

}