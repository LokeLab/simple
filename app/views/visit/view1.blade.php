
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					.alt { background-color: rgb(226, 211, 211);
						min-height:40px;}
					.col-lg-6 {min-height:40px;}
					.col-lg-2 {min-height:40px;}
					.col-lg-4 {min-height:40px;}
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
						</div><div class="col-lg-6 alt">Sono presenti locandine? </div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_4) }}
						</div><div class="col-lg-6">E' presente il brand block nel back bar?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_5) }}
						</div><div class="col-lg-6 alt">E' presente il quadro luminoso Martini Racing?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_6) }}
						</div><div class="col-lg-6">E' presente il barmat?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_7) }}
						</div><div class="col-lg-6 alt">Sono presenti i bicchieri?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_8) }}
						</div><div class="col-lg-6">E' presente l'ice bucket?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_9) }}
						</div><div class="col-lg-6 alt">Il personale ha le divise Martini?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_10) }}
						</div><div class="col-lg-6">E' presente il kit barman?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_11) }}
						</div><div class="col-lg-6 alt">Sono presenti i cavalierini?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_12) }}
						</div><div class="col-lg-6">Sono presenti i menu'?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_13) }}
						</div><div class="col-lg-6 alt">E' presente il Martini Royale sul menu' locale?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_14) }}
						</div><div class="col-lg-6">E' presente almeno un Martini classic cocktail sul menu' locale?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_16) }}
						</div><div class="col-lg-6 alt">E' stato proposto il Martini Royale contest? (ad almeno un barman)</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_17) }}
						</div><div class="col-lg-6">E' stato proposto il Martini workshop? (ad almeno un barman)</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_18) }}
						</div>




						@if ($v->role  == 3)
							<div class="col-lg-6">N° barman coinvolti nell'advocacy</div> <div class="col-lg-6"> {{$v->nbarman}}</div>
						@endif


						<div class="col-lg-6">Quanti Martini Royale a settimana?</div> <div class="col-lg-6"> {{$v->cons_12}} {{$v->mcons_12}} </div>
						<div class="col-lg-6 alt">Quanti negroni a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_13}} {{$v->mcons_13}} </div>
						<div class="col-lg-6">Quanti sbagliato a settimana?</div> <div class="col-lg-6"> {{$v->cons_14}} {{$v->mcons_14}} </div>
						<div class="col-lg-6 alt">Quanti americano a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_15}} {{$v->mcons_15}} </div>
						<div class="col-lg-6">Quanti Spritz Aperol settimana?</div> <div class="col-lg-6"> {{$v->cons_16}} {{$v->mcons_16}} </div>
						<div class="col-lg-6 alt">Quanti altri cocktail a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_17}} {{$v->mcons_17}} </div>
						<div class="col-lg-6">Quante consumazioni vino o prosecco a settimana?</div> <div class="col-lg-6"> {{$v->cons_18}} {{$v->mcons_18}} </div>
						<div class="col-lg-6 alt">Quante consumazioni birra a settimana?</div> <div class="col-lg-6 alt"> {{$v->cons_19}} {{$v->mcons_19}} </div>

						<div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{$v->note_visit}}
						</div>
					</div>


					
				
				
				</div>
			</div>
		</div>


	</div>
	


