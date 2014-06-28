@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">

			<div class="content">
				{{ Form::open(array('url' => 'login_process', 'method' => 'post', 'class' => 'login-form')) }}
				<div  class="col-lg-12"><img src="{{ url('/images/logo_mrquikode.png') }}" class='img-responsive' alt="logo" ></div>
				<div class="col-lg-12 text-right">
						<div class="form-group">
							<div class="form-actions">
								<label class="checkbox">
									<a class="btn " href="lang/en">
										<img src="../assets/img/flags/us.png" alt="English">
										
									</a> 
									<a class="btn " href="lang/it">
										<img src="../assets/img/flags/it.png" alt="Italiano">
										
									</a>
								</label>
							</div>
						</div>
					</div>
				<div class="col-lg-12 ">
					<h4 class="form-title">{{Lang::get('users.login_page') }}</h4>

					       <?php if($errors->has()): ?>
					        <div class="alert alert-danger">
					           <?php foreach ($errors->all() as $error): ?>
					              <span><?php echo $error; ?></span><br />
					            <?php endforeach; ?>
					          </div>
					        <?php endif; ?>
					        <?php if(Session::has('message')): ?>
					        <div class="alert alert-success">
					          <?php echo Session::get('message'); ?>
					        </div>
					        <?php endif; ?>
				</div>
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span>
						 {{ Lang::get('users.enter_username_password') }}
					</span>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('username',  Lang::get('users.email') , array('class' => 'control-label ', 'placeholder' => Lang::get('users.email') , 'autocomplete' => 'off', 'name' => 'username'))  }}
							<div class="input-icon">
								<i class="fa fa-envelope"></i>
								{{ Form::text('username', '', array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('users.email') , 'autocomplete' => 'off')) }}
							</div>
						</div>
					</div>
					<div class="col-lg-6">	
						<div class="form-group">
							{{ Form::label('password', Lang::get('users.password') , array('class' => 'control-label ' , 'placeholder' => Lang::get('users.password')  , 'autocomplete' => 'off','name' => 'password')) }}
							
							<div class="input-icon">
								<i class="fa fa-lock"></i>
								{{ Form::password('password',  array('class'=>'form-control  placeholder-no-fix', 'placeholder' => Lang::get('users.password') , 'autocomplete' => 'off')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 "></div>
					<div class="col-lg-6 ">
						<div class="form-group">
							<div class=" right">
								<label class="checkbox">
									<button type="submit" class="btn green pull-right">
									{{Lang::get('users.login') }} <i class="m-icon-swapright m-icon-white"></i>
									</button> 
								</label>
								<div class="dashboard-stat">
									<a href="/password/remind"  >
										{{Lang::get('users.recover_password') }} 
									</a>
								</div
							</div>
						</div>
					</div>
				</div>
				{{ Form::close() }}
				<div class="clearfix"></div>
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
				<div class="dashboard-stat blue">
					&nbsp;
				</div>
				<h4 class="form-title">{{ Lang::get('users.new_adv') }}</h4>
				{{ Form::open(array('url' => 'reg_adv_process', 'method' => 'post', 'class' => 'login-form')) }}
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('initial_code',  Lang::get('users.access_code') , array('class' => 'control-label ', 'placeholder' => Lang::get('users.access_code') , 'autocomplete' => 'off', 'name' => 'initial_code'))  }}
							<div class="input-icon blue">
								<i class="fa fa-lock"></i>
								{{ Form::text('initial_code', '', array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('users.access_code') , 'autocomplete' => 'off')) }}
							</div>
						</div>
					</div>

					<div class="col-lg-6">	
						<div class="form-group">
							{{ Form::label('email',  Lang::get('users.email_lc') , array('class' => 'control-label', 'placeholder' => Lang::get('users.email_lc') , 'autocomplete' => 'off', 'name' => 'email'))  }}
							<div class="input-icon blue">
								<i class="fa fa-envelope"></i>
								{{ Form::text('email', '', array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('users.email_lc') , 'autocomplete' => 'off'))}}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 left">
						
					</div>
					<div class="col-lg-6 ">
						<div class="form-group">
							<div class=" right">
								<label class="checkbox">
									<button type="submit" class="btn blue pull-right">
										{{ Lang::get('users.reg_first_access') }} <i class="m-icon-swapright m-icon-white"></i>
									</button>
								</label>
								<!--<div class="dashboard-stat">
									<a href="advSubscription"  >
										{{Lang::get('users.reg_adv') }} 
									</a>
								</div>-->
							</div>
						</div>
					</div>

					<div class="col-lg-12 ">
					<div class="form-group">
							
								<label class="checkbox">
									<h4>
										<a href="http://quikode.com/" target="_blank">{{Lang::get('users.discover_quikode') }}</a>
									</h4>
								</label>
						
						</div>
					</div>
				</div>
				{{ Form::close() }}
			
				<div class="dashboard-stat blue">
					&nbsp;
				</div>

				<div class="clearfix"></div>
						
			</div>

	</div>
</div>


@include('/includes/footer')
	
   

@stop