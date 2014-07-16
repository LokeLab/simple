<?php

class ExporterController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function getMonthAll($anno,$mese)
	{
		$terms = VisitLocaliBase::where('anno',$anno)
                        ->where('mese',$mese)
                        ->get();
        $nomefile = 'export_locali_'. $anno.'_'.$mese;


        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
	}

    public function getWeekAll($anno,$settimana)
    {
        $terms = VisitBase::where('anno',$anno)
                        ->where('settimana',$settimana)
                        ->get();

        $nomefile = 'export'. $anno.'_'.$settimana;

        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
    }

    public function getWeekRoleAll($anno,$settimana,$role)
    {
        $terms = VisitBase::where('role',$role)->where('anno',$anno)
                        ->where('settimana',$settimana)
                        ->get();

        $nomefile = 'exportByRole'. $role.'_'.$anno.'_'.$settimana;

        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
    }

    public function getWeek($anno,$settimana, $operatore)
    {
        $terms = VisitBase::where('anno',$anno)
                        ->where('settimana',$settimana)
                        ->where('user_created',$operatore)
                        ->get();

        $nomefile = 'export'. $anno.'_'.$settimana.'_'.$operatore;


        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
    }
      
    
}
