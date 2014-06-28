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
						<li> 
							<i class="fa fa-file"></i> {{Lang::get('users.license')}}: {{Decoder::decodeLicense($user_detail->license_id)}}
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
						@if($errors->has())
						<div class="alert alert-danger">
						   @foreach ($errors->all() as $error)
						      <span>{{ $error }}</span><br />
						  	@endforeach
						  </div>
						@endif
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
					</div>	
				<div class="row">
					<div class="col-lg-9">
						<div class="form-group">
						{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}
						{{ Form::text('company',  $user_detail->company, array('class'=>'form-control', 'placeholder'=>Lang::get('users.company'))) }}
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
						{{ Form::label('company_code',  Lang::get('users.company_code'), array('class'=>'control-label')) }}
						{{ Form::text('company_code',  $user_detail->company_code, array('class'=>'form-control', 'placeholder'=>Lang::get('users.company_code'))) }}
						</div>
					</div>
				</div> 

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
						{{ Form::text('phone',  $user_detail->phone, array('class'=>'form-control', 'placeholder'=>Lang::get('users.phone'))) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('fax',  Lang::get('users.fax'), array('class'=>'control-label')) }}
						{{ Form::text('fax',  $user_detail->fax, array('class'=>'form-control', 'placeholder'=>Lang::get('users.fax'))) }}
						</div>
					</div>
				</div> 
				
				<div class="row">
					<!--<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('email',  Lang::get('users.email'), array('class'=>'control-label')) }}
						{{ Form::label('email',  $user_detail->email, array('class'=>'form-control')) }}
						</div>
					</div>-->
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('web',  Lang::get('users.web'), array('class'=>'control-label')) }}
						{{ Form::text('web',  $user_detail->web, array('class'=>'form-control', 'placeholder'=>Lang::get('users.web'))) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('calltoaction',  Lang::get('offerts.title2'), array('class'=>'control-label')) }}
						{{ Form::text('calltoaction',  $user_detail->calltoaction, array('class'=>'form-control')) }}
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
					<div class="col-lg-3">
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
					<div class="col-lg-3">
						<div class="form-group">
						{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('state',  $user_detail->state, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.state'))) }}
						</div>
					</div>
					<div class="col-lg-3">
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
					<div class="col-lg-3">
						<div class="form-group">
						{{ Form::label('phone_reference',  Lang::get('users.phone_reference'), array('class'=>'control-label')) }}&nbsp;<img src="/images/required_star.gif" style="margin-bottom:5px;" />
						{{ Form::text('phone_reference',  $user_detail->phone_reference, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.phone_reference'))) }}
						</div>
					</div>
					<div class="col-lg-9">
						<div class="form-group">
						{{ Form::label('email_reference',  Lang::get('users.email_reference'), array('class'=>'control-label')) }}
						{{ Form::text('email_reference',  $user_detail->email_reference, array('class'=>'form-control', 'placeholder'=>Lang::get('users.email_reference'))) }}
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
					<div class="col-lg-6">
						@if( $user_detail->logo)
							<img src="/upload/logo/{{$user_detail->logo}}" width="180">
						@else
							{{Lang::get('generic.nologo')}}
						@endif
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('logo',  Lang::get('users.logo'), array('class'=>'control-label')) }}
						{{ Form::file('logo', array('class'=>'form-control')) }}
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
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('contract_from',  Lang::get('users.contract_from'), array('class'=>' control-label')) }}
						{{ Form::label('contract_from',  Decoder::convert_date_out($user_detail->contract_from), array('class'=>'form-control ', 'placeholder'=>Lang::get('users.contract_from'))) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						{{ Form::label('contract_to',  Lang::get('users.contract_to'), array('class'=>' control-label')) }}
						{{ Form::label('contract_to',  Decoder::convert_date_out($user_detail->contract_to), array('class'=>'form-control ', 'placeholder'=>Lang::get('users.contract_to'))) }}
						</div>
					</div>
				</div> 
		
			
				
			</div>
		</div>
	</div>
</div>	

{{ Form::close() }}
@stop