<?php

class Utility {

	public static function shuffle_assoc($list) { 
	  if (!is_array($list)) return $list; 

	  $keys = array_keys($list); 
	  shuffle($keys); 
	  $random = array(); 
	  foreach ($keys as $key) { 
	    $random[$key] = $list[$key]; 
	  }
	  return $random; 
	} 


	public static function color($val) { 
		

		if ($val > 90)
		{
			 return 'red';
		}
		else 
			if ($val > 70)
		{
			 return 'yellow';
		}
		else 
			{
				return 'green';
			}


	}

}