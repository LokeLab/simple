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
	<div class="col-lg-3">
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
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('email', Lang::get('users.email'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('email', $user_detail['email'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
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

								{{ Form::label('language',  Lang::get('navigation.languages'), array('class'=>'control-label')) }}:&nbsp;&nbsp;&nbsp;
								<br/><label class="radio-inline">
									{{ Form::radio('language', 'en', ($user_detail->language  == 'en' )) }} English
								</label>
								<label class="radio-inline">
									{{ Form::radio('language', 'it', ($user_detail->language == 'it' )) }} Italiano
								</label>
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
		{{ Form::label('access_code',  Lang::get('users.access_code'), array('class'=>'control-label')) }}
		{{ Form::text('access_code',  $user_detail['access_code'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.access_code'))) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('name',  $user_detail['name'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('surname',  $user_detail['surname'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.surname'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /> 
		{{ Form::text('company',  $user_detail['company'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.company'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
		{{ Form::text('phone',  $user_detail['phone'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.phone'))) }}
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
		{{ Form::textarea('note',  $user_detail['note'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.note'))) }}
		</div>
	</div>
</div> 
<hr/>
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('address',  Lang::get('users.address'), array('class'=>'control-label')) }}
		{{ Form::text('address',  $user_detail['address'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.address'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('city',  Lang::get('users.city'), array('class'=>'control-label')) }}
		{{ Form::text('city',  $user_detail['city'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.city'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('cap',  Lang::get('users.cap'), array('class'=>'control-label')) }}
		{{ Form::text('cap',  $user_detail['cap'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.cap'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}
		{{ Form::text('state',  $user_detail['state'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.state'))) }}
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('country',  Lang::get('users.country'), array('class'=>'control-label')) }}
		{{ Form::text('country',  $user_detail['country'], array('class'=>'form-control', 'placeholder'=>Lang::get('users.country'))) }}
		</div>
	</div>
</div> 



<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.update'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('users') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop