<?php

class ExporterController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function getBudgetPartner($id)
	{
        if (Auth::user()->role > 1 && Auth::user()->role <6 ) $id = Auth::user()->partner;

		$terms = Budgetview::where('partner',$id)
                        ->orderBy('row')
                        ->get();
        $nomefile = 'Partner_Budget_'. Partner::getLabelShort($id);


        if ($terms)
        {

            Exporter::getFileBudget($terms, $nomefile);

        } else
        {
            Redirect::to('/financialsummary/'.$id)->with('error',trans('generic.nodata'));
        }
	}

    public function getChapterExpensesPartner($id,$chapter)
    {
        if (Auth::user()->role > 1 && Auth::user()->role <6 ) $id = Auth::user()->partner;

        switch ($chapter) {
               case 1:
                   $chapters = CostsViewChapter1::where('partner',$id)
                        ->wherePayed('YES')
                        ->orderBy('reference')
                        ->get();

                        break;
               case 2: 

                   $chapters = CostsViewChapter2::where('partner',$id)
                        ->wherePayed('YES')
                        ->orderBy('reference')
                        ->get();

                        break;

                case 3: 

                   $chapters = CostsViewChapter3::where('partner',$id)
                        ->wherePayed('YES')
                        ->orderBy('reference')
                        ->get();

                        break;
                case 4: 

                   $chapters = CostsViewChapter2::where('partner',$id)
                        ->wherePayed('YES')
                        ->orderBy('reference')
                        ->get();

                        break;
                        default:
                        exit;
              
           }   

      
        $nomefile = 'Costs_payed_chapter_'.$chapter.'_Budget_'. Partner::getLabelShort($id);


        if ($chapter)
        {

            Exporter::getFileChapter($chapters, $nomefile);

        } else
        {
            Redirect::to('/financialsummary/'.$id)->with('error',trans('generic.nodata'));
        }
        
    }

    public function getUserAll($user)
    {
        $terms = VisitBase::where('user_created',$user)
                        ->get();
        $nomefile = 'export_locali_'. $user;


        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
    }

    /**
     * Esportare report valori massimi.
     * @anno , @mese   mese di riferimento 
     * 
     */
    public function getMonthAllMax($anno,$mese)
    {
        $terms = VisitLocaliBaseMax::where('anno',$anno)
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

public function getAllMax()
    {



        $terms = VisitLocaliBaseMaxAll::get();
        $nomefile = 'export_completo_locali';


        if ($terms)
        {

            Exporter::getFileTranslation($terms, $nomefile);

        } else
        {
            Redirect::to('/reporting')->with('error','Nessuna visita da estrarre');
        }
    }



    public function getFiltered()
    {


        $da = Input::get('data_da');
        $a = Input::get('data_a');

        $da_mese = substr($da, 4,2);
        $da_anno = substr($da, 0,4);
        $a_mese = substr($a, 4,2);
        $a_anno = substr($a, 0,4);


        $report = new VisitReport;
        $report->user_required= Auth::user()->id;
        $report->created_at = date('Y-m-d H:i:s');

        $report->da_mese = $da_mese;
        $report->a_mese = $a_mese;
        $report->da_anno = $da_anno;
        $report->a_anno = $a_anno;
        $report->tipo = 2;
        $report->email = Input::get('email');
       
        $report->estratto = 0;
        $report->save();


        return Redirect::to('/reporting?message=Estrazione prenotata')->with('error','');

    }

    public function getFilteredMax()
    {


        $da = Input::get('data_da');
        $a = Input::get('data_a');

        $da_mese = substr($da, 4,2);
        $da_anno = substr($da, 0,4);
        $a_mese = substr($a, 4,2);
        $a_anno = substr($a, 0,4);


        $report = new VisitReport;
        $report->user_required= Auth::user()->id;
        $report->created_at = date('Y-m-d H:i:s');

        $report->da_mese = $da_mese;
        $report->a_mese = $a_mese;
        $report->da_anno = $da_anno;
        $report->a_anno = $a_anno;
        $report->tipo = 1;
        $report->email = Input::get('email');
       
        $report->estratto = 0;
        $report->save();


        return Redirect::to('/reporting?message=Estrazione prenotata')->with('error','');

    }



    public function jobSheduler()
        {

        $report = VisitReport::where('estratto', 0)->where('nascosto', 0)->orderBy('tentativi','asc')->first();

        
        if ($report)
        {
            echo ' Trovato record da elaborare';
            $da  = $report->da_anno.$report->da_mese;
            $a  = $report->a_anno.$report->a_mese;
            $mail = $report->email;
            $periodo = $report->da_mese . '/'.$report->da_anno .' a '. $report->a_mese.'/'.$report->a_anno;

            //print_r(Input::all());
            $nomefile = 'export_locali_da_'. substr($da, 4,2) .'_'.substr($da, 0,4) .'_a_'.substr($a, 4,2) .'_'.substr($a, 0,4) .'_'.date('Ymd_H_i_s');
            
            echo 'Tipo estrazione '.$report->tipo ;
            if ($report->tipo == 2)
                $terms = VisitLocaliBase::getFiltered($da, $a);
            else
                $terms = VisitLocaliBaseMaxAll::getFiltered($da, $a);
            //print_r($terms);
            if ($terms)
            {

                Exporter::getFileTranslationJob($terms, $nomefile);

            } 
            $report->filename = $nomefile;
            $report->estratto = 1;
            $report->updated_at = date('Y-m-d H:i:s');
            $report->save();


            $maildata = array(
                                'email'  =>  $mail,
                                'periodo' =>  $periodo,
                                'filename' => $nomefile,
                                );
                Session::put('email', $mail);

                    Mail::send('emails.estrazione', $maildata, function($message)
                        {
                            $message->to(Session::get('email'), '')
                            ->subject('Estrazione report completata');
                        });

                Session::put('email', '');





        } else {
            echo 'Nessuna estrazione prenotata.';
        }

            





    }



    public function getFilteredtwo()
    {
       
        $da = Input::get('data_da');
        $a = Input::get('data_a');
        
        if ($a < $da )
        {
            return Redirect::to('/reporting?error=Indicare una data di fine periodo superiore o uguale alla data inizio periodo')->with('error','Indicare una data di fine periodo superiore o uguale alla data inizio periodo');
            exit;
        }



        $da_mese = substr($da, 4,2);
        $da_anno = substr($da, 0,4);
        $a_mese = substr($a, 4,2);
        $a_anno = substr($a, 0,4);
        
        //print_r(Input::all());
        $nomefile = 'export_complelocali_da_'. substr($da, 4,2) .'_'.substr($da, 0,4) .'_a_'.substr($a, 4,2) .'_'.substr($a, 0,4) ;
        
        $terms = VisitLocaliBase::getFiltered($da, $a);
        //print_r($terms);
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
