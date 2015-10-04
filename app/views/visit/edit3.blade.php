{{Form::hidden('STEP', '3')}}

<div class="row">
	
	<div class="col-lg-12">
	<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>Dati aggiuntivi
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-12">Descrivi la meccanica serata autogestito</div>
						<div class="col-lg-12">{{Form::textarea('description_ma',$v->description_ma,  array('class'=>'form-control'))}}
						</div>
						@if($v->role ==5)
						<div class="col-lg-12">In coppia con..
						</div><div class="col-lg-12">{{Form::textarea('description_ma2',$v->description_ma2,  array('class'=>'form-control'))}}</div>
						@endif
						
					</div>


					
				
				
				</div>
			</div>
		</div>

		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>Dati quantitativi
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-6">N° persone presenti nel locale</div> <div class="col-lg-2"> {{Form::text('cons_1',$v->cons_1  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_1',$v->mcons_1 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">N° totale consumazioni Martini</div> <div class="col-lg-2 alt"> {{Form::text('cons_2',$v->cons_2  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_2',$v->mcons_2, array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">N° consumazioni Martini Royale bianco</div> <div class="col-lg-2"> {{Form::text('cons_3',$v->cons_3  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_3',$v->mcons_3 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">N° consumazioni Martini Royale rosato</div> <div class="col-lg-2 alt"> {{Form::text('cons_4',$v->cons_4  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_4',$v->mcons_4 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">N° consumazioni altri drink Martini - negroni</div> <div class="col-lg-2"> {{Form::text('cons_5',$v->cons_5  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_5',$v->mcons_5 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">N° consumazioni altri drink Martini - sbagliato</div> <div class="col-lg-2 alt"> {{Form::text('cons_6',$v->cons_6  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_6',$v->mcons_6 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">N° consumazioni altri drink Martini - orange</div> <div class="col-lg-2"> {{Form::text('cons_7',$v->cons_7  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_7',$v->mcons_7 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">N° consumazioni altri drink Martini - americano</div> <div class="col-lg-2 alt"> {{Form::text('cons_8',$v->cons_8  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_8',$v->mcons_8 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">N° consumazioni Aperol Spritz</div> <div class="col-lg-2"> {{Form::text('cons_9',$v->cons_9  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_9',$v->mcons_9 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">N° altri drink aperitivo</div> <div class="col-lg-2 alt"> {{Form::text('cons_10',$v->cons_10  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_10',$v->mcons_10 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Numero di gadget distribuiti</div> <div class="col-lg-2"> {{Form::text('cons_11',$v->cons_11  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_11',$v->mcons_11 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						@if($v->role ==2)
						<div class="col-lg-6">Quanti Martini Royale a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_12',$v->cons_12  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_12',$v->mcons_12 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti negroni a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_13',$v->cons_13  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_13',$v->mcons_13 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quanti sbagliato a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_14',$v->cons_14  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_14',$v->mcons_14 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti americano a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_15',$v->cons_15  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_15',$v->mcons_15 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quanti Spritz Aperol settimana?</div> <div class="col-lg-2"> {{Form::text('cons_16',$v->cons_16  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_16',$v->mcons_16 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti altri cocktail a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_17',$v->cons_17  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_17',$v->mcons_17 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quante consumazioni vino o prosecco a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_18',$v->cons_18  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_18',$v->mcons_18 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quante consumazioni birra a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_19',$v->cons_19  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_19',$v->mcons_19 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>	

						<div class="col-lg-6 ">Totale consumazioni alcoliche a settimana?</div> <div class="col-lg-2 "> {{Form::text('cons_20',$v->cons_20  , array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_20',$v->mcons_20 , array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>	
						@endif
						</div>


						<div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{Form::textarea('note_visit',$v->note_visit,  array('class'=>'form-control'))}}
						</div>
					


					
				
				
				</div>
			</div>
		</div>


	</div>



