@extends('template.internal')

@section('content')

@include('login.profile_breadcrumb')



		
				


{{ Form::open(array('url' => 'update_adv_profile', 'method' => 'PUT', 'class' => 'form-horizontal form-row-seperated')) }}
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
					<a href="{{ url('profile/edit') }}" class="btn green" ><i class="fa fa-edit"></i>&nbsp;{{Lang::get('generic.edit');}} </a>
					
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			
				
<div class="portlet box blue tabbable">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>{{Lang::get('users.myprofile')}}
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable portlet-tabs">
			<ul class="nav nav-tabs">
				<li class="">
					<a href="#portlet_tab_3" data-toggle="tab">
						 {{Lang::get('users.documents_related')}}
					</a>
				</li>
				<li class="">
					<a href="#portlet_tab_2" data-toggle="tab">
						 {{Lang::get('users.reference')}}
					</a>
				</li>
				<li class="active">
					<a href="#portlet_tab_1" data-toggle="tab">
						 {{Lang::get('users.company_info')}}
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="portlet_tab_1">
					
					<div class="row">
						<div class="col-lg-5">
							<div class="form-group">
							{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}
							{{ Form::label('company',  $user_detail->company, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
							{{ Form::label('company_code',  Lang::get('users.company_code'), array('class'=>'control-label')) }}
							{{ Form::label('company_code',  $user_detail->company_code, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3 col-mg-3">
								@if(  $user_detail->logo)
									<img src="/upload/logo/{{$user_detail->logo}}" width="180">
								@else
									{{Lang::get('generic.nologo')}}
								@endif
						</div>
					</div> 

					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
							{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
							{{ Form::label('phone',  $user_detail->phone, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('fax',  Lang::get('users.fax'), array('class'=>'control-label')) }}
							{{ Form::label('fax',  $user_detail->fax, array('class'=>'form-control')) }}
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
						<div class="col-lg-7">
							<div class="form-group">
							{{ Form::label('web',  Lang::get('users.web'), array('class'=>'control-label')) }}
							{{ Form::label('web',  $user_detail->web, array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 

					<h3>{{Lang::get('users.address')}}</h3>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							
							{{ Form::label('address',  $user_detail->address, array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('city',  Lang::get('users.city'), array('class'=>'control-label')) }}
							{{ Form::label('city',  $user_detail->city, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('cap',  Lang::get('users.cap'), array('class'=>'control-label')) }}
							{{ Form::label('cap',  $user_detail->cap, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}
							{{ Form::label('state',  $user_detail->state, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('country',  Lang::get('users.country'), array('class'=>'control-label')) }}
							{{ Form::label('country',  $user_detail->country, array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							{{ Form::label('company_description',  Lang::get('users.company_description'), array('class'=>'control-label')) }}
							{{ Form::label('company_description',  $user_detail->company_description, array('class'=>'form-control')) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
							{{ Form::label('note',  $user_detail->note, array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('contract_from',  Lang::get('users.contract_from'), array('class'=>' control-label')) }}
							{{ Form::label('contract_from',  Decoder::convert_date_out($user_detail->contract_from), array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('contract_to',  Lang::get('users.contract_to'), array('class'=>' control-label')) }}
							{{ Form::label('contract_to',  Decoder::convert_date_out($user_detail->contract_to), array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
	
				</div>
				<div class="tab-pane" id="portlet_tab_2">
					<h3>{{Lang::get('users.reference')}}</h3>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
								{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}
								{{ Form::label('name',  $user_detail->name, array('class'=>'form-control')) }}
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
								{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}
								{{ Form::label('surname',  $user_detail->surname, array('class'=>'form-control')) }}
								</div>
							</div>
						</div> 
						
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
								{{ Form::label('phone_reference',  Lang::get('users.phone_reference'), array('class'=>'control-label')) }}
								{{ Form::label('phone_reference',  $user_detail->phone_reference, array('class'=>'form-control')) }}
								</div>
							</div>
							<div class="col-lg-9">
								<div class="form-group">
								{{ Form::label('email_reference',  Lang::get('users.email_reference'), array('class'=>'control-label')) }}
								{{ Form::label('email_reference',  $user_detail->email_reference, array('class'=>'form-control')) }}
								</div>
							</div>
						</div> 
				</div>
				<div class="tab-pane" id="portlet_tab_3">
					@include('customer.docs')
				</div>
			</div>
		</div>
	</div>
</div>
			

				
				
				
				
				
			</div>
		</div>
	</div>
</div>	


{{ Form::close() }}
@stop