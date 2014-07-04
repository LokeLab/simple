<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Visit extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visit';

	/**
	 * Sets the timestamp method on the model
	 */
	public $timestamps = false;

	/**
	 * Sets the softDelete method on the model
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
        'visit_at' => 'required'
    );
	public $rulesstep1 = array(
        'id' => 'required'
    );
	public $rulesstep2 = array(
        'id' => 'required'
    );
    public $rulesstep3 = array(
        'id' => 'required'
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
	public function validastep1($data)
 	{
 		$v = Validator::make($data, $this->rulesstep1);

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
 	public function validastep2($data)
 	{
 		$v = Validator::make($data, $this->rulesstep2);

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
 	public function validastep3($data)
 	{
 		$v = Validator::make($data, $this->rulesstep3);

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
		return Role::all();
	}

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllUpdated()
	{
		return Role::whereUpdate(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllNotUpdated()
	{
		return Role::whereUpdate(0)->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return Role::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{
		return Role::find($id)->description;
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


	
	
	public static function getTypeList()
	{
		switch (Auth::user()->role) {
			case 1:
			case 5:
				$response = DB::table('typevisit')->lists('description','id');
				break;

			case 2:
			case 3:
				$response = DB::table('typevisit')->whereRaw('id <> ?', array('2'))->lists('description','id');
				break;
			case 4:
			
				$response = DB::table('typevisit')->whereRaw('id <> ?', array('3'))->lists('description','id');
				break;
			
			default:
				$response = array();
				break;
		}
		

			



		return $response ;
	}

	public static function getTypeLabel($id)
	{
		switch ($id) {
		case '1':
			return 'Advocacy';
			break;
		case '2':
			return 'Consumer';
			break;
		case '3':
			return 'Autogestito';
			break;
		
		default:
			return '';
			break;
	}
		
	}

	public static function selectRedirect($role, $type, $id)
	{



		$target = '';
		if ($role == 1 && $type== 1) $target = '1';
		if ($role == 2 && $type== 1) $target = '1';
		if ($role == 3 && $type== 1) $target = '2';
		if ($role == 4 && $type== 1) $target = '2';

		if ($role == 3 && $type== 2) $target = '3';
		if ($role == 4 && $type== 2) $target = '3';

		if ($role == 1 && $type== 3) $target = '3';
		if ($role == 2 && $type== 3) $target = '3';
		if ($role == 4 && $type== 3) $target = '3';

		if ($target == '') 
			return '/visit';
		else
			return '/visit'.$target.'/add/'.$id;



	}

	



}