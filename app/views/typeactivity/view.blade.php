@extends('template.internal')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('typeactivity.typeactivityview');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'typeactivity/'. $typeactivity_detail['id'], 'method' => 'GET')) }}

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('typeactivity/'.$typeactivity_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('typeactivity') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('typeactivity.id')) }}: 
		{{ Form::label('id', $typeactivity_detail['id'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('description',  Lang::get('typeactivity.description')) }}
		{{ Form::label('description',  $typeactivity_detail['description'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('update',  Lang::get('typeactivity.update')) }}
		{{ Form::label('update',  $typeactivity_detail['update'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<a href="{{ url('typeactivity/'.$typeactivity_detail['id'].'/edit') }}" class="btn btn-success btn-large">{{Lang::get('generic.modify');}}</a>
			&nbsp;
			<a href="{{ url('typeactivity') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop