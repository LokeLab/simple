@extends('template.internal')

@section('content')
<?php 

 $nation = DB::table('province')->lists('description', 'id');

 ?>
<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('activities.addactivities');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'activities', 'method' => 'POST')) }}
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('activities') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
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
	@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif
<div class="row">

	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('activity', Lang::get('activities.activity')) }}
		{{ Form::text('activity', '', array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('typeactivity', Lang::get('activities.typeactivity')) }}
		{{ Form::select('typeactivity', $array_type, '', array('class'=>'form-control')) }}
		</div>
	</div>

<div class="col-lg-4">
		<div class="form-group">
		<div class="col-lg-12">	
							{{Lang::get('budget.closed') }}
						</div>
						<div class="col-lg-12">	
										
							<label class="radio-inline">
								{{ Form::radio('closed', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('closed', 0, 1) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
			{{ Form::label('from_nation', Lang::get('activities.country')) }}
			{{ Form::select('from_nation', $nation, '',   array('class'=>'form-control placeholder-no-fix' ) ) }}
	</div>
	<div class="col-lg-4">
				{{ Form::label('from_city', Lang::get('activities.city')) }}
				{{ Form::text('from_city', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.city')  )) }}
	</div>
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('place', Lang::get('activities.place')) }}
		{{ Form::text('place', '', array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('summary', Lang::get('activities.description')) }}
		{{ Form::textarea('summary', '', array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="row">
    
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('partner', Lang::get('navigation.partner')) }}
		{{ Form::select('partner', Partner::getList(), '', array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">

		{{ Form::label('d_document_start', Lang::get('budget.datefrom')  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_start', '' ,   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.datefrom'))   ) }}
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('d_document_stop', Lang::get('budget.to') , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_stop', '' ,   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.to'))   ) }}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('summary', Lang::get('activities.description')) }}
		{{ Form::textarea('summary', '', array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="col-lg-12">
		
		<strong>{{ Form::label('summary', Lang::get('activities.infobennext')) }}</strong>
		
		
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit('Salva',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('activities') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop