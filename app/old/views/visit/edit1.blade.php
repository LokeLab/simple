

<div class="row">
	<div class="col-lg-10">
		<h3>Informazioni generali</h3>
	</div>
</div>
{{Form::hidden('STEP', '1')}}
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
						<div class="col-lg-6">E' presente la vetrofania?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_1', 1, $v->case_1 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_1', 0, $v->case_1 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
			
						
						</div><div class="col-lg-6 alt">E' presente la lavagna (da esterno o da bancone)?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_2', 1, $v->case_2 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_2', 0, $v->case_2 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente l'espositore?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_3', 1, $v->case_3 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_3', 0, $v->case_3 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">Sono presenti locandine? </div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_4', 1, $v->case_4 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_4', 0, $v->case_4 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente il brand block nel back bar?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_5', 1, $v->case_5 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_5', 0, $v->case_5 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">E' presente il quadro luminoso martini racing?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_6', 1, $v->case_6 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_6', 0, $v->case_6 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente il barmat?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_7', 1, $v->case_7 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_7', 0, $v->case_7 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">Sono presenti i bicchieri?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_8', 1, $v->case_8 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_8', 0, $v->case_8 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente l'ice bucket?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_9', 1, $v->case_9 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_9', 0, $v->case_9 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">Il personale ha le divise Martini?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_10', 1, $v->case_10 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_10', 0, $v->case_10 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente il kit barman?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_11', 1, $v->case_11 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_11', 0, $v->case_11 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">Sono presenti i cavalierini?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_12', 1, $v->case_12 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_12', 0, $v->case_12 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">Sono presenti i menu'?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_13', 1, $v->case_13 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_13', 0, $v->case_13 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">E' presente il Martini Royale sul menu' locale?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_14', 1, $v->case_14 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_14', 0, $v->case_14 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente almeno uno dei  MARTINI Classic cocktails sul menù del locale?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_16', 1, $v->case_16 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_16', 0, $v->case_16 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div>
						<div class="col-lg-6 alt">E' stato proposto il Martini Royale contest? (ad almeno un barman)</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_17', 1, $v->case_17 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_17', 0, $v->case_17 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' stato proposto il Martini workshop? (ad almeno un barman)</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_18', 1, $v->case_18 == 1 ) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_18', 0, $v->case_18 == 0 ) }} {{Lang::get('decode.No')}}
							</label>
						</div>

						@if ($v->role==3)
							<div class="col-lg-6">N° barman coinvolti nell'advocacy</div> <div class="col-lg-6"> {{Form::text('nbarman',$v->nbarman, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div>
						@endif
						<div class="row">
						<div class="col-lg-6">Quanti Martini Royale a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_12',$v->cons_12, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_12','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti negroni a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_13',$v->cons_13, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_13','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quanti sbagliato a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_14',$v->cons_14, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_14','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti americano a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_15',$v->cons_15, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_15','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quanti Spritz Aperol settimana?</div> <div class="col-lg-2"> {{Form::text('cons_16',$v->cons_16, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_16','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quanti altri cocktail a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_17',$v->cons_17, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_17','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6">Quante consumazioni vino o prosecco a settimana?</div> <div class="col-lg-2"> {{Form::text('cons_18',$v->cons_18, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_18','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>
						<div class="col-lg-6 alt">Quante consumazioni birra a settimana?</div> <div class="col-lg-2 alt"> {{Form::text('cons_19',$v->cons_19, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_19','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>	

						<div class="col-lg-6 ">Totale consumazioni alcoliche a settimana?</div> <div class="col-lg-2 "> {{Form::text('cons_20',$v->cons_20, array('class'=>'form-control', 'placeholder'=>'numero'))}}</div><div class="col-lg-4"> {{Form::text('mcons_20','', array('class'=>'form-control', 'placeholder'=>'motivo se non disponibile'))}}</div>	
						</div>



						<div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{Form::textarea('note_visit',$v->note_visit,  array('class'=>'form-control'))}}
						</div>
					</div>


					
				
				
				</div>
			</div>
		</div>


	</div>

