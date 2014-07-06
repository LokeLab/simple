
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					.alt { background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>


{{ Form::open(array('url' => 'visit/step1', 'method' => 'POST')) }}
{{Form::hidden('id', $id)}}

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
										
							{{ Decoder::decodeYN($v->case_6) }}
						</div><div class="col-lg-6">Sono presenti i cavalierini?</div><div class="col-lg-6">	
										
							{{ Decoder::decodeYN($v->case_13) }}
						</div><div class="col-lg-6 alt">Sono presenti i menu'?</div><div class="col-lg-6 alt">	
										
							{{ Decoder::decodeYN($v->case_14) }}
						</div>
						<div class="col-lg-6">N° barman coinvolti nell'advocacy</div> <div class="col-lg-6"> {{$v->nbarman}}</div>
						


						<div class="col-lg-12">Descrivi la meccanica dell'autogestito</div>
						<div class="col-lg-12">{{$v->description_ma}}
						</div><div class="col-lg-12">In coppia con..
						</div><div class="col-lg-12">{{$v->description_ma2}}</div>
						<div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{$v->note_visit}}
						</div>
					</div>


					
				
				
				</div>
			</div>
		</div>


	</div>
	




{{ Form::close() }}
