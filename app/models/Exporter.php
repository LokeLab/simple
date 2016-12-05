<?php

class Exporter {


	/**
	 * Get decode role.
	 *
	 * @return string
	 */
	public static function getFileBudget($terms,$nomefile)
	{
		$excel = Excel::create($nomefile.'_'.date('d_m_Y_h_i'));

		$excel->sheet('Budget', function($sheet) use($terms) {

        	$sheet->fromArray($terms);

    	});

		$excel->download('xls');

		$excel->close();



		return true;
	}

	public static function getFileChapter($terms ,$nomefile ='Export' )
	{
		
$excel = Excel::create($nomefile.'_'.date('d_m_Y_h_i'));

		$excel->sheet('Budget', function($sheet) use($terms) {

        	$sheet->fromArray($terms);

    	});

		$excel->download('xls');

		$excel->close();





		return true;
	}






	
}
