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