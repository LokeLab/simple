<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Activates the softDelete method on the model
	 */
	protected $softDelete = true;

	/**
	 * The errors used by the view
	 *
	 * @var array
	 */
	private $errors;

	/**
	 * The validation rules used by the model
	 *
	 * @var array
	 */
	public $rules = array(
        'email' => 'required|email',
        'name' => 'required',
        'initial_code'  => 'required'
    );

    /**
	 * The validation rules used by the model for the login
	 *
	 * @var array
	 */
	public $rulesLogin = array(
        'username' => 'required|email',
        'password' => 'required'
    );
    
	/**
	 * The validation rules used by the registration model
	 *
	 * @var array
	 */
 	private $regrules = array( 'initial_code'  => 'required|exists:initial_code,code,used,0'
 		, 'email'  => 'required|email|unique:users,email,deleted,0' );

	/**
	 * The validation rules used by the registration view
	 *
	 * @var array
	 */
 	private $regrulesProfile = array( 
 		'email'  => 'required|email' ,
 		'name'  => 'required' ,
 		'surname'  => 'required',
 		'phone'  => 'required|numeric',
 		'address'  => 'required',
 		'city'  => 'required',
 		'cap'  => 'required',
 		'state'  => 'required',
 		'country'  => 'required',
 		);

	/**
	 * The validation rules used by the registration view
	 *
	 * @var array
	 */
 	private $regrulesProfileAdv = array( 
 		'email'  => 'required|email' ,
 		'company' => 'required',
 		'phone'  => 'required|numeric',
 		'address'  => 'required',
 		'city'  => 'required',
 		'cap'  => 'required',
 		'state'  => 'required',
 		'phone'  => 'required|numeric',
 		'country'  => 'required',
 		'language' => 'required',
 		'password' => 'required|confirmed'
 		
 		);

	/**
	 * The validation rules used by the edit view
	 *
	 * @var array
	 */
	private $rulesEditProfile = array( 
 		'name'  => 'required' ,
 		'surname'  => 'required',
 		'phone'  => 'required|numeric',
 		'address'  => 'required',
 		'city'  => 'required',
 		'cap'  => 'required',
 		'state'  => 'required',
 		'country'  => 'required',
 		'password' => 'confirmed'
 		);

	/**
	 * The validation rules used by the admin to add a user
	 *
	 * @var array
	 */
 	private $regrulesAddUser = array( 
 		'email'  => 'required|email' ,
 		'password'  => 'required' ,
 		'name'  => 'required' ,
 		'surname'  => 'required',
 		'company' => 'required'
 		);

 	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaLogin($data)
 	{
 		$v = Validator::make($data, $this->rulesLogin);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaAddUser($data)
 	{
 		$v = Validator::make($data, $this->regrulesAddUser);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

 	/**
	 * The validation rules used by the admin to add a user
	 *
	 * @var array
	 */
 	private $regrulesModifyUser = array( 
 		'email'  => 'required|email' ,
 		'name'  => 'required' ,
 		'surname'  => 'required',
 		'company' => 'required',
 		'password' => 'confirmed'
 		);

 	private $regrulesUserOffer = array( 
 		'email'  => 'required|email' ,
 		'name'  => 'required' ,
 		'surname'  => 'required',
 		'offer_id' => 'required'
 		);

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaModifyUser($data)
 	{
 		$v = Validator::make($data, $this->regrulesModifyUser);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaRegistrazione($data)
 	{
 		$v = Validator::make($data, $this->regrules);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

 	public function validaRegistrazioneUser($data)
 	{
 		$v = Validator::make($data, $this->regrulesUserOffer);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{


 			$tmp = $data['email'];
	 			$user = DB::table('users_communities')->where('email', $tmp)->where('offer_id', $data['offer_id'])->first();
	 			if ( $user )
	 			{

	 				if ($user->name !=  $data['name'] || $user->surname !=  $data['surname'] )
	 				// nessuna community
	 				{
	 					$errorCustom = array();
		 				$errorCustom['email'] = Array( Lang::get('users.email_reg') );
		 				$this->errors = $errorCustom;
	 				
	 					return false;
	 				} else
	 				{
	 					return true;
	 				}
	 			}
	 			else 
	 				return true;
			
 		}
 	}

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaRegistrazioneProfile($data)
 	{
 		$v = Validator::make($data, $this->regrulesProfile);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaEditProfile($data)
 	{
 		$v = Validator::make($data, $this->rulesEditProfile);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}

	/**
	 * The fuction that validates
	 *
	 * @return boolean
	 */
 	public function validaRegistrazioneProfileAdv($data)
 	{
 		$v = Validator::make($data, $this->regrulesProfileAdv);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
			return true;
 		}
 	}
     
     /**
      * The validation rules used by the admin to add a user
      *
      * @var array
      */
 	private $rulesSendTicket = array( 
        'dest'  => 'required' ,
 		'subject'  => 'required' ,
 		'message'  => 'required' 
 		);

 	/**
      * The fuction that validates
      *
      * @return boolean
      */
 	public function validaSendTicket($data)
 	{
 		$v = Validator::make($data, $this->rulesSendTicket);

 		if ($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}else
 		{
             return true;
 		}
 	}

	/**
	 * Returns the errors produced by the validatin
	 *
	 * @return array
	 */
 	public function errors()
 	{
 		return $this->errors;
 	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Auth the user
	 *
	 * @return array
	 */
	public static function short_login_process($username, $password)
	{
 
		$userdata = array(
			'username'  => $username,
			'password' =>  ($password),
			'active' => 1,
			'deleted'=>0
			);
		
		
		if( Auth::attempt($userdata) ){
			$user = User::where ( 'username', '=', $userdata['username'])->first();

 			$mysqldate = date('Y-m-d H:i:s'); 
 			$user->lastlogin_at = date('Y-m-d H:i:s'); 
 			
			$user->save();

 			Session::put('username', $userdata['username']);
			Session::put('userrole', $user['role']);
			Session::put('userid', $user['id']);

				
		}
	}

	
	/**
	 * Returns all the items not deleted
	 *
	 * @return array
	 */
	public static function getAll()
	{
		return User::all();
	}

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllAcive()
	{
		return User::whereActive(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllInacive()
	{
		return User::whereActive(0)->get();
	}

	/**
	 * Returns all the items deleted
	 *
	 * @return array
	 */
	public static function getAllDeleted()
	{
		return User::onlyTrashed()->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return User::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{
		$result = User::find($id);

		if ( strlen($result['surname']) > 0)  
			return $result['surname'].' '.$result['name']. '<br>'.$result['username'] ;
		else
			return $result['username'] ;
	}



	/**
	 * Get the nuber of offerts associated to the community.
	 *
	 * @return boolean
	 */
	public static function getUserName($id)
	{
		$result = User::whereId($id)->first();
		return $result['surname'].' '.$result['name'];
	}

	/**
	 * Returns ...
	 *
	 * @return array
	 */
	public static function getConf()
	{
		//
	}

	/**
	 * Get the nuber of users associated to the role.
	 *
	 * @return boolean
	 */
	public static function getNumberofUsersInRole($role_id)
	{
		//$users = User::whereRole($role_id)->get();
		
		return User::whereRole($role_id)->count();

		
	}

	public static function getCommunityforUser($id)
	{
		//$users = User::whereRole($role_id)->get();
		$commList = DB::table('users_communities')->where('user_id', $id)->get(array('community_id'));
		$acomm = array();
		if (!count($commList))
		{

			$commList = DB::table('communities')->get(array('id'));

			$i=0;
			foreach ($commList as $element)
			{
				$acomm[$i] = $element->id;
				
				$i++;
			}
		} else
		{
			$i=0;
			foreach ($commList as $element)
			{
				$acomm[$i] = $element->community_id;
				
				$i++;
			}


		}

		
		
	
		
		return $acomm;

		
	}
        
	/**
	 * Returns all the items not deleted
	 *
	 * @return array
	 */
	public static function getAllEvents($id)
	{
		return DB::table('users_event')->where('user_id', $id)->orderby('created_at', 'desc')->take(5)->get();
	}

	public static function setEvents($id_user, $message, $type)
	{
		return DB::table('users_event')->insert(
				array(
					'user_id' => $id_user,
					'message' => $message,
					'type' => $type,
					'created_at' => date('Y-m-d H:i:s')
				));
	}


	/**
	 * Sets the date to the last_pwd_change_request_at field
	 *
	 * @return array
	 */
	public static function setPasswordChangeRequest($credentials)
	{
		$email = $credentials['email'];
		$response = Password::remind($credentials, function($message)
					{
					    $message->subject(Lang::get('reminders.email_subject'));
					});
		if($response != Password::INVALID_USER)
		{
			$user = User::where ( 'username', '=', $email)->first();
				
			$user->last_pwd_change_request_at = date('Y-m-d H:i:s'); 
				
			$user->save();
		}
		return $response;
	}

	/**
	 * Sets the date to the last_pwd_changed_at field
	 *
	 * @return array
	 */
	public static function resetPassword($credentials)
	{


	$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->last_pwd_changed_at = date('Y-m-d H:i:s'); 
			$user->save();

			

		});
		    
		return $response;
	}

	public static function getNumberAdvRelated($id)
	{
		return Customer::wherePromoterId($id)->count();

	}



	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	

}