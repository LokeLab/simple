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
						{{ Form::label('city', $v->city ,   array('class'=>'form-control ')   ) }}
						
						{{ Form::label('address', 'Indirizzo'  , array('class' => 'control-label ')) }}
						{{ Form::label('address', $v->address ,  array('class'=>'form-control ')  ) }}
						
						{{ Form::label('local', 'Locale'  , array('class' => 'control-label ')) }}
						{{ Form::label('local', $v->local,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Locale' ) ) }}
			
						{{ Form::label('local_definition', 'Ragione sociale'  , array('class' => 'control-label ')) }}
						{{ Form::label('local_definition', $v->local_definition,   array('class'=>'form-control ' ) ) }}

						{{ Form::label('code', 'Codice spedizione'  , array('class' => 'control-label ')) }}
						{{ Form::label('code', $v->code,   array('class'=>'form-control ')  ) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('furniture', 'Codice spedizione'  , array('class' => 'control-label ')) }}
						{{ Form::label('furniture', $v->furniture ,  array('class'=>'form-control placeholder-no-fix'  )) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('code_team_sell_out', 'Classificazione TEAM SELL OUT'  , array('class' => 'control-label ')) }}
						{{ Form::label('code_team_sell_out', $v->code_team_sell_out, array('class'=>'form-control '   )) }}
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
				{{ Form::label('name', $v->name, array('class'=>'form-control readonly	')) }}
				{{ Form::label('surname', 'Cognome') }}
				{{ Form::label('surname', $v->surname, array('class'=>'form-control readonly')) }}
				{{ Form::label('role_description', 'Ruolo' ) }} {{ Form::hidden('role', Auth::user()->role) }}
				{{ Form::label('role_description', $v->role, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_manager', 'Manager' ) }}
				{{ Form::label('user_manager', $v->manager, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_agente', 'Agente' ) }}
				{{ Form::label('user_agente', $v->agente, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_developer', 'Developer' ) }}
				{{ Form::label('user_developer', $v->developer, array('class'=>'form-control readonly')) }}


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
							{{$v->aperitif_auto_fq }} 
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
							{{$v->advocacy_fq }} 
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
							{{$v->s_consumer_fq }} 
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
							{{$v->l_advocacy_fq }} 
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

						{{ Form::label('visit_at', 'Data visita'  , array('class' => 'control-label ')) }}
						{{ Form::label('visit_at', Decoder::decodeDate($v->visit_at) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Data')   ) }}
					</div>
					
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
							<div class="col-lg-5">Serve Martini Royale </div><div class="col-lg-7">{{ Decoder::decodeYN($v->qsmr) }}
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