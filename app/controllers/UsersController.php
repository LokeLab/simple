<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['users_list'] = User::where('role', '<>', '3')->get();
		$data['DT'] = 'userTable';
		$this->layout = View::make('user.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$roleList = DB::table('roles')->orderBy('id')->where('id', '<>',3)->lists('description', 'id');
		$this->layout = View::make('user.add')->with('roleList', $roleList);
	}

	 public function view($id)
	 {
	  $data['user_detail'] = User::find($id);
	  $roleList = DB::table('roles')->orderBy('id')->lists('description', 'id');
	  $this->layout = View::make('user.view', $data)->with('roleList', $roleList);

	 }

	 /**
	  * Show the form for editing the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {
	  $data['user_detail'] = User::find($id);
	  $data['roleList'] = DB::table('roles')->orderBy('id')->where('id', '<>',3)->lists('description', 'id');
     

	  $this->layout = View::make('user.edit', $data);
	 }

	 /**
	  * Update the specified resource in storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function update($id)
	 {
		 $user = User::find($id);


		$userdata = array(
				'email'  => Input::get('email'),
				'username' => Input::get('email'),
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'company' => Input::get('company'),
				'phone' => Input::get('phone'),
				'note' => Input::get('note'),
				'address' => Input::get('address'),
				'city' => Input::get('city'),
				'cap' => Input::get('cap'),
				'state' => Input::get('state'),
				'country' => Input::get('country'),
				'password' =>   Input::get('password'),
				'password_confirmation' =>   Input::get('confirm')
				);


		

		if( $user->validaModifyUser($userdata) == false)
		{
			return Redirect::back()->withInput()->withErrors($user->errors());
		}else
		{
			if ( Input::has('password') ) {
				$user->password = Hash::make(Input::get('password'));
			}
			$user->role = Input::get('role');
		 	$user->username = $userdata['email'];
		 
		 	//personal infos
			$user->name = $userdata['name'];
			$user->surname = $userdata['surname'];
			$user->company = $userdata['company'];
			$user->phone = $userdata['phone'];
			$user->email = $userdata['email'];
			$user->note = $userdata['note'];
			//address
			$user->address = $userdata['address'];
			$user->city = $userdata['city'];
			$user->cap = $userdata['cap'];
			$user->state = $userdata['state'];
			$user->country = $userdata['country'];
			$user->language = Input::get('language');
			$user->user_manager = Input::get('user_manager');
			$user->developer = Input::get('developer');
			$user->agente = Input::get('agente');

			if (Session::get('userid') == $id)
				Session::put('Language', Input::get('language') );

			//Session::put('Language', Input::get('language'));
			$user->user_updated = 1;
			$user->save();



			return Redirect::action('UsersController@tablelist')->with('message',Lang::get('users.modifyuser_success'));
		}
	 }

	 /**
	  * Sets active a given user.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function activate($id)
	 {
	 	$user = User::find($id);
	 	$user->active = 1;
	 	$user->save();
		 return Redirect::action('UsersController@tablelist');
	 }

	 /**
	  * Sets inactive a given user.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function disactivate($id)
	 {
	 	$user = User::find($id);
	 	$user->active = 0;
	 	$user->save();
		 return Redirect::action('UsersController@tablelist');
	 }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$userdata = array(
				'email'  => Input::get('email'),
				'username' => Input::get('email'),
				'password' => Input::get('password'),
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'company' => Input::get('company'),
				'phone' => Input::get('phone'),
				'note' => Input::get('note'),
				'address' => Input::get('address'),
				'city' => Input::get('city'),
				'cap' => Input::get('cap'),
				'state' => Input::get('state'),
				'country' => Input::get('country')
				);


			$user = new User;

			if( $user->validaAddUser($userdata) == false)
			{
				return Redirect::action('UsersController@add' )->withInput()->withErrors($user->errors());
			}else
			{
				$user->password = Hash::make($userdata['password']);
				$user->role = Input::get('role');
			 	$user->username = $userdata['email'];
			 
			 	//personal infos
				$user->name = $userdata['name'];
				$user->surname = $userdata['surname'];
				$user->company = $userdata['company'];
				$user->phone = $userdata['phone'];
				$user->email = $userdata['email'];
				$user->note = $userdata['note'];
				//address
				$user->address = $userdata['address'];
				$user->city = $userdata['city'];
				$user->cap = $userdata['cap'];
				$user->state = $userdata['state'];
				$user->country = $userdata['country'];
				$user->user_manager = Input::get('user_manager');
				$user->developer = Input::get('developer');
				$user->agente = Input::get('agente');


				$user->user_created = 1;
				$user->user_updated = 0;
				$user->user_deleted = 0;
				$user->external_login = 1;
				$user->ext_login_code = "";
				$user->type_external_login = 1;
				$user->try_wrong_login = 0;
				$user->active = 1;
				$user->deleted = 0;
				$user->save();



				return Redirect::action('UsersController@tablelist')->with('message',Lang::get('users.adduser_success'));
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
		$data['user_detail'] = User::find($id);


		
		$this->layout = View::make('user.view', $data);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showProfile()
	{
		$id = Session::get('userid');

		if ($id)
		{

			$userrole = Session::get('userrole');

			if ($userrole == 3)
			{

				$data['user_detail'] = DB::table('customers') ->where('user_id', $id) ->first();
				$data['docs_list'] = DB::table('customer_doc') ->where('customer_id', $id) ->get();
				$this->layout = View::make('login.profile_view_adv', $data);

				
			} else
			{
				$data['user_detail'] = User::find($id);

				$this->layout = View::make('login.profile_view', $data);

			}


			
		} else
		{
			return Redirect::to('login');

		}

	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editProfile()
	{
		$id = Session::get('userid');

		if ($id)
		{

			$userrole = Session::get('userrole');

			if ($userrole == 3)
			{

				$data['user_detail'] = DB::table('customers') ->where('user_id', $id) ->first();
				$this->layout = View::make('login.profile_edit_adv', $data);

				
			} else
			{
				$data['user_detail'] = User::find($id);

				$this->layout = View::make('login.profile_edit', $data);

			}


			
		} else
		{
			return Redirect::to('login');

		}

	}


	/**
	 * Remove the specified resource from storage.
	 * It uses the SoftDelete method
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
	 	$user->deleted = 1;
	 	$user->email = '';
	 	
	 	$user->save();

	 	$user->delete();
		return Redirect::action('UsersController@tablelist');
	}


	public function update_adv_profile()
		{
				$id = Session::get('userid');

				$user = User::find($id);
				$userdata = array(
				//personal infos
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'company' => Input::get('company'),
				'phone' => Input::get('phone'),
				'note' => Input::get('note'),
				//address
				'address' => Input::get('address'),
				'city' => Input::get('city'),
				'cap' => Input::get('cap'),
				'state' => Input::get('state'),
				'country' => Input::get('country'),
				'password' =>Input::get('password'),
				'password_confirmation' =>Input::get('confirm'),
				);

				$customerdata = array(
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'company' => Input::get('company'),
				'phone' => Input::get('phone'),
				'note' => Input::get('note'),
				'address' => Input::get('address'),
				'city' => Input::get('city'),
				'cap' => Input::get('cap'),
				'state' => Input::get('state'),
				'country' => Input::get('country'),
				'company_description' => Input::get('company_description'),
                'community' => (array)Input::get('community'),
				//'company_code' => Input::get('company_code'),
				'fax' => Input::get('fax'),
				'web' => Input::get('web'),
				'calltoaction' => Input::get('calltoaction'),
				
				
				'reference' => Input::get('reference'),
				'phone_reference' => Input::get('phone_reference'),
				'email_reference' => Input::get('email_reference'),
				'contract_from' =>  Decoder::convert_date_in(Input::get('contract_from')),
				'contract_to' =>  Decoder::convert_date_in(Input::get('contract_to'))
				);
			 
			$userForValidation = new User;
			$customerForValidation = new Customer;
			if( $userForValidation->validaEditProfile($userdata) == false)
			{
				return Redirect::action('UsersController@editProfile' )->withInput()->withErrors($userForValidation->errors());
			}
			else
			{
				if( $customerForValidation->validaEditProfile($customerdata) == false)
				{
					return Redirect::action('UsersController@editProfile' )->withInput()->withErrors($customerForValidation->errors());
				}
				else
				{

					if ( Input::has('password') ) {
						$user->password = Hash::make(Input::get('password'));
					}
					
				 	//personal infos
					$user->name = Input::get('name');
					$user->surname = Input::get('surname');
					$user->company = Input::get('company');
					$user->phone = Input::get('phone');
					$user->note = Input::get('note');
					$user->language = Input::get('language');
					Session::put('Language', Input::get('language'));
					//address
					$user->address = Input::get('address');
					$user->city = Input::get('city');
					$user->cap = Input::get('cap');
					$user->state = Input::get('state');
					$user->country = Input::get('country');

					$destinationPath = '';
				    $filename        = '';

				    if (Input::hasFile('logo')) {
				    
				        $file            = Input::file('logo');
				        $destinationPath = Config::get('app.url_upload', 'upload').'logo/';    
				        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
				        $uploadSuccess   = $file->move($destinationPath, $filename);
				      
				        $user->logo = $filename;
				    }



					$user->save();

					$data['user_detail'] = DB::table('customers') ->where('user_id', $id) 
						->update(array(
								'name' => Input::get('name'),
								'surname' => Input::get('surname'),
								'company' => Input::get('company'),
								'phone' => Input::get('phone'),
								'note' => Input::get('note'),
								'address' => Input::get('address'),
								'city' => Input::get('city'),
								'cap' => Input::get('cap'),
								'state' => Input::get('state'),
								'country' => Input::get('country'),
								'language' => Input::get('language'),

								'company_description' => Input::get('company_description'),
								//'company_code' => Input::get('company_code'),
								'fax' => Input::get('fax'),
								'web' => Input::get('web'),
								'logo' => $filename,
								'reference' => Input::get('reference'),
								'phone_reference' => Input::get('phone_reference'),
								'email_reference' => Input::get('email_reference'),
								'contract_from' =>  Decoder::convert_date_in(Input::get('contract_from')),
								'contract_to' =>  Decoder::convert_date_in(Input::get('contract_to'))
							));



					$this->layout = View::make('login.profile_success');
				}
			}
		}


		public function update_pr_profile()
	{
			$id = Session::get('userid');

			$userdata = array(
			//personal infos
			'name' => Input::get('name'),
			'surname' => Input::get('surname'),
			'company' => Input::get('company'),
			'phone' => Input::get('phone'),
			'note' => Input::get('note'),
			//address
			'address' => Input::get('address'),
			'city' => Input::get('city'),
			'cap' => Input::get('cap'),
			'state' => Input::get('state'),
			'country' => Input::get('country'),
			'password' =>Input::get('password'),
			'password_confirmation' =>Input::get('confirm'),
			);

			$userForValidation = new User;
			
			if( $userForValidation->validaEditProfile($userdata) == false)
			{
				return Redirect::action('UsersController@editProfile' )->withInput()->withErrors($userForValidation->errors());
			}
			else
			{
				if($id){
					$user = User::find($id);
				 	//personal infos
				 	if ( Input::has('password') ) {
						$user->password = Hash::make(Input::get('password'));
					}

					$destinationPath = '';
					    $filename        = '';

					    if (Input::hasFile('logo')) {
					    
					        $file            = Input::file('logo');
					        $destinationPath = Config::get('app.url_upload', 'upload').'logo/';    
					        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
					        $uploadSuccess   = $file->move($destinationPath, $filename);
					      
					        $user->logo = $filename;
					    }
					    
					$user->name = $userdata['name'];
					$user->surname = $userdata['surname'];
					$user->company = $userdata['company'];
					$user->phone = $userdata['phone'];
					
					$user->note = $userdata['note'];
					//address
					$user->address = $userdata['address'];
					$user->city = $userdata['city'];
					$user->cap = $userdata['cap'];
					$user->state = $userdata['state'];
					$user->country = $userdata['country'];
					$user->user_updated = Auth::user()->id;
					Session::put('Language', Input::get('language'));
					$user->language = Input::get('language');

					$user->save();
					Session::forget('nameComplete');
					Session::put('nameComplete', $user['name'] . ' ' . $user['surname']);
					$this->layout = View::make('login.profile_success');
				}else{
					return Redirect::action('UsersController@editProfile' )->withInput();
				}
			}
	}

}