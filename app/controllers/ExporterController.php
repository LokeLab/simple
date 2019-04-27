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

      
    
}
