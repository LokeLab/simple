<?php

class Modal {


	/**
	 * Get decode role.
	 *
	 * @return string
	 */
	public static function panel($type)
	{
		
		return '<div id="informationSourceModal'.$type.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informationSourceModalLabel'.$type.'">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="informationSourceModalLabel'.$type.'">{{Lang::get("activity.istitle")}}</h4>
						</div>
						<div class="modal-body">
							{{ Form::open(array("id"=> "informationSourceForm'.$type.'", "url" => "activities/detail'.$type.'", "method" => "POST")) }}
							{{ Form::hidden("activity", $activities_detail->id) }}
							{{ Form::hidden("id", -1) }}
							<div class="form-group">
								{{ Form::label("title",  Lang::get("activity.title"), array("class"=>"control-label")) }}&nbsp;
								{{ Form::text("title", Lang::get("activity.title"), array("class" => "form-control required", "disabled"=> true)) }}
							</div>
							<div class="form-group">
								{{ Form::label("forseen",  Lang::get("activity.forseen"), array("class"=>"control-label")) }}&nbsp;
								{{ Form::text("forseen", "", array("class" => "form-control required", "placeholder"=>Lang::get("activity.forseen"))) }}
							</div>
							<div class="form-group">
								{{ Form::label("realized",  Lang::get("activity.realized"), array("class"=>"control-label")) }}&nbsp;
								{{ Form::text("realized", "", array("class" => "form-control required", "placeholder"=>Lang::get("activity.realized"))) }}
							</div>
							<div class="form-group">
								{{ Form::label("comment",  Lang::get("activity.comment"), array("class"=>"control-label")) }}&nbsp;
								{{ Form::text("comment", "", array("class" => "form-control required", "placeholder"=>Lang::get("activity.comment"))) }}
							</div>
							{{Form::close()}}

						</div>
						<div class="modal-footer">
							<button id="saveinformationsource'.$type.'" type="button" class="btn blue">{{Lang::get("generic.save")}}</button>
							<button type="button" class="btn yellow"
									data-dismiss="modal">{{Lang::get("generic.cancel")}}</button>
						</div>
					</div>
				</div>
			</div>';
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


	public static function formatPercentCost($cost,$total) {

		return '<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12  "><nobr> '.number_format($cost, 2, ',', ' ').'</nobr> </div> <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 percentage border_'.Utility::color(($total>0)?$cost *100/ $total:0).'" ><nobr> '.number_format(($total>0)?$cost *100/ $total:'0', 1, ',', ' ').' % </nobr></div>';
	}

public static function formatCost($cost, $decimal, $separatorD, $separatorM) {

		return '<nobr> '.number_format($cost, $decimal, $separatorD, $separatorM).'</nobr>';
	}
	
}
