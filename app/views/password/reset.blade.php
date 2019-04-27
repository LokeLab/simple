@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		
		
			
			<div class="content">
				<div  class="col-lg-12">{{Config::get('app.site')}} </div>
				<h3 class="form-title">{{Lang::get('users.password_recovery') }}</h3>

				@include('includes.message')
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span>
						 {{ Lang::get('users.enter_username_password') }}
					</span>
				</div>
				

				<form action="{{ action('RemindersController@postReset') }}" method="POST" class="login-form">
					<input type="hidden" name="token" value="{{ $token }}">
					<div class="form-group">
					    {{ Form::label('email',  Lang::get('users.email') , array('class' => 'control-label ', 'placeholder' => 'Username', 'autocomplete' => 'off', 'name' => 'email'))  }}
					    <div class="input-icon">
							<i class="fa fa-envelope"></i>
							{{ Form::text('email', '', array('class'=>'form-control placeholder-no-fix')) }}
						</div>
					</div>
					<div class="form-group">
					{{ Form::label('password', Lang::get('users.password') , array('class' => 'control-label ' , 'placeholder' => 'Password' , 'autocomplete' => 'off','name' => 'password')) }}
					
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						{{ Form::password('password',  array('class'=>'form-control  placeholder-no-fix')) }}
					</div>
					<div class="form-group">
					{{ Form::label('password_confirmation', Lang::get('users.password_confirmation') , array('class' => 'control-label ' , 'placeholder' => 'Password' , 'autocomplete' => 'off','name' => 'password_confirmation')) }}
					
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						{{ Form::password('password_confirmation',  array('class'=>'form-control  placeholder-no-fix')) }}
					</div>
				</div>
				    <div class="form-group">
						<div class="form-actions">
							<label class="checkbox">
								<button type="submit" class="btn green pull-right">
									{{Lang::get('users.passwordReset') }} <i class="m-icon-swapright m-icon-white"></i>
								</button>
								</a>
								<br> 
							</label>
						</div>
						
					</div>
				</form>

					
				
			


			</div>

	</div>
</div>


@stop