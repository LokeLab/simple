<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Partner extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'partner';

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
	public static function getAll()
	{
		return Partner::all();
	}

	public static function listWithBudget()
	{
		return DB::table('partner_view')->get();
	}

	public static function getList()
	{
		return Partner::lists('description','id');
	}

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllUpdated()
	{
		return Partner::whereUpdate(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllNotUpdated()
	{
		return Partner::whereUpdate(0)->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return Partner::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{
		return Partner::find($id)->description;
	}

	public static function getLabelShort($id)
	{
		return Partner::find($id)->short;
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
	 * Get if IsAdministrable Partner.
	 *
	 * @return boolean
	 */
	public static function isAdministrable($Partner_id)
	{
		   	return $Partner_id != 6 ? TRUE : FALSE;
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
			if (Session::has('Partner_admin'))
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
			if (Session::has('Partner_advertiser'))
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
			if (Session::has('Partner_tecnico'))
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
			if (Session::has('Partner_promoter'))
				return true;
			else 
				return false;
		} 
		else
		   	return false;
	}*/

	/*
	 * Get true if it is an admin Partner
	 *
	 * @return boolean
	 */
	public static function isAdministrator($userId)
	{
		$userPartner = User::getById($userId)->Partner;
		return ($userPartner == 1) ? TRUE : FALSE;
	}

	/**
	 * Get true if it is an promoter Partner
	 *
	 * @return boolean
	 */
	public static function isPromoter($userId)
	 {
	 	$userPartner = User::getById($userId)->Partner;
	 	return ($userPartner == 2) ? TRUE : FALSE;
	 }

	/**
	 * Get true if it is an advertiser Partner
	 *
	 * @return boolean
	 */
	public static function isAdvertiser($userId)
	{
		$userPartner = User::getById($userId)->Partner;
		return ($userPartner == 3) ? TRUE : FALSE;
	}

	/**
	 * Get true if it is an advertiser Partner
	 *
	 * @return boolean
	 */
	public static function isTecnico($userId)
	{
		$userPartner = User::getById($userId)->Partner;
		return ($userPartner == 4) ? TRUE : FALSE;
	}

public static function getBudget($id)
	{
		$userPartner = Partner::whereId($id)->pluck('budget');
		return $userPartner;
	}

public static function getSpent($id)
	{
		$userPartner = VisitBase::wherePartner($id)->sum('amountspent') ;
		return $userPartner;
	}



}