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
        'visit_at' => 'required',
        'city' => 'required',
        'address' => 'required',
        'local' => 'required',
        'furniture' => 'required',
        'aperitif_auto' => 'required',
        'advocacy' => 'required',
        'typevisit' => 'required',
        's_consumer' => 'required',
        'first_visit' => 'required',
        'pot' => 'required',
        're' => 'required',
        'qsmr' => 'required',
        'qscc' => 'required',
    );
    public $rulesstep1 = array(
        'id' => 'required',
        'case_1' => 'required',
        'case_2' => 'required',
        'case_3' => 'required',
        'case_4' => 'required',
        'case_5' => 'required',
        'case_6' => 'required',
        'case_7' => 'required',
        'case_8' => 'required',
        'case_9' => 'required',
        'case_10' => 'required',
        'case_11' => 'required',
        'case_12' => 'required',
        'case_13' => 'required',
        'case_14' => 'required',
        'case_16' => 'required',
        'case_17' => 'required',
        'case_18' => 'required',
        'cons_12' => 'numeric',
        'cons_13' => 'numeric',
        'cons_14' => 'numeric',
        'cons_15' => 'numeric',
        'cons_16' => 'numeric',
        'cons_17' => 'numeric',
        'cons_18' => 'numeric',
        'cons_19' => 'numeric',
        'cons_20' => 'numeric',
        'mcons_12' => 'required_without:cons_12',
        'mcons_13' => 'required_without:cons_13',
        'mcons_14' => 'required_without:cons_14',
        'mcons_15' => 'required_without:cons_15',
        'mcons_16' => 'required_without:cons_16',
        'mcons_17' => 'required_without:cons_17',
        'mcons_18' => 'required_without:cons_18',
        'mcons_19' => 'required_without:cons_19',
        'mcons_20' => 'required_without:cons_20',
       

    );
	public $rulesstep1a = array(
        'id' => 'required',
        'case_1' => 'required',
        'case_2' => 'required',
        'case_3' => 'required',
        'case_4' => 'required',
        'case_5' => 'required',
        'case_6' => 'required',
        'case_7' => 'required',
        'case_8' => 'required',
        'case_9' => 'required',
        'case_10' => 'required',
        'case_11' => 'required',
        'case_12' => 'required',
        'case_13' => 'required',
        'case_14' => 'required',
        'case_16' => 'required',
        'case_17' => 'required',
        'case_18' => 'required',
        'cons_12' => 'numeric',
        'cons_13' => 'numeric',
        'cons_14' => 'numeric',
        'cons_15' => 'numeric',
        'cons_16' => 'numeric',
        'cons_17' => 'numeric',
        'cons_18' => 'numeric',
        'cons_19' => 'numeric',
        'cons_20' => 'numeric',
        'mcons_12' => 'required_without:cons_12',
        'mcons_13' => 'required_without:cons_13',
        'mcons_14' => 'required_without:cons_14',
        'mcons_15' => 'required_without:cons_15',
        'mcons_16' => 'required_without:cons_16',
        'mcons_17' => 'required_without:cons_17',
        'mcons_18' => 'required_without:cons_18',
        'mcons_19' => 'required_without:cons_19',
        'mcons_20' => 'required_without:cons_20',
        'nbarman' => 'numeric',

    );
	public $rulesstep2 = array(
        'id' => 'required',	
        'case_1' => 'required',
        'case_2' => 'required',
        'case_3' => 'required',
        'case_4' => 'required',
        'case_5' => 'required',
        'case_6' => 'required',
        'case_7' => 'required',
        'case_8' => 'required',
        'case_9' => 'required',
        'case_10' => 'required',
        'case_11' => 'required',
        'case_12' => 'required',
        'case_13' => 'required',
        'case_14' => 'required',
        'case_16' => 'required',
        'case_17' => 'required',
        'case_18' => 'required',
        'cons_1' => 'numeric',
        'cons_2' => 'numeric',
        'cons_3' => 'numeric',
        'cons_4' => 'numeric',
        'cons_5' => 'numeric',
        'cons_6' => 'numeric',
        'cons_7' => 'numeric',
        'cons_8' => 'numeric',
        'cons_9' => 'numeric',
        'cons_10' => 'numeric',
        'cons_11' => 'numeric',
        'cons_12' => 'numeric',
        'cons_13' => 'numeric',
        'cons_14' => 'numeric',
        'cons_15' => 'numeric',
        'cons_16' => 'numeric',
        'cons_17' => 'numeric',
        'cons_18' => 'numeric',
        'cons_19' => 'numeric',
        'cons_20' => 'numeric',
        'mcons_1' => 'required_without:cons_1',
        'mcons_2' => 'required_without:cons_2',
        'mcons_3' => 'required_without:cons_3',
        'mcons_4' => 'required_without:cons_4',
        'mcons_5' => 'required_without:cons_5',
        'mcons_6' => 'required_without:cons_6',
        'mcons_7' => 'required_without:cons_7',
        'mcons_8' => 'required_without:cons_8',
        'mcons_9' => 'required_without:cons_9',
        'mcons_10' => 'required_without:cons_10',
        'mcons_11' => 'required_without:cons_11',
        'mcons_12' => 'required_without:cons_12',
        'mcons_13' => 'required_without:cons_13',
        'mcons_14' => 'required_without:cons_14',
        'mcons_15' => 'required_without:cons_15',
        'mcons_16' => 'required_without:cons_16',
        'mcons_17' => 'required_without:cons_17',
        'mcons_18' => 'required_without:cons_18',
        'mcons_19' => 'required_without:cons_19',
        'mcons_20' => 'required_without:cons_20',

    );

