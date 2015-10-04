@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		
		
			
			<div class="content">
				<div  class="col-lg-12">{{Config::get('app.site')}} </div>
				<h3 class="form-title">{{Lang::get('users.password_recovery') }}</h3>
				<p>{{Lang::get('users.password_recovery_subtitle')}} </p>

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
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span>
						 {{ Lang::get('users.enter_username_password') }}
					</span>
				</div>
				

				<form action="{{ action('RemindersController@postRemind') }}" method="POST" class="login-form">
				    {{ Form::label('email',  Lang::get('users.email') , array('class' => 'control-label ', 'placeholder' => 'Username', 'autocomplete' => 'off', 'name' => 'email'))  }}
				    <div class="input-icon">
						<i class="fa fa-envelope"></i>
						{{ Form::text('email', '', array('class'=>'form-control placeholder-no-fix')) }}
					</div>
				    <!--<input type="email" name="email">
				    <input type="submit" value="Send Reminder">-->
				    <div class="form-group">
						<div class="form-actions">
							<label class="checkbox">
								<button type="submit" class="btn green  ">
									{{Lang::get('users.passwordRecovery') }} <i class="m-icon-swapright m-icon-white"></i>
								</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="/login"  class="btn blue" >
									{{Lang::get('users.login_back') }} <i class="fa fa-key"></i>
								</a>
								
								 
							</label>
						</div>
						
					</div>
				</form>
			

			</div>

	</div>
</div>


@stop