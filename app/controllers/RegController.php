<?php

class RegController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function advSubscription()
	{
		$this->layout = View::make('reg.adv_code');
	}

	public function prSubscription()
	{
		$this->layout = View::make('reg.promoter_code');
	}

	public function prSubscription_step2()
	{
		$id = Session::get('userid');
		$data['user_detail'] = DB::table('users') ->where('id', $id) ->first();
		$this->layout = View::make('reg.promoter_profile', $data);
	}

	public function advSubscription_step2()
	{
		$id = Session::get('userid');
		$data['user_detail'] = DB::table('customers') ->where('user_id', $id) ->first();
		$this->layout = View::make('reg.adv_profile', $data);
	}


	public function reg_promoter_profile()
	{
			$id = Session::get('userid');

			$userdata = array(
			'email'  => Input::get('email'),
			'username' => Input::get('email'),
			//personal infos
			'name' => Input::get('name'),
			'surname' => Input::get('surname'),
			'company' => Input::get('company'),
			'phone' => Input::get('phone'),
			'note' => Input::get('note'),
			'language' => Input::get('language'),
			//address
			'address' => Input::get('address'),
			'city' => Input::get('city'),
			'cap' => Input::get('cap'),
			'state' => Input::get('state'),
			'country' => Input::get('country')
			);

			$userForValidation = new User;

			if( $userForValidation->validaRegistrazioneProfile($userdata) == false)
			{
				return Redirect::action('RegController@prSubscription_step2' )->withInput()->withErrors($userForValidation->errors());
			}else
			{

				$user = User::find($id);
			 	$user->username = $userdata['email'];
			 
			 	//personal infos
				$user->name = $userdata['name'];
				$user->surname = $userdata['surname'];
				$user->company = $userdata['company'];
				$user->phone = $userdata['phone'];
				$user->email = $userdata['email'];
				$user->note = $userdata['note'];
				$user->language = $userdata['language'];
				//address
				$user->address = $userdata['address'];
				$user->city = $userdata['city'];
				$user->cap = $userdata['cap'];
				$user->state = $userdata['state'];
				$user->country = $userdata['country'];
				$user->save();




				$this->layout = View::make('reg.success');
			}
	}

	public function reg_adv_profile()
	{
			$id = Session::get('userid');

			$userdata = array(
				'email'  => Input::get('email'),
				'username' => Input::get('email'),
				//personal infos
				'name' => Input::get('name'),
				'surname' => Input::get('surname'),
				'company' => Input::get('company'),
				'phone' => Input::get('phone'),
				'note' => Input::get('note'),
				//'company_code' => Input::get('company_code'),
				'address' => Input::get('address'),
				'city' => Input::get('city'),
				'cap' => Input::get('cap'),
				'state' => Input::get('state'),
				'country' => Input::get('country'),
				'language' => Input::get('language'),
				'password' => Input::get('password'),
				'password_confirmation' =>   Input::get('confirm')
				
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
				//'company_code' => Input::get('company_code'),
				'fax' => Input::get('fax'),
				'web' => Input::get('web'),
				'reference' => Input::get('reference'),
				'phone_reference' => Input::get('phone_reference'),
				'email_reference' => Input::get('email_reference'),
				'language' => Input::get('language'),
				
				);

			$userForValidation = new User;
			$customerForValidation = new Customer;

			if( $userForValidation->validaRegistrazioneProfileAdv($userdata) == false)
			{
				return Redirect::action('RegController@advSubscription_step2' )->withInput()->withErrors($userForValidation->errors());
			}
			else
			{
				if( $customerForValidation->validaReg($customerdata) == false)
				{
					return Redirect::action('RegController@advSubscription_step2' )->withInput()->withErrors($customerForValidation->errors());
				}
				else
				{
					$passwordTemp = str_random(8);
					$user = User::find($id);

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
					$user->language = $userdata['language'];
					$user->city = $userdata['city'];
					$user->cap = $userdata['cap'];
					$user->state = $userdata['state'];
					$user->country = $userdata['country'];
					$user->password = Hash::make($userdata['password']);
					$initial_code = $user->access_code;
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
								'company_description' => Input::get('company_description'),
								'language' => Input::get('language'),
								//'company_code' => Input::get('company_code'),
								'fax' => Input::get('fax'),
								'web' => Input::get('web'),
								'reference' => Input::get('reference'),
								'phone_reference' => Input::get('phone_reference'),
								'email_reference' => Input::get('email_reference'),
								
							));

					 	$campaign = new Campaign;
						//Base infos
						$campaign->description = 'Your campaign';
						$campaign->analitycs_code = '';
						
						$campaign->community_id = InitialCode::getCommunityID($initial_code);
						$campaign->short_code = strtoupper(str_random(Campaign::getcode_char_lenght()));
						$campaign->user_created = $id;
						$campaign->complete = 0;
						$campaign->ready = 0;
						$campaign->active = 0;
						$campaign->deleted = 0;
						$campaign->save();



						$data['password'] = $passwordTemp;

						$maildata = array(
								'email'  =>  $userdata['email'],
								'password' =>  $passwordTemp
								);


					Mail::send('emails.registration', $maildata, function($message)
						{
						    $message->to(Input::get('email'), '')
						    ->subject(Lang::get('emails.subject_reg'));
						});

					$this->layout->content = View::make('reg.success', $data);
				}
		}
	}
 

	public function reg_promoter_process()
	{
		
		$userdata = array(
			'initial_code'  => Input::get('initial_code'),
			'email'  => Input::get('email')
			
			);

		$userForValidation = new User;

		if( $userForValidation->validaRegistrazione($userdata) == false)
		{
			return Redirect::action('RegController@prSubscription' )->withInput()->withErrors($userForValidation->errors());
		}else
		{
			if ($this->checkCode($userdata['initial_code']))
			{
				if ($this->checkMail($userdata['email']))
				{
					//formal check ok

					//generatePassword 

					 $passwordTemp = str_random(8);

					//create user
					DB::table('users')->insert(
						array('email' => $userdata['email'],
							'username' => $userdata['email'],
							'password' => Hash::make($passwordTemp),
							'role' => 2,
							'access_code' => $userdata['initial_code'],
							'created_at' => date('Y-m-d H:i:m'),
							'deleted' => false,
							'active' => true,
							'type_external_login' => 1 
							));

					$inserted_user = DB::getPdo()->lastInsertId();


					$message = Lang::get('notification.registration', array( 'data' => date('d/m/Y H:i:s')));
					$type = 'info';
					User::setEvents($inserted_user, $message, $type);

					//mark code as used
					DB::table('initial_code')
					            ->where('code', $userdata['initial_code'])
					            ->update(array('used' => true, 
					            				'used_by_user_id'=> $inserted_user ));

					
/*
					    $maildata = array(
						'password'  => $passwordTemp,
						'email'  => Input::get('email')
						
						);

					    $messages = 'mail.registration';
					    $to = Input::get('email');
					    $name_to = '';
					    $subject = Lang::get('email.subject');
					    Mailer::SendRegMail($to , $name_to, $subject, $messages, $maildata);

*/
					User::short_login_process($userdata['email'], $passwordTemp);

					//redirect 
					return Redirect::to('prSubscription_step2');
				}
				else
				{
					return Redirect::to('prSubscription?mail');	
				}
			}
			else
			{		   	
				return Redirect::to('prSubscription?code');
			}
		}
	}

	public function reg_adv_process()
	{
 
		$userdata = array(
			'initial_code'  => Input::get('initial_code'),
			'email'  => Input::get('email')
			
			);

		$userForValidation = new User;

		if( $userForValidation->validaRegistrazione($userdata) == false)
		{
			return Redirect::action('HomeController@login' )->withInput()->withErrors($userForValidation->errors());
		}
		else
		{

			if ($this->checkCode($userdata['initial_code']))
			{
				if ($this->checkMail($userdata['email']))
				{
					//formal check ok

					//generatePassword 

					$passwordTemp = str_random(8);

					//create user
					DB::table('users')->insert(
						array('email' => $userdata['email'],
							'username' => $userdata['email'],
							'password' => Hash::make($passwordTemp),
							'role' => 3,
							'access_code' => $userdata['initial_code'],
							'created_at' => date('Y-m-d H:i:m'),
							'deleted' => false,
							'active' => true,
							'type_external_login' => 1 
							));

					$inserted_user = DB::getPdo()->lastInsertId();

					$message = Lang::get('notification.registration', array( 'data' => date('m/d/Y H:i:s')));
					$type = 'info';
					User::setEvents($inserted_user, $message, $type);

					$initial_code = DB::table('initial_code')
									->where('code', $userdata['initial_code'])->first();

					DB::table('customers')->insert(
						array(
							'user_id' => $inserted_user,
							'access_code' => $userdata['initial_code'],
							'license_id' =>  $initial_code->license_id,
							'community_id' =>  $initial_code->community_id,
							'promoter_id' =>  $initial_code->promoter_id,
							'email' => $userdata['email'],
							'created_at' => date('Y-m-d H:i:m'),
							'deleted' => false,
							'active' => true
							));

					//mark code as used
					DB::table('initial_code')
					            ->where('code', $userdata['initial_code'])
					            ->update(array('used' => true, 
					            				'used_by_user_id'=> $inserted_user,
					            				'used_at'  => date('Y-m-d H:i:m') ));

					/*
					$maildata = array(
						'password'  => $passwordTemp,
						'email'  => Input::get('email')
						
						);
						Mail::send('emails.registration', $maildata, function($message)
						{
						    $message->to(Input::get('email'), '')
						    ->subject(Lang::get('emails.subject_reg'));
						});
					*/

					User::short_login_process($userdata['email'], $passwordTemp);

					//redirect 
					return Redirect::to('advSubscription_step2');

				}
				else
				{	
					return Redirect::to('advSubscription?mail');	
				}

			}
			else
			{  	
				return Redirect::to('advSubscription?code');
			}
		}
	}


	public function reg_offer_process()
	{
 
		$userdata = array(
			'name'  => Input::get('name'),
			'surname'  => Input::get('surname'),
			'email'  => Input::get('email'),
			'phone' => Input::get('phone'),
			'other' => Input::get('other'),
			'offer_id'  => Input::get('offer_id')
			
			);

		$userForValidation = new User;

		if( $userForValidation->validaRegistrazioneUser($userdata) == false)
		{

			return Redirect::action('OverviewController@qccID' , $userdata['offer_id'])->withInput()->withErrors($userForValidation->errors());
		}
		else
		{

					
					DB::table('users_communities')->insert(
						array('email' => $userdata['email'],
							'name' => $userdata['name'],
							'surname' => $userdata['surname'],
							'phone' => $userdata['phone'],
							'other' => $userdata['other'],
							'typereg' => 2,
							'offer_id' => $userdata['offer_id'],
							'created_at' => date('Y-m-d H:i:s')));

					$inserted_user = DB::getPdo()->lastInsertId();

					$sendmail = Offer::where('id', $userdata['offer_id'])->pluck('b_send2');


					if ($sendmail)
					{
						$maildata = array(
								'email'  =>  $userdata['email'],
								'name' => $userdata['name'],
								'surname' => $userdata['surname'],
								'phone' => $userdata['phone'],
								'other' => $userdata['other'],
								);


							Mail::send('emails.registrationuser', $maildata, function($message)
								{
								    $message->to(Input::get('email'), '')
								    ->subject(Lang::get('emails.usubject_reg'));
								});

					}



					//redirect 
					return Redirect::to('qccID/'.Input::get('offer_id').'?registered='.$inserted_user
						.'&name='.Input::get('name')
						.'&surname='.Input::get('surname')
						);

				
		}
	}


	public function sub_offer_process()
	{
 
		$userdata = array(
			'name'  => Input::get('name'),
			'surname'  => Input::get('surname'),
			'email'  => Input::get('email'),
			'phone' => Input::get('phone'),
			'other' => Input::get('other'),
			'offer_id'  => Input::get('offer_id')
			
			);

		$userForValidation = new User;

		if( $userForValidation->validaRegistrazioneUser($userdata) == false)
		{

			return Redirect::action('OverviewController@qccID' , $userdata['offer_id'])->withInput()->withErrors($userForValidation->errors());
		}
		else
		{

					
					DB::table('users_communities')->insert(
						array('email' => $userdata['email'],
							'name' => $userdata['name'],
							'surname' => $userdata['surname'],
							'phone' => $userdata['phone'],
							'other' => $userdata['other'],
							'typereg' => 1,
							'offer_id' => $userdata['offer_id'],
							'created_at' => date('Y-m-d H:i:s') 

							)
						);

					$inserted_user = DB::getPdo()->lastInsertId();

					

					//redirect 
					return Redirect::to('qccID/'.Input::get('offer_id').'?subscribed='.$inserted_user
						.'&name='.Input::get('name')
						.'&surname='.Input::get('surname')
						);

				
		}
	}

	public function sub_offer_process41()
	{
 
		$userdata = array(
			'name'  => Input::get('name'),
			'surname'  => Input::get('surname'),
			'email'  => Input::get('email'),
			'phone' => Input::get('phone'),
			'other' => Input::get('other'),
			'offer_id'  => Input::get('offer_id')
			
			);

		$userForValidation = new User;

		if( $userForValidation->validaRegistrazioneUser($userdata) == false)
		{

			return Redirect::action('OverviewController@qccID' , $userdata['offer_id'])->withInput()->withErrors($userForValidation->errors());
		}
		else
		{

					
					DB::table('users_communities')->insert(
						array('email' => $userdata['email'],
							'name' => $userdata['name'],
							'surname' => $userdata['surname'],
							'phone' => $userdata['phone'],
							'other' => $userdata['other'],
							'typereg' => 1,
							'offer_id' => $userdata['offer_id'],
							'created_at' => date('Y-m-d H:i:s') 

							)
						);

					$inserted_user = DB::getPdo()->lastInsertId();

					

					//redirect 
					return Redirect::to('qccID/'.Input::get('offer_id').'/thankyou?subscribed='.$inserted_user
						.'&name='.Input::get('name')
						.'&surname='.Input::get('surname')
						);

				
		}
	}



	protected function checkCode($code)
	{

		$records = DB::table('initial_code')
				            ->where('code', $code)->first();

			if ( $records) {
					if($records->active && !$records->used && !$records->deleted)
						return true;
					else
						return true;
				} else
				{
					return false;
				}
	}

	protected function checkMail($mail)
	{
		return true;
	}





}