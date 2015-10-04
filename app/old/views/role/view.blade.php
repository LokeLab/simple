@extends('template.internal')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('roles.roleview');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'role/'. $role_detail['id'], 'method' => 'GET')) }}

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('roles/'.$role_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('roles') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('roles.id')) }}: 
		{{ Form::label('id', $role_detail['id'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('description',  Lang::get('roles.description')) }}
		{{ Form::label('description',  $role_detail['description'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('update',  Lang::get('roles.update')) }}
		{{ Form::label('update',  $role_detail['update'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('roles/'.$role_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('roles') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop