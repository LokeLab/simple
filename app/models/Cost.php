<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cost extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cost';

	
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
        'd_document' => 'required',
        
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
		return Cost::all();
	}

    public static function last($id)
    {
        return DB::table('view_cost')->orderby('id', 'desc')->take($id)->get();
    }

     public static function lastPartner($id,$number)
    {
        return Cost::wherePartner($id)->orderby('id', 'desc')->take($number)->get();
    }

	/**
	 * Returns all the items not deleted and activated
	 *
	 * @return array
	 */
	public static function getAllUpdated()
	{
		return Cost::whereUpdate(1)->get();
	}

	/**
	 * Returns all the items not deleted and not activated
	 *
	 * @return array
	 */
	public static function getAllNotUpdated()
	{
		return Cost::whereUpdate(0)->get();
	}

	/**
	 * Returns the model object of a given row
	 *
	 * @return model
	 */
	public static function getById($id)
	{
		return Cost::whereId($id)->first();
	}

	/**
	 * Returns the description field of a given model
	 *
	 * @return string
	 */
	public static function getLabel($id)
	{
		return Cost::find($id)->description;
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





	public static function getFilter($arr_filter)

	{

		$raw = ' 1=1 ';
		
		if ($arr_filter['partner'] != '')
		{
			$raw = $raw . ' and  partner = '.$arr_filter['partner'];
		} 

		if (is_numeric( $arr_filter['code']))
		{
			$raw = $raw . ' and  id = '.$arr_filter['code'];
		} 

		if ( $arr_filter['budgetrow'])
		{
			$raw = $raw . ' and  budgetrow like \'%'
			.str_replace('\'', '\\\'', $arr_filter['budgetrow']) .'%\'';
		} 

		if ( $arr_filter['activity'])
		{
			$raw = $raw . ' and  (activity like \'%'.str_replace('\'', '\\\'', $arr_filter['activity'] ).'%\' ) ';
		} 

		if ( $arr_filter['notpayed']==1)
		{
			$raw = $raw . ' and  (payedby=4 ) ';
		} 

		if ( $arr_filter['withproblem']==1)
		{

			$raw = $raw . ' and  (rejected=1 and verified=0 and active=0 ) ';
		} 

		if ( $arr_filter['checked']==1)
		{
			$raw = $raw . ' and  (verified=1 ) ';
		} 

		
			Session::put('filter', $arr_filter);

		return $raw;
	}


    public static function getFilterSospese($arr_filter)

    {

    	$raw = ' 1=1 ';
		
		if ($arr_filter['partner'] != '')
		{
			$raw = $raw . ' and  partner = '.$arr_filter['partner'];
		} 

		if (is_numeric( $arr_filter['code']))
		{
			$raw = $raw . ' and  id = '.$arr_filter['code'];
		} 

		if ( $arr_filter['budgetrow'])
		{
			$raw = $raw . ' and  budgetrow like \'%'
			.str_replace('\'', '\\\'', $arr_filter['budgetrow']) .'%\'';
		} 

		if ( $arr_filter['activity'])
		{
			$raw = $raw . ' and  (activity like \'%'.str_replace('\'', '\\\'', $arr_filter['activity'] ).'%\' ) ';
		} 

		if ( $arr_filter['notpayed']==1)
		{
			$raw = $raw . ' and  (payedby=4 ) ';
		} 

		if ( $arr_filter['withproblem']==1)
		{

			$raw = $raw . ' and  (rejected=1 and verified=0 and active=0 ) ';
		} 

		if ( $arr_filter['checked']==1)
		{
			$raw = $raw . ' and  (verified=1 ) ';
		} 
		
		Session::put('filterCheck', $arr_filter);
		

        return $raw;
    }

	


  
   


}