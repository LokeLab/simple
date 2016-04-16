<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tablelist()
	{
		$data['users_list'] = User::all();
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
		$data['roleList'] = DB::table('roles')->orderBy('id')->lists('description', 'id');
		$data['partnerList'] = DB::table('partner')->orderBy('id')->lists('description', 'id');
		$this->layout = View::make('user.add', $data);
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
	  $data['roleList'] = DB::table('roles')->orderBy('id')->lists('description', 'id');
	  $data['partnerList'] = DB::table('partner')->orderBy('id')->lists('description', 'id');
     

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
				'partner' => Input::get('partner'),
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
			
			
			$user->email = $userdata['email'];
			$user->partner = $userdata['partner'];

			
			

			
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
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'partner' => Input::get('partner'),
				'password' =>   Input::get('password'),
				'password_confirmation' =>   Input::get('confirm')
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
				
				
				$user->email = $userdata['email'];
				$user->partner = $userdata['partner'];


				$user->user_created = 1;
				$user->user_updated = 0;
				$user->user_deleted = 0;
				
				$user->active = 1;
				$user->deleted = 0;
				$user->save();


				$maildata = array(
								'email'  =>  $userdata['email'],
								'name' => $userdata['name']. ' '. $userdata['surname'],
								'password' =>  $userdata['password']
								);


					Mail::send('emails.registration', $maildata, function($message)
						{
						    $message->to(Input::get('email'), '')
						    ->subject('Confirmation registration on ' . Config::get('app.site'));
						});


				return Redirect::to('users')->with('message',Lang::get('users.adduser_success'));
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
			$data['user_detail'] = User::find($id);
			$this->layout = View::make('login.profile_view', $data);
			
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
		$id = Auth::user()->id;

		if ($id)
		{

			$userrole = Session::get('userrole');
			
			$data['user_detail'] = User::find($id);

			$this->layout = View::make('login.profile_edit', $data);
			
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


	

		public function update_profile()
	{
			$id = Auth::user()->id;

			$userdata = array(
			//personal infos
			
			'name' =>Input::get('name'),
			'surname' =>Input::get('surname'),
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

					
					    
					
					$user->name = Input::get('name');
					$user->surname = Input::get('surname');
					$user->staffpermbefore = Input::get('staffpermbefore');
					$user->stafftempbefore = Input::get('stafftempbefore');
					$user->staffpermafter = Input::get('staffpermafter');
					$user->stafftempafter = Input::get('stafftempafter');
					
					$user->user_updated = Auth::user()->id;
					
					$user->save();
					$this->layout = View::make('login.profile_success');
				}else{
					return Redirect::action('UsersController@editProfile' )->withInput();
				}
			}
	}

}