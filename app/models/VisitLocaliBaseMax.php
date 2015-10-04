<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class VisitLocaliBaseMax extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visit_locali_mese_max';

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




	//B::select(DB::raw('RENAME TABLE photos TO images'));

	public static function getFiltered($da, $a)
	{
		$da_mese = substr($da, 4,2);
        $da_anno = substr($da, 0,4);
        $a_mese = substr($a, 4,2);
        $a_anno = substr($a, 0,4);

       // echo ' id in ( select id from visit_locali_mese_max_solid where anno >= '.$da_anno.' and mese >= '. $da_mese .' and  anno <='. $a_anno .' and mese <= '.$a_mese .')';

		$result = DB::table("visit_base_estesa")->whereRaw(' id in ( select id from visit_locali_mese_max_solid where anno >= '.$da_anno.' and mese >= '. $da_mese .' and  anno <='. $a_anno .' and mese <= '.$a_mese .')' )
                     ->get();

		echo 'estratto';
		print_r($result);
		//exit;
		return $result;
	}



}