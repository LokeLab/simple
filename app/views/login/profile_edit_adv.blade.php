@extends('template.internal')

@section('content')

@include('login.profile_breadcrumb')

{{ Form::open(array('url' => 'update_adv_profile',  'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal form-row-seperated')) }}
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
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			
				
				<div class="form-group">
						@include('includes.message')
					</div>

				<h1>{{Lang::get('users.myprofile');}}</h1>
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
					<div class="col-lg-12">
						<div class="form-group">
						{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
						{{ Form::textarea('note',  $user_detail->note, array('class'=>'form-control', 'placeholder'=>Lang::get('users.note'))) }}
						</div>
					</div>
				</div> 
				
		
			
				
			</div>
		</div>
	</div>
</div>	

{{ Form::close() }}
@stop