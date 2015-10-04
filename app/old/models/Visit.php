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
        //'data_nascita' => 'required',
        'targa' => 'required',
        //'km' => 'required',
        
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
			
 			$tmp = $data['targa'];
 			
 			$user = DB::table('visit')->where('targa', $tmp)->where('active', 1)->first();
 			if ( $user )
 			{
 				

					$errorCustom['targa'] = Array( 'Targa già utilizzata' );
 				$this->errors = $errorCustom;
				
				return false;
			} else
			{
				
				return true;
			}
	 			


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
		return Visit::all();
	}

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllUpdated()
	{
		return Visit::whereUpdate(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllNotUpdated()
	{
		return Visit::whereUpdate(0)->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return Visit::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{
		return Visit::find($id)->description;
	}

	public static function getSlot($id)
	{
		return Visit::where('orario',$id)->where('giorno',date('d'))->count();
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


	
	
	
	public static function getTypeLabel($id)
	{
		switch ($id) {
		case '1':
			return 'Unipol';
			break;
		case '2':
			return 'Fondiaria SAI';
			break;
		case '3':
			return 'Milano assicurazioni';
			break;
		
		default:
			return '';
			break;
	}
		
	}

	

	public static function getFilter($filter, $code,$local,$name)

	{
		$raw = ' 1=1 ';

		if ($filter == 1 || $filter == 2 || $filter == 3)
		{
			$raw = $raw . ' and  typevisit = '.$filter;
		} 

		if (is_numeric( $code))
		{
			$raw = $raw . ' and  id = '.$code;
		} 

		if ( $local)
		{
			$raw = $raw . ' and  local like \'%'.str_replace('\'', '\\\'', $local) .'%\'';
		} 

		if ( $name)
		{
			$raw = $raw . ' and  (name like \'%'.str_replace('\'', '\\\'', $name) .'%\' or surname like \'%'.str_replace('\'', '\\\'', $name) .'%\') ';
		} 


		return $raw;
	}

	



}