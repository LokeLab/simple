@extends('template.internal')
@section('content')

@include('user.edit_breadcrumb')

<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('users.modifyuser');}}</h1>
	</div>
</div>
{{ Form::open(array('url' => 'users/'. $user_detail->id.'/edit', 'method' => 'PUT')) }}
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
@include('includes.message')
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('email', Lang::get('users.email'), array('class'=>'control-label')) }} 
		{{ Form::text('email', $user_detail['email'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('password',  Lang::get('users.passwordmodify'), array('class'=>'control-label')) }}
		{{ Form::password('password', '', array('class'=>'form-control')) }}
		{{ Form::label('confirm',  Lang::get('users.password_confirmation'), array('class'=>'control-label')) }}
		{{ Form::password('confirm', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.password_confirmation'))) }}
		</div>
	</div>
</div> 


				
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('role',  Lang::get('users.role'), array('class'=>'control-label')) }}
		{{ Form::select('role', $roleList , $user_detail->role , array('class'=>'form-control')) }} 
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('partner',  'Partner', array('class'=>'control-label')) }}
		{{ Form::select('partner', $partnerList , $user_detail->partner , array('class'=>'form-control')) }} 
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
		{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }} 
		{{ Form::text('name',  $user_detail['name'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
		{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }} 
		{{ Form::text('surname',  $user_detail['surname'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.surname'))) }}
		</div>
	</div>
</div> 



<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
		{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
		{{ Form::textarea('note',  $user_detail['note'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.note'))) }}
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