public $rulesstep2a = array(
        'id' => 'required',	
        
        'cons_1' => 'numeric',
        'cons_2' => 'numeric',
        'cons_3' => 'numeric',
        'cons_4' => 'numeric',
        'cons_5' => 'numeric',
        'cons_6' => 'numeric',
        'cons_7' => 'numeric',
        'cons_8' => 'numeric',
        'cons_9' => 'numeric',
        'cons_10' => 'numeric',
        'cons_11' => 'numeric',
        
        'mcons_1' => 'required_without:cons_1',
        'mcons_2' => 'required_without:cons_2',
        'mcons_3' => 'required_without:cons_3',
        'mcons_4' => 'required_without:cons_4',
        'mcons_5' => 'required_without:cons_5',
        'mcons_6' => 'required_without:cons_6',
        'mcons_7' => 'required_without:cons_7',
        'mcons_8' => 'required_without:cons_8',
        'mcons_9' => 'required_without:cons_9',
        'mcons_10' => 'required_without:cons_10',
        'mcons_11' => 'required_without:cons_11',
        

    );
    public $rulesstep3 = array(
        'id' => 'required',
        
        'cons_1' => 'numeric',
        'cons_2' => 'numeric',
        'cons_3' => 'numeric',
        'cons_4' => 'numeric',
        'cons_5' => 'numeric',
        'cons_6' => 'numeric',
        'cons_7' => 'numeric',
        'cons_8' => 'numeric',
        'cons_9' => 'numeric',
        'cons_10' => 'numeric',
        'cons_11' => 'numeric',
        'cons_12' => 'numeric',
        'cons_13' => 'numeric',
        'cons_14' => 'numeric',
        'cons_15' => 'numeric',
        'cons_16' => 'numeric',
        'cons_17' => 'numeric',
        'cons_18' => 'numeric',
        'cons_19' => 'numeric',
        'cons_20' => 'numeric',
        'mcons_1' => 'required_without:cons_1',
        'mcons_2' => 'required_without:cons_2',
        'mcons_3' => 'required_without:cons_3',
        'mcons_4' => 'required_without:cons_4',
        'mcons_5' => 'required_without:cons_5',
        'mcons_6' => 'required_without:cons_6',
        'mcons_7' => 'required_without:cons_7',
        'mcons_8' => 'required_without:cons_8',
        'mcons_9' => 'required_without:cons_9',
        'mcons_10' => 'required_without:cons_10',
        'mcons_11' => 'required_without:cons_11',
        'mcons_12' => 'required_without:cons_12',
        'mcons_13' => 'required_without:cons_13',
        'mcons_14' => 'required_without:cons_14',
        'mcons_15' => 'required_without:cons_15',
        'mcons_16' => 'required_without:cons_16',
        'mcons_17' => 'required_without:cons_17',
        'mcons_18' => 'required_without:cons_18',
        'mcons_19' => 'required_without:cons_19',
        'mcons_20' => 'required_without:cons_20',
    );

 public $rulesstep3a = array(
        'id' => 'required',
        
        'cons_1' => 'numeric',
        'cons_2' => 'numeric',
        'cons_3' => 'numeric',
        'cons_4' => 'numeric',
        'cons_5' => 'numeric',
        'cons_6' => 'numeric',
        'cons_7' => 'numeric',
        'cons_8' => 'numeric',
        'cons_9' => 'numeric',
        'cons_10' => 'numeric',
        'cons_11' => 'numeric',
        
        'mcons_1' => 'required_without:cons_1',
        'mcons_2' => 'required_without:cons_2',
        'mcons_3' => 'required_without:cons_3',
        'mcons_4' => 'required_without:cons_4',
        'mcons_5' => 'required_without:cons_5',
        'mcons_6' => 'required_without:cons_6',
        'mcons_7' => 'required_without:cons_7',
        'mcons_8' => 'required_without:cons_8',
        'mcons_9' => 'required_without:cons_9',
        'mcons_10' => 'required_without:cons_10',
        
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
 		if(Auth::user()->role == 3 )
 			$v = Validator::make($data, $this->rulesstep1a);
 		else
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
 		if(Auth::user()->role == 5 )
 			$v = Validator::make($data, $this->rulesstep2);
 		else
 			$v = Validator::make($data, $this->rulesstep2a);

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
 		if(Auth::user()->role == 2 )
 			$v = Validator::make($data, $this->rulesstep3);
 		else
 			$v = Validator::make($data, $this->rulesstep3a);

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
        return DB::table('view_visit')->wherePartner($id)->orderby('id', 'desc')->take($number)->get();
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


	public static function getFilter($filter, $code,$local,$name)

	{
		$raw = ' 1=1 ';

		if ($filter == 1 || $filter == 2 || $filter == 3)
		{
			$raw = $raw . ' and  partner = '.$filter;
		} 

		if (is_numeric( $code))
		{
			$raw = $raw . ' and  id = '.$code;
		} 

		if ( $local)
		{
			$raw = $raw . ' and  row like \'%'.str_replace('\'', '\\\'', $local) .'%\'';
		} 

		if ( $name)
		{
			$raw = $raw . ' and  (name like \'%'.str_replace('\'', '\\\'', $name) .'%\' or surname like \'%'.str_replace('\'', '\\\'', $name) .'%\') ';
		} 


		return $raw;
	}


    public static function getFilterSospese($filter, $code,$local,$name)

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

	


    public static function getCity()

    {
        $raw = VisitCity::orderBy('city')->lists('city', 'city');

        return $raw;
    }

    public static function getLocaliByCity($city)

    {
        $raw = VisitLocali::whereCity($city)->orderBy('locale')->lists('locale', 'locale');

        return $raw;
    }



}