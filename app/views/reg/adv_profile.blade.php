@extends('template.login')

@section('content')


	
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
		<div class="form-body">
			
			<div class="content registration">
				<div  class="col-lg-12">{{Config::get('app.site')}} </div>
				<h1>{{Lang::get('users.regAdvStep2');}}</h1>
				{{ Form::open(array('url' => 'reg_adv_profile', 'method' => 'post', 'class' => 'login-form')) }}
				
				@if($errors->has())
				<div class="alert alert-danger">
				   @foreach ($errors->all() as $error)
				      <span>{{ $error }}</span><br />
				  	@endforeach
				  </div>
				@endif
				<div class="row">
				<div class="col-lg-12">
						<div class="form-group">
						{{ Form::label('email',  Lang::get('users.email'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::label('email',  $user_detail->email, array('class'=>'form-control required')) }}
						{{Form::hidden('email',  $user_detail->email)}}
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{{ Form::label('password',  Lang::get('users.password'), array('class'=>'control-label')) }}
				</div>
				<div class="col-lg-6">
					{{ Form::password('password',  '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.passwordmodify'))) }}
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{{ Form::label('confirm',  Lang::get('users.password_confirmation'), array('class'=>'control-label')) }}
				</div><div class="col-lg-6">
					{{ Form::password('confirm', '', array('class'=>'form-control', 'placeholder'=>Lang::get('users.password_confirmation'))) }}
				</div>
			</div>
					
						
						
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
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('license',  Lang::get('users.license'), array('class'=>'control-label')) }}
						{{ Form::label('license',  Decoder::decodeLicense($user_detail->license_id), array('class'=>'form-control')) }}
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('company',  $user_detail->company, array('class'=>'form-control required')) }}
						</div>
					</div>
					
				</div> 

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('phone',  $user_detail->phone, array('class'=>'form-control required')) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('fax',  Lang::get('users.fax'), array('class'=>'control-label')) }}
						{{ Form::text('fax',  $user_detail->fax, array('class'=>'form-control')) }}
						</div>
					</div>
				</div> 
				
				<div class="row">
					
					<div class="col-lg-12">
						<div class="form-group">
						{{ Form::label('web',  Lang::get('users.web'), array('class'=>'control-label')) }}
						{{ Form::text('web',  $user_detail->web, array('class'=>'form-control')) }}
						</div>
					</div>
				</div> 

				<h3>{{Lang::get('users.address')}}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" /></h3>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						
						{{ Form::text('address',  $user_detail->address, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.address'))) }}
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-9">
						<div class="form-group">
						{{ Form::label('city',  Lang::get('users.city'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('city',  $user_detail->city, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.city'))) }}
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
						{{ Form::label('cap',  Lang::get('users.cap'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('cap',  $user_detail->cap, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.cap'))) }}
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
						{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('state',  $user_detail->state, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.state'))) }}
						</div>
					</div>
					<div class="col-lg-9">
						<div class="form-group">
						{{ Form::label('country',  Lang::get('users.country'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('country',  $user_detail->country, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.country'))) }}
						</div>
					</div>
				</div> 
				

			<h3>{{Lang::get('users.reference')}}</h3>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('name',  $user_detail->name, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.name'))) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('surname',  $user_detail->surname, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.surname'))) }}
						</div>
					</div>
				</div> 
				
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('phone_reference',  Lang::get('users.phone_reference'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('phone_reference',  $user_detail->phone_reference, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.phone_reference'))) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('email_reference',  Lang::get('users.email_reference'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('email_reference',  $user_detail->email_reference, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email_reference'))) }}
						</div>
					</div>
				</div> 

				
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						{{ Form::label('company_description',  Lang::get('users.company_description'), array('class'=>'control-label')) }}
						{{ Form::textarea('company_description',  $user_detail->company_description, array('class'=>'form-control', 'placeholder'=>Lang::get('users.company_description'))) }}
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
				
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							{{ Form::submit(Lang::get('users.NextStep2'),  array('class' =>'btn btn-success blue btn-large')) }}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
{{ Form::close() }}
@stop