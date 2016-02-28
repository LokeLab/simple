@extends('template.internal')
@section('content')
<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('users.adduser');}}</h1>
	</div>
</div>

{{ Form::open(array('url' => 'users', 'method' => 'POST')) }}
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
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('email', Lang::get('users.email')) }} 
		{{ Form::text('email', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('password',  Lang::get('users.password')) }} 
		{{ Form::text('password', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.password'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('role',  Lang::get('users.role')) }} 
		{{ Form::select('role', $roleList, 2, array('class' => 'form-control required')) }}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('partner',  'Partner', array('class'=>'control-label')) }}
		{{ Form::select('partner', $partnerList , '' , array('class'=>'form-control')) }} 
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('name',  Lang::get('users.name')) }} 
		{{ Form::text('name', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('surname',  Lang::get('users.surname')) }} 
		{{ Form::text('surname', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.surname'))) }}
		</div>
	</div>
</div> 



<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::submit('Save',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop