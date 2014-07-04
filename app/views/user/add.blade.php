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
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('email', Lang::get('users.email')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('email', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('password',  Lang::get('users.password')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('password', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.password'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('role',  Lang::get('users.role')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::select('role', $roleList, 2, array('class' => 'form-control required')) }}
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('name',  Lang::get('users.name')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('name', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('surname',  Lang::get('users.surname')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('surname', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.surname'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('company',  Lang::get('users.company')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('company', '', array('class'=>'form-control required', 'placeholder'=>Lang::get('users.company'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('phone',  Lang::get('users.phone')) }}
		{{ Form::text('phone', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.phone'))) }}
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-3">
{{ Form::label('user_manager', 'Manager' ) }}
{{ Form::label('user_manager', '', array('class'=>'form-control')) }}
</div>
</div> 

<div class="row">
	<div class="col-lg-3">
{{ Form::label('agente', 'Agente' ) }}
{{ Form::label('agente', '', array('class'=>'form-control')) }}
</div>
</div> 

<div class="row">
	<div class="col-lg-3">
{{ Form::label('developer', 'Developer' ) }}
{{ Form::label('developer', '', array('class'=>'form-control')) }}
</div>
</div> 



<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('note',  Lang::get('users.note')) }}
		{{ Form::textarea('note', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.note'))) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('address',  Lang::get('users.address')) }}
		{{ Form::text('address', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.address'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('city',  Lang::get('users.city')) }}
		{{ Form::text('city', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.city'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('cap',  Lang::get('users.cap')) }}
		{{ Form::text('cap', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.cap'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('state',  Lang::get('users.state')) }}
		{{ Form::text('state', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.state'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('country',  Lang::get('users.country')) }}
		{{ Form::text('country', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.country'))) }}
		</div>
	</div>
</div> 
<hr/>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit('Salva',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop