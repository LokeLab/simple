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
		return Visit::all();
	}

    public static function last($id)
    {
        return DB::table('view_visit')->orderby('id', 'desc')->take($id)->get();
    }

     public static function lastPartner($id,$number)
    {
        return Visit::wherePartner($id)->orderby('id', 'desc')->take($number)->get();
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
		//developer
		if ($role == 2 && $type== 1) $target = '1';
		if ($role == 2 && $type== 3) $target = '3';
		//angel 20
		if ($role == 3 && $type== 1) $target = '1';
		if ($role == 3 && $type== 3) $target = '3';
		//angel av 
		if ($role == 4 && $type== 2) $target = '2';
		if ($role == 4 && $type== 1) $target = '1';
		
		// angel PN 
		if ($role == 5 && $type== 1) $target = '1';
		if ($role == 5 && $type== 2) $target = '2';
		if ($role == 5 && $type== 3) $target = '3';

		

		if ($target == '') 
			return '/visit';
		else
			return '/visit'.$target.'/add/'.$id;



	}

	public static function getIncludeVisit($role, $type)
	{



		$target = '';
		if ($role == 2 && $type== 1) $target = '1';
		if ($role == 3 && $type== 1) $target = '1';
		if ($role == 4 && $type== 1) $target = '1';
		if ($role == 5 && $type== 1) $target = '1';

		if ($role == 4 && $type== 2) $target = '2';
		if ($role == 5 && $type== 2) $target = '2';

		if ($role == 2 && $type== 3) $target = '3';
		if ($role == 3 && $type== 3) $target = '3';
		if ($role == 5 && $type== 3) $target = '3';

		if ($target == '') 
			return 'visit.view1';
		else
			return 'visit.view'.$target;



	}

    public static function getEditIncludeVisit($role, $type)
    {



        $target = '';
        if ($role == 2 && $type== 1) $target = '1';
        if ($role == 3 && $type== 1) $target = '1';
        if ($role == 4 && $type== 1) $target = '1';
        if ($role == 5 && $type== 1) $target = '1';

        if ($role == 4 && $type== 2) $target = '2';
        if ($role == 5 && $type== 2) $target = '2';

        if ($role == 2 && $type== 3) $target = '3';
        if ($role == 3 && $type== 3) $target = '3';
        if ($role == 5 && $type== 3) $target = '3';

        if ($target == '') 
            return 'visit.edit1';
        else
            return 'visit.edit'.$target;



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