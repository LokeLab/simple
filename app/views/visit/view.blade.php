@extends('template.internal')

@section('content')
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>


{{ Form::open(array('url' => 'visit', 'method' => 'POST')) }}
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
<!--<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('ttemplates.id')) }}: 
		{{ Form::text('id', '', array('class'=>'form-control')) }}
		</div>
	</div>
</div>-->
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
					<i class="fa fa-home"></i>Dati locale visitato
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						{{ Form::label('city', 'Città'  , array('class' => 'control-label ')) }}
						{{ Form::text('city', '' ,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Città')   ) }}
						
						{{ Form::label('address', 'Indirizzo'  , array('class' => 'control-label ')) }}
						{{ Form::text('address',  '' ,  array('class'=>'form-control placeholder-no-fix' , 'placeholder' => 'Indirizzo')  ) }}
						
						{{ Form::label('local', 'Locale'  , array('class' => 'control-label ')) }}
						{{ Form::text('local', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Locale' ) ) }}
			
						{{ Form::label('local_definition', 'Ragione sociale'  , array('class' => 'control-label ')) }}
						{{ Form::text('local_definition', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Ragione sociale' ) ) }}

						{{ Form::label('code', 'Codice spedizione'  , array('class' => 'control-label ')) }}
						{{ Form::text('code', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Codice Spedizione')  ) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('furniture', 'Codice spedizione'  , array('class' => 'control-label ')) }}
						{{ Form::select('furniture', array('DIRETTO'=>'DIRETTO','INDIRETTO'=>'INDIRETTO'),'DIRETTO',  array('class'=>'form-control placeholder-no-fix'  )) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('code_team_sell_out', 'Classificazione TEAM SELL OUT'  , array('class' => 'control-label ')) }}
						{{ Form::select('code_team_sell_out', array('ND'=>'ND','A'=>'A','B'=>'B','C'=>'C','D'=>'D'),'ND', array('class'=>'form-control placeholder-no-fix'   )) }}
					</div>
				
				
				</div>
			</div>
		</div>


	</div>
	<div class="col-lg-4">
	
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Dati compilatore
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				{{ Form::label('name', 'Nome' ) }} 
				{{ Form::text('name', Auth::user()->name, array('class'=>'form-control readonly	')) }}
				{{ Form::label('surname', 'Cognome') }}
				{{ Form::text('surname', Auth::user()->surname, array('class'=>'form-control readonly')) }}
				{{ Form::label('role_description', 'Ruolo' ) }} {{ Form::hidden('role', Auth::user()->role) }}
				{{ Form::text('role_description', Role::getLabel(Auth::user()->role), array('class'=>'form-control readonly')) }}
				{{ Form::label('user_manager', 'Manager' ) }}
				{{ Form::text('user_manager', Auth::user()->manager, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_agente', 'Agente' ) }}
				{{ Form::text('user_agente', Auth::user()->agente, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_developer', 'Developer' ) }}
				{{ Form::text('user_developer', Auth::user()->developer, array('class'=>'form-control readonly')) }}


			</div>
		</div>

	</div>
<div class="col-lg-8">
	
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Visita 
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">

						{{ Form::label('visit_at', 'Data visita'  , array('class' => 'control-label ')) }}
						{{ Form::text('visit_at', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Data')   ) }}
					</div>
					
					


					<div class="col-lg-12">
						<h4>Informazioni generali</h4>
					</div>

					<div class="col-lg-12">
						<div class="col-lg-6">	
							Aperitivo autogestito
						</div>
						<div class="col-lg-3">	
							{{ Decoder::decodeYN($v->aperitif_auto) }} 			
							 
			
						</div>
						<div class="col-lg-3">	
							{{ Form::text('aperitif_auto_fq', '' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					<div class="col-lg-12 active">
						<div class="col-lg-6">	
							Advocacy
						</div>
						<div class="col-lg-3">	
							{{ Decoder::decodeYN($v->advocacy) }} 				
							 
			
						</div>
						<div class="col-lg-3">	
							{{ Form::text('advocacy_fq', '' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					<div class="col-lg-12">
						<div class="col-lg-6">	
							Serata consumer
						</div>
						<div class="col-lg-3">	
							{{ Decoder::decodeYN($v->s_consumer) }} 			
							
			
						</div>
						<div class="col-lg-3">	
							{{ Form::text('s_consumer_fq', '' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					<div class="col-lg-12 active">
						<div class="col-lg-6">	
							Light advocacy
						</div>
						<div class="col-lg-3">	
										
							{{ Decoder::decodeYN($v->l_advocacy) }} 
			
						</div>
						<div class="col-lg-3">	
							{{ Form::text('l_advocacy_fq', '' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>
				
				</div>
			</div>
		</div>


	</div>


<div class="col-lg-4">
	
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-thumb-tack"></i>Tipo visita
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="col-lg-12">	
						{{ Form::label('typevisit', 'Tipo visita'  , array('class' => 'control-label ')) }}
						{{ Form::label('typevisit', Visit::getTypeLabel($v->typevisit) ,  array('class'=>'form-control placeholder-no-fix'  )) }}
						
						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="col-lg-5">Prima visita</div><div class="col-lg-7"> 
									{{ Decoder::decodeYN($v->first_visit) }}
							</div>
						</div>
					
				 
						<div class="col-lg-12 active">
							<div class="col-lg-5">Potenziale </div><div class="col-lg-7">{{ Decoder::decodeYN($v->pot) }}
							</div>
						</div>

						<div class="col-lg-12">
							<div class="col-lg-5">Ripassaggio </div><div class="col-lg-7">{{ Decoder::decodeYN($v->re) }}
							</div>
						</div>
					 

					<div class="col-lg-12">
						<h4>Quality</h4>
					</div>

					 
						<div class="col-lg-12">
							<div class="col-lg-5">Serve Martini Royal </div><div class="col-lg-7">{{ Decoder::decodeYN($v->qsmr) }}
							</div>
						</div>

						<div class="col-lg-12 active">
							<div class="col-lg-5">Serve Martini Cocktail </div><div class="col-lg-7">{{ Decoder::decodeYN($v->qscc) }}
							</div>
						</div>
					</div>
					 
    			</div>
			</div>
		</div>
	
</div>


@include(Visit::getIncludeVisit($v->role,$v->typevisit))


{{ Form::close() }}
@stop