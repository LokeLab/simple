@extends('template.internal')
@section('content')
<!--
<div class="row">
	<div class="col-lg-12">
		<h1>{{Lang::get('users.myprofile');}}</h1>
	</div>
</div>
-->
@include('login.profile_breadcrumb')

{{ Form::open(array('url' => 'update_pr_profile',  'files' => true, 'method' => 'PUT',  'class' => 'form-horizontal form-row-seperated')) }}
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
					<a href="{{ url('profile/edit') }}" class="btn green" ><i class="fa fa-edit"></i>&nbsp;{{Lang::get('generic.edit');}} </a>
					
				</div>
			</div>
			<div class="portlet-title">
				<div class="caption ">
					<ul class="list-inline">
						<li> 
							<i class="fa fa-file"></i> {{Lang::get('users.access_code')}}: {{$user_detail->access_code }}
						</li>
						<li> 
							<i class="fa fa-sitemap"></i> {{Lang::get('users.role')}}: {{ Decoder::decodeRole(Session::get('userrole')) }}
						</li>
					</ul>
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					<div class="row">
						@if($errors->has())
						<div class="alert alert-danger">
						   @foreach ($errors->all() as $error)
						      <span>{{ $error }}</span><br />
						  	@endforeach
						  </div>
						@endif
					</div>
					
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
							{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}
							{{ Form::label('name',  $user_detail['name'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
							{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}
							{{ Form::label('surname',  $user_detail['surname'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-4">
							@if( $user_detail['logo'])
								<img src="/upload/logo/{{$user_detail['logo']}}" width="180">
							@else
								{{Lang::get('generic.nologo')}}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}
							{{ Form::label('company',  $user_detail['company'], array('class'=>'form-control')) }}
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
							{{ Form::label('phone',  $user_detail['phone'], array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 


					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							{{ Form::label('address',  Lang::get('users.address'), array('class'=>'control-label')) }}
							{{ Form::label('address',  $user_detail['address'], array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('city',  Lang::get('users.city'), array('class'=>'control-label')) }}
							{{ Form::label('city',  $user_detail['city'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('cap',  Lang::get('users.cap'), array('class'=>'control-label')) }}
							{{ Form::label('cap',  $user_detail['cap'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}
							{{ Form::label('state',  $user_detail['state'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
							{{ Form::label('country',  Lang::get('users.country'), array('class'=>'control-label')) }}
							{{ Form::label('country',  $user_detail['country'], array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
					
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
							{{ Form::label('note',  $user_detail['note'], array('class'=>'form-control')) }}
							</div>
						</div>
					</div> 
				</div>
			</div>
			<!--END EDIT FORM -->
		</div>
	</div>
</div>

{{ Form::close() }}
@stop