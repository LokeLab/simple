<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class VisitBase extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visit_base_estesa';

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

	



}