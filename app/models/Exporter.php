<?php

class Exporter {


	/**
	 * Get decode role.
	 *
	 * @return string
	 */
	public static function getFileTranslation($terms,$nomefile)
	{
		$excel = Excel::create($nomefile.'_'.date('d_m_Y_h_i'));

		$excel->sheet('Visite', function($sheet) use($terms) {

        	$sheet->fromArray($terms);

    	});

 		
		

		$excel->download('xls');
		// Model QG_terms_WP0_HR_28_03_2014_20_29.xlsx

		$excel->close();



		return true;
	}




	
}
