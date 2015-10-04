@extends('template.login')

@section('content')
<style>
.form-body{

	margin-top:50px;
}

</style>
<div class="portlet-body form">
	<!-- BEGIN FORM-->

	<div class="form-body">

			<div class="content text-center">
				{{ Form::open(array('url' => 'login_process', 'method' => 'post', 'class' => 'login-form')) }}
			
				<div class="col-lg-12 ">
					<h4 class="form-title">Log in</h4>

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
				<div class="alert alert-danger display-hide text-center">
					 
					<span>
						 Insert username and password
					</span>
				</div>
				
				<div class="row text-left">
					<div class="col-lg-12">
						<div class="form-group">
							{{ Form::label('username',  Lang::get('users.email') , array('class' => 'control-label '))  }}
							<div class="input-icon">
								<i class="fa fa-envelope"></i>
								{{ Form::text('username', '', array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('users.email')  )) }}
							</div>
						</div>
					</div>
					<div class="col-lg-12">	
						<div class="form-group">
							{{ Form::label('password', Lang::get('users.password') , array('class' => 'control-label ' )) }}
							
							<div class="input-icon">
								<i class="fa fa-lock"></i>
								{{ Form::password('password',  array('class'=>'form-control  placeholder-no-fix', 'placeholder' => Lang::get('users.password') )) }}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 "></div>
					<div class="col-lg-6 ">
						
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
								</div>
							</div>
						
					</div>
				</div>
				{{ Form::close() }}
				<div class="clearfix"></div>
		
			</div>

	</div>
</div>


@include('/includes/footer')
	
   

@stop