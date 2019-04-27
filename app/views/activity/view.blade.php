@extends('template.internal')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('activities.activitiesview');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'activities/'. $activities_detail['id'], 'method' => 'GET')) }}

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('activities/'.$activities_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('activities') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('activities.id')) }}: 
		{{ Form::label('id', $activities_detail['id'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('description',  Lang::get('activities.description')) }}
		{{ Form::label('description',  $activities_detail['description'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('update',  Lang::get('activities.update')) }}
		{{ Form::label('update',  $activities_detail['update'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('activities/'.$activities_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('activities') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop