<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class VisitBase extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'v_budget_spent';

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

	


 public static function getTotalActivable($partner)

    {
        $raw = DB::table('v_budget_partner')->wherePartner($partner)->pluck('amountactivable');

        return $raw;
    }

public static function getTotalUnderCheck($partner)

    {
        $raw = DB::table('v_budget_partner')->wherePartner($partner)->pluck('amountundercheck');

        return $raw;
    }

}