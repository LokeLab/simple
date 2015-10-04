@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM
<?php echo $errors->first('email'); ?>
-->
	<div class="form-body">
		
			<div class="content">
				<div  class="col-lg-12">Report AV PN</div>
			{{ Form::open(array('url' => 'reg_promoter_process', 'method' => 'POST', 'class' => 'login-form')) }}


			<h3 class="form-title">{{ Lang::get('users.step_1_reg_pr') }}</h3>
			@if($errors->has())
			<div class="alert alert-danger">
			   @foreach ($errors->all() as $error)
			      <span>{{ $error }}</span><br />
			  	@endforeach
			  </div>
			@endif
			<div class="form-group">
				{{ Form::label('initial_code',  Lang::get('users.access_code') , array('class' => 'control-label ', 'placeholder' => Lang::get('users.access_code') , 'autocomplete' => 'off', 'name' => 'username'))  }}
				<div class="input-icon">
					<i class="fa fa-key"></i>
					{{ Form::text('initial_code', '', array('class'=>'form-control placeholder-no-fix')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('email',  Lang::get('users.email') , array('class' => 'control-label ', 'placeholder' => Lang::get('users.email') , 'autocomplete' => 'off', 'name' => 'username'))  }}
				<div class="input-icon">
					<i class="fa fa-envelope"></i>
					{{ Form::text('email', '', array('class'=>'form-control placeholder-no-fix')) }}
				</div>
			</div>

			
			<div class="form-group">
				
				<div class="form-actions">
					<label class="checkbox">
						<button type="submit" class="btn green pull-right">
						{{ Lang::get('users.reg_next') }} <i class="m-icon-swapright m-icon-white"></i>
						</button>
						<br> 
					</label>
				</div>
				
			</div>


			
		{{ Form::close() }}
	<div class="clearfix"></div>
<a href="/login" class="btn btn-success green btn-large">{{Lang::get('users.backToLoginInReg');}}</a>
				
			<div class="clearfix"></div>
					
			
	</div>
</div>


@stop