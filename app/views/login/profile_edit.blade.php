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

{{ Form::open(array('url' => 'update_profile',  'files' => true, 'method' => 'PUT',  'class' => 'form-horizontal form-row-seperated')) }}
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
						@include('includes.message')
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
							<h2>Number of staff employed by the organisation before the implementation of the project </h2>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('staffpermbefore',  Lang::get('users.staffpermbefore'), array('class'=>'control-label')) }} 
							{{ Form::text('staffpermbefore',  $user_detail['staffpermbefore'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.staffpermbefore'))) }}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('stafftempbefore',  Lang::get('users.stafftempbefore'), array('class'=>'control-label')) }} 
							{{ Form::text('stafftempbefore',  $user_detail['staffpermbefore'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.stafftempbefore'))) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<h2>Number of staff recruited by the organisation as a result of the implementation of the project </h2>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('staffpermafter',  Lang::get('users.staffpermafter'), array('class'=>'control-label')) }} 
							{{ Form::text('staffpermafter',  $user_detail['staffpermafter'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('stafftempafter',  Lang::get('users.stafftempafter'), array('class'=>'control-label')) }} 
							{{ Form::text('stafftempafter',  $user_detail['staffpermafter'], array('class'=>'form-control required', 'placeholder'=>Lang::get('users.stafftempafter'))) }}
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