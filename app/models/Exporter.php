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



	public static function getFileTranslationJob($terms,$nomefile)
	{
		echo 'imposto timeout';
		set_time_limit(4000);
		echo 'creazione file';
		
		$excel = Excel::create($nomefile.'_'.date('d_m_Y_h_i'));
		echo 'file creato';


		$excel->sheet('Visite', function($sheet) use($terms) {
        	$sheet->fromArray($terms);

    	});
		echo 'file riempito';

 		
		

		$excel->store('xls', storage_path('\home\prodea\webapps\reportavpn\laravel\public\excel\exports'));
		// Model QG_terms_WP0_HR_28_03_2014_20_29.xlsx

			echo 'salvataggio effettuato';	



		return true;
	}




	
}
