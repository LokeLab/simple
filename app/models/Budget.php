<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Budget extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'budget';

	/**
	 * Sets the timestamp method on the model
	 */
	public $timestamps = false;

	/**
	 * Sets the softDelete method on the model
	 */
	protected $softDelete = false;

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
        'description' => 'required'
    );

	/**
	 * The fuction that validates the model
	 *
	 * @return boolean
	 */
	public function valida($data)
 	{
 		$v = Validator::make($data, $this->rules);

 		if($v->fails())
 		{
 			$this->errors = $v->messages();
 			return false;
 		}
 		else
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
	 * Returns all the items not deleted
	 *
	 * @return array
	 */
	public static function getAllbyPartner($id)
	{
		return CostBase::where('partner',$id)->orderBy('id', 'asc')->get();
	}

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllUpdated()
	{
		return Budget::whereUpdate(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllNotUpdated()
	{
		return Budget::whereUpdate(0)->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return Budget::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{

		$tmp = Budget::find($id);

		if ($tmp)
				return $tmp->description;
		else
			 	return '';
	}
public static function getTypeCost($id)
	{

		$tmp = Budget::find($id);

		if ($tmp)
				return $tmp->kind;
		else
			 	return '';
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
	 * Get if IsAdministrable role.
	 *
	 * @return boolean
	 */
	public static function isAdministrable($role_id)
	{
		   	return $role_id != 6 ? TRUE : FALSE;
	}

	/**
	 * Get if IsAdmin
	 *
	 * @return boolean
	 */
	public static function isAdmin()
	{
		
		if (Session::has('userid'))
		{
			if (Session::has('role_admin'))
				return true;
			else 
				return false;
		} 
		else
		   	return false;
	}

	/**
	 * Get if IsAdmin
	 *
	 * @return boolean
	 */
	public static function isAdv()
	{
		
		if (Session::has('userid'))
		{
			if (Session::has('role_advertiser'))
				return true;
			else 
				return false;
		} 
		else
		   	return false;
	}

	/**
	 * Get if IsAdmin
	 *
	 * @return boolean
	 */
	public static function isTech()
	{
		
		if (Session::has('userid'))
		{
			if (Session::has('role_tecnico'))
				return true;
			else 
				return false;
		} 
		else
		   	return false;
	}

	/**
	 * Get if IsAdmin
	 *
	 * @return boolean
	 */
	/*public static function isPromoter()
	{
		
		if (Session::has('userid'))
		{
			if (Session::has('role_promoter'))
				return true;
			else 
				return false;
		} 
		else
		   	return false;
	}*/

	/*
	 * Get true if it is an admin role
	 *
	 * @return boolean
	 */
	public static function isAdministrator($userId)
	{
		$userRole = User::getById($userId)->role;
		return ($userRole == 1) ? TRUE : FALSE;
	}

	/**
	 * Get true if it is an promoter role
	 *
	 * @return boolean
	 */
	public static function isPromoter($userId)
	 {
	 	$userRole = User::getById($userId)->role;
	 	return ($userRole == 2) ? TRUE : FALSE;
	 }

	/**
	 * Get true if it is an advertiser role
	 *
	 * @return boolean
	 */
	public static function isAdvertiser($userId)
	{
		$userRole = User::getById($userId)->role;
		return ($userRole == 3) ? TRUE : FALSE;
	}

	/**
	 * Get true if it is an advertiser role
	 *
	 * @return boolean
	 */
	public static function isTecnico($userId)
	{
		$userRole = User::getById($userId)->role;
		return ($userRole == 4) ? TRUE : FALSE;
	}


	public static function getIco($type)
	{
		switch ($type) {
			case 1:
				return 'briefcase';
				break;
			case 2:
				return 'shopping-cart';
				break;
			case 3:
				return 'flagt';
				break;
			case 4:
				return 'hotel';
				break;
			case 5:
				return 'plane';
				break;
			case 6:
				return 'cutlery';
				break;
			
			default:
				return 'money';
				break;
		}
		 
	}



}