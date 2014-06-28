@extends('template.login')
@section('content')

	
	<div class="content">
		<div  class="col-lg-12"><img src="{{ url('/images/logo_mrquikode.png') }}" class='img-responsive' alt="logo" ></div>
	{{ Form::open(array('url' => 'reg_adv_process', 'method' => 'post', 'class' => 'login-form')) }}
	<h3 class="form-title">{{ Lang::get('users.step_1_reg_adv') }}</h3>

	@if($errors->has())
	<div class="alert alert-danger">
	   @foreach ($errors->all() as $error)
	      <span>{{ $error }}</span><br />
	  	@endforeach
	  </div>
	@endif
	
		
	<div class="form-group">
		{{ Form::label('initial_code',  Lang::get('users.access_code') , array('class' => 'control-label ', 'placeholder' => 'Username', 'autocomplete' => 'off', 'name' => 'username'))  }}
		<div class="input-icon">
			<i class="fa fa-lock"></i>
			{{ Form::text('initial_code', '', array('class'=>'form-control placeholder-no-fix')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email',  Lang::get('users.email') , array('class' => 'control-label', 'placeholder' => 'Username', 'autocomplete' => 'off', 'name' => 'username'))  }}
		<div class="input-icon">
			<i class="fa fa-envelope"></i>
			{{ Form::text('email', '', array('class'=>'form-control placeholder-no-fix')) }}
		</div>
	</div>

	
	<div class="form-group">
		
		<div class="form-actions">
			<label class="checkbox">
				<button type="submit" class="btn blue pull-right">
				{{ Lang::get('users.reg_next') }} <i class="m-icon-swapright m-icon-white"></i>
				</button>
				<br> 
			</label>
		</div>
		
	</div>


	
{{ Form::close() }}
	<div class="clearfix"></div>
<a href="/login" class="btn btn-success blue btn-large">{{Lang::get('users.backToLoginInReg');}}</a>
		
	<div class="clearfix"></div>
			
	<div class="login-options">

			<h4><a href="http://quikode.com/" target="_blank">{{Lang::get('users.discover_quikode') }}</a></h4>
	</div>




@stop