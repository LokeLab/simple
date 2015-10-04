@extends('template.internal')
@section('content')

@include('user.edit_breadcrumb')

<div class="row">
	<div class="col-lg-10">
		<h1>{{Lang::get('users.modifyuser');}}</h1>
	</div>
</div>
{{ Form::open(array('url' => 'users/'. $user_detail->id, 'method' => 'GET')) }}
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('username', Lang::get('users.username'), array('class'=>'control-label')) }}: 
		{{ Form::text('username', $user_detail['username'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('password',  Lang::get('users.passwordmodify'), array('class'=>'control-label')) }}
		{{ Form::text('password', '', array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('role',  Lang::get('users.role'), array('class'=>'control-label')) }}
		{{ Form::select('role', $roleList , $user_detail->role , array('class'=>'form-control')) }} 
		</div>
	</div>
</div> 


<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}
		{{ Form::text('name',  $user_detail['name'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}
		{{ Form::text('surname',  $user_detail['surname'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
		{{ Form::text('phone',  $user_detail['phone'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('email',  Lang::get('users.email'), array('class'=>'control-label')) }}
		{{ Form::text('email',  $user_detail['email'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
		{{ Form::textarea('note',  $user_detail['note'], array('class'=>'form-control')) }}
		</div>
	</div>
</div> 
<hr/>
<
<hr/>
<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('lastlogin_at',  Lang::get('users.lastlogin_at'), array('class'=>'control-label')) }}
		{{ Form::text('lastlogin_at',  $user_detail['lastlogin_at'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
		{{ Form::label('active',  Lang::get('users.active'), array('class'=>'control-label')) }}
		{{ Form::text('active',  $user_detail['active'], array('class'=>'form-control')) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			
		</div>
	</div>
</div>
{{ Form::close() }}
@stop