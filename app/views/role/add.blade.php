@extends('template.internal')

@section('content')
<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('roles.addrole');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'roles', 'method' => 'POST')) }}
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
	@include('includes.message')
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('description', Lang::get('roles.description')) }}
		{{ Form::text('description', '', array('class'=>'form-control')) }}
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