<?php

class Decoder {


	/**
	 * Get decode role.
	 *
	 * @return string
	 */
	public static function decodeRole($role_id)
	{
		
		return Role::getLabel($role_id);
	}

	public static function decodePartnerShort($role_id)
	{
		
		return Partner::getLabelShort($role_id);
	}

/**
	 * Get decode license.
	 *
	 * @return string
	 */
	public static function decodeLicense($license_id)
	{
		return License::getLabel($license_id);
	}

	/**
	 * Get decode Yes / NO boolean.
	 *
	 * @return string
	 */
	public static function decodeYN($bool)
	{
		
		   	return $bool==TRUE ? Lang::get('decode.Yes') : Lang::get('decode.No');

		
	}
	
	public static function decodeYNPubish($bool)
	{
		
		   	return $bool==TRUE ? Lang::get('offerts.offertpublishY') : Lang::get('offerts.offertpublishN');

		
	}
	/**
	* Get the name and surname of the user
	*/
	public static function decodeName($id)
	{
		return User::getLabel($id);
		
	}

	/**
	 * Get decode Date  format.
	 *
	 * @return string
	 */
	public static function decodeDate($date) {
		
	    if ($date == "0000-00-00" || $date == "0000-00-00 00:00:00" || $date == "") {
	        return "";
	    } else {
	    	$date_formatted = date_create($date);
	        return date_format($date_formatted,'d/m/Y');
	    }
	}

	/**
	 * Get decode Date  format.
	 *
	 * @return string
	 */
	public static function decodeDateTime($date) {
		
	    if ($date == "0000-00-00" || $date == "0000-00-00 00:00:00" || $date == "") {
	        return "";
	    } else {
	    	$date_formatted = date_create($date);
	        return date_format($date_formatted,'d/m/Y H:i');
	    }
	}


	/**
	 * Get decode Date  format.
	 *
	 * @return string
	 */
	public static function decodeTime($date) {
		
	    if ($date == "0000-00-00" || $date == "0000-00-00 00:00:00" || $date == "") {
	        return "";
	    } else {
	    	$date_formatted = date_create($date);
	        return date_format($date_formatted,'h:i A');
	    }
	}

	public static function convert_date_in($date_string)
	{
		
		$pos = strpos($date_string, '/');
		if($pos)
		{ 
			$parts = explode('/', $date_string);


			if (is_array($parts))
				{
					$date  = "$parts[2]-$parts[1]-$parts[0]";
					return  $date ;
				}
				else
				{
					return null ;
				}
		}else
		return null;
	}

	public static function convert_date_out($date_string)
	{
		return Decoder::decodeDate($date_string);
	}

	public static function decodeReg($id)
	{
		if($id == 1) 
			return 'S';
		else
			return 'R';

	}


	public static function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);

		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return  array_map(__FUNCTION__,  $d);
		}
		else {
			// Return array
			return $d;
		}
	}



	
}
