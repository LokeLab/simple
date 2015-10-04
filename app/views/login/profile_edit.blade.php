@extends('template.internal')
@section('content')
<!--
<div class="row">
	<div class="col-lg-12">
		<h1>{{Lang::get('users.myprofile');}}</h1>
	</div>
</div>
-->
@include('login.profile_breadcrumb')

{{ Form::open(array('url' => 'update_pr_profile',  'files' => true, 'method' => 'PUT',  'class' => 'form-horizontal form-row-seperated')) }}
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<!--BEGIN SAVE MENU -->
			<div class="portlet-title">
				<div class="caption ">
					<ul class="list-inline">
						<li>
							<i class="fa fa-info-circle"></i> {{Session::get('nameComplete')}}
						</li>
						<li>
							<i class="fa fa-envelope"></i> {{Lang::get('users.email')}}: {{$user_detail->email }}
						</li>
					</ul>
				</div>
				<div class="actions btn-set">
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('profile') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
				</div>
			</div>
			<div class="portlet-title">
				<div class="caption ">
					<ul class="list-inline">
						
						<li> 
							<i class="fa fa-sitemap"></i> {{Lang::get('users.role')}}: {{ Decoder::decodeRole(Session::get('userrole')) }}
						</li>
					</ul>
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					<div class="row">
						@if($errors->has())
						<div class="alert alert-danger">
						   @foreach ($errors->all() as $error)
						      <span>{{ $error }}</span><br />
						  	@endforeach
						  </div>
						@endif
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								{{ Form::label('password',  Lang::get('users.passwordmodify'), array('class'=>'control-label')) }}
								{{ Form::password('password',  '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.passwordmodify'))) }}

								{{ Form::label('confirm',  Lang::get('users.password_confirmation'), array('class'=>'control-label')) }}
								{{ Form::password('confirm', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.password_confirmation'))) }}
							</div>
						</div>
						
						
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }} &nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;">
							{{ Form::text('name',  $user_detail['name'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }} &nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;">
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
				</div>
			</div>
			<!--END EDIT FORM -->
		</div>
	</div>
</div>

{{ Form::close() }}
@stop