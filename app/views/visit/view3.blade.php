
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					.alt { background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>





<div class="row">
	@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif

	<div class="col-lg-8">
	
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
										
							{{ Decoder::decodeYN($v->case_1) }}
			
						
						</div><div class="col-lg-6 alt">E' presente la lavagna (da esterno o da bancone)?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_2) }}
						</div><div class="col-lg-6">E' presente l'espositore?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_3) }}
						</div><div class="col-lg-6 alt">E' presente il brand block nel back bar?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_5) }}
						</div><div class="col-lg-6">Sono presenti i cavalierini?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_12) }}
						</div><div class="col-lg-6 alt">Sono presenti i menu'?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_13) }}
						</div>
						<div class="col-lg-6">N° barman coinvolti nell'advocacy</div> <div class="col-lg-6"> {{$v->nbarman}}</div>
						


						<div class="col-lg-12">Descrivi la meccanica dell'autogestito</div>
						<div class="col-lg-12">{{$v->description_ma}}
						</div><div class="col-lg-12">In coppia con..
						</div><div class="col-lg-12">{{$v->description_ma2}}</div>
						
						<div class="col-lg-6">N° persone presenti nel locale</div> <div class="col-lg-6"> {{$v->cons_1}} {{$v->mcons_1}} </div>
						<div class="col-lg-6 alt">N° totale consumazioni Martini</div> <div class="col-lg-6 alt"> {{$v->cons_2}} {{$v->mcons_2}} </div>
						<div class="col-lg-6">N° consumazioni Martini Royale bianco</div> <div class="col-lg-6"> {{$v->cons_3}} {{$v->mcons_3}} </div>
						<div class="col-lg-6 alt">N° consumazioni Martini Royale rosato</div> <div class="col-lg-6 alt"> {{$v->cons_4}} {{$v->mcons_4}} </div>
						<div class="col-lg-6">N° consumazioni altri drink Martini - negroni</div> <div class="col-lg-6"> {{$v->cons_5}} {{$v->mcons_5}} </div>
						<div class="col-lg-6 alt">N° consumazioni altri drink Martini - sbagliato</div> <div class="col-lg-6 alt"> {{$v->cons_6}} {{$v->mcons_6}} </div>
						<div class="col-lg-6">N° consumazioni altri drink Martini - orange</div> <div class="col-lg-6"> {{$v->cons_7}} {{$v->mcons_7}} </div>
						<div class="col-lg-6 alt">N° consumazioni altri drink Martini - americano</div> <div class="col-lg-6 alt"> {{$v->cons_8}} {{$v->mcons_8}} </div>
						<div class="col-lg-6">N° consumazioni Aperol Spritz</div> <div class="col-lg-6"> {{$v->cons_9}} {{$v->mcons_9}} </div>
						<div class="col-lg-6 alt">N° altri drink aperitivo</div> <div class="col-lg-6 alt"> {{$v->cons_10}} {{$v->mcons_10}} </div>
						<div class="col-lg-6">Numero di gadget distribuiti</div> <div class="col-lg-6"> {{$v->cons_11}} {{$v->mcons_11}} </div>
						<div class="col-lg-12">In coppia con..
												</div><div class="col-lg-12">{{$v->cons_ma2}} </div>

						<div class="col-lg-6">Quanti Martini Royale a settimana?</div> <div class="col-lg-6"> {{$v->cons_12}} {{$v->mcons_12}} </div>
						<div class="col-lg-6 alt">Quanti negroni a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_13}} {{$v->mcons_13}} </div>
						<div class="col-lg-6">Quanti sbagliato a settimana?</div> <div class="col-lg-6"> {{$v->cons_14}} {{$v->mcons_14}} </div>
						<div class="col-lg-6 alt">Quanti americano a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_15}} {{$v->mcons_15}} </div>
						<div class="col-lg-6">Quanti Spritz Aperol settimana?</div> <div class="col-lg-6"> {{$v->cons_16}} {{$v->mcons_16}} </div>
						<div class="col-lg-6 alt">Quanti altri cocktail a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_17}} {{$v->mcons_17}} </div>
						<div class="col-lg-6">Quante consumazioni vino o prosecco a settimana?</div> <div class="col-lg-6"> {{$v->cons_18}} {{$v->mcons_18}} </div>
						<div class="col-lg-6 alt">Quante consumazioni birra a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_19}} {{$v->mcons_19}} </div>


						</div><div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{$v->note_visit}}
						</div>
					


					
				
				
				</div>
			</div>
		</div>


	</div>
	



