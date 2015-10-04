@extends('template.internal')
@section('content')

@include('frequenze.edit_breadcrumb')

<div class="row">
	<div class="col-lg-10">
		<h1>Frequenza</h1>
	</div>
</div>
{{ Form::open(array('url' => 'frequenze/'. $user_detail->id.'', 'method' => 'PUT')) }}
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
@if($errors->has())
<div class="alert alert-danger">
   @foreach ($errors->all() as $error)
      <span>{{ $error }}</span><br />
  	@endforeach
  </div>
@endif
@if(Session::has('message'))
<div class="alert alert-success">
	{{Session::get('message')}}
</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('orario', 'Orario', array('class'=>'control-label')) }} 
		{{  $user_detail['orario'] }}:00 - {{  $user_detail['orario'] +1 }}:00
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('sistema',  'Messaggio da sistema', array('class'=>'control-label')) }} 
		{{ Form::text('sistema',  $user_detail['sistema'], array('class'=>'form-control required', 'placeholder'=>'Messaggio')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('giri',  'Giri massimi', array('class'=>'control-label')) }} 
		{{ Form::text('giri',  $user_detail['giri'], array('class'=>'form-control required', 'placeholder'=>'Giri')) }}
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('freq',  'Frequenza vincita', array('class'=>'control-label')) }} 
		{{ Form::text('freq',  $user_detail['freq'], array('class'=>'form-control required', 'placeholder'=>'Frequenza')) }}
		</div>
	</div>
</div> 


<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop