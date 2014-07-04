@extends('template.internal')

@section('content')
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					.alt { background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
<div class="row">
	<div class="col-lg-10">
		<h3>Completa le informazioni sulla visita</h3>
	</div>
</div>

{{ Form::open(array('url' => 'visit/step1', 'method' => 'POST')) }}
{{Form::hidden('id', $id)}}
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('roles') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
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
					<i class="fa fa-home"></i>Dati aggiuntivi
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-6">E' presente la vetrofania?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_1', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_1', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
			
						
						</div><div class="col-lg-6 alt">E' presente la lavagna (da esterno o da bancone)?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_2', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_2', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">E' presente l'espositore?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_3', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_3', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">E' presente il brand block nel back bar?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_6', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_6', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6">Sono presenti i cavalierini?</div><div class="col-lg-6">	
										
							<label class="radio-inline">
								{{ Form::radio('case_13', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_13', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
						</div><div class="col-lg-6 alt">Sono presenti i menu'?</div><div class="col-lg-6 alt">	
										
							<label class="radio-inline">
								{{ Form::radio('case_14', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('case_14', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
						</div>
						<div class="col-lg-6">N° barman coinvolti nell'advocacy</div> <div class="col-lg-6"> {{Form::text('nbarman','', array('class'=>'form-control', 'placeholder'=>'numero'))}}</div>
						


						<div class="col-lg-12">Descrivi la meccanica serata autogestito</div>
						<div class="col-lg-12">{{Form::textarea('description_ma','',  array('class'=>'form-control'))}}
						</div><div class="col-lg-12">In coppia con..
						</div><div class="col-lg-12">{{Form::textarea('description_ma','',  array('class'=>'form-control'))}}</div>
						<div class="col-lg-12">Note/commenti</div>
						<div class="col-lg-12">{{Form::textarea('note_visit','',  array('class'=>'form-control'))}}
						</div>
					</div>


					
				
				
				</div>
			</div>
		</div>


	</div>
	<div class="col-lg-4">
	
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Informazioni sulla visita
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				 
				Data visita {{Decoder::decodeDate($visit->visit_at)}} 
				<br/>
				
				Locale {{$visit->local}} ({{$visit->address}}, {{$visit->city}})
				<br/>

				Tipo visita {{Visit::getTypeLabel($visit->typevisit)}}
				<br/>

				Compilata da {{$visit->name}} {{$visit->surname}}
				

			</div>
		</div>

	</div>



<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit('Salva',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('roles') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop