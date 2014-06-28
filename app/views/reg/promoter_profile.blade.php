@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		
		<div class="content registration">
			
			<div  class="col-lg-12"><img src="{{ url('/images/logo_mrquikode.png') }}" class='img-responsive' alt="logo" ></div>

			<div class="row">
				<div class="col-lg-12">
					<h1>{{Lang::get('users.regPrStep2');}}</h1>
				</div>
			</div>
			{{ Form::open(array('url' => 'reg_promoter_profile', 'method' => 'post', 'class' => 'login-form')) }}
			
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
					{{ Form::label('email',  Lang::get('users.email'), array('class'=>'control-label')) }}
					{{ Form::text('email',  $user_detail->email, array('class'=>'form-control')) }}
					</div>
				</div>
				
			</div> 
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					{{ Form::label('name',  Lang::get('users.name'), array('class'=>'control-label')) }}
					{{ Form::text('name',  $user_detail->name, array('class'=>'form-control')) }}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
					{{ Form::label('surname',  Lang::get('users.surname'), array('class'=>'control-label')) }}
					{{ Form::text('surname',  $user_detail->surname, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 
			


			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('company',  Lang::get('users.company'), array('class'=>'control-label')) }}
					{{ Form::text('company',  $user_detail->company, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('phone',  Lang::get('users.phone'), array('class'=>'control-label')) }}
					{{ Form::text('phone',  $user_detail->phone, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 

			<h3>{{Lang::get('users.address')}} </h3>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					
					{{ Form::text('address',  $user_detail->address, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 
			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">
					{{ Form::label('city',  Lang::get('users.city'), array('class'=>'control-label')) }}
					{{ Form::text('city',  $user_detail->city, array('class'=>'form-control')) }}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('cap',  Lang::get('users.cap'), array('class'=>'control-label')) }}
					{{ Form::text('cap',  $user_detail->cap, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 
			
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
					{{ Form::label('state',  Lang::get('users.state'), array('class'=>'control-label')) }}
					{{ Form::text('state',  $user_detail->state, array('class'=>'form-control')) }}
					</div>
				</div>
				<div class="col-lg-9">
					<div class="form-group">
					{{ Form::label('country',  Lang::get('users.country'), array('class'=>'control-label')) }}
					{{ Form::text('country',  $user_detail->country, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 
			

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('note',  Lang::get('users.note'), array('class'=>'control-label')) }}
					{{ Form::textarea('note',  $user_detail->note, array('class'=>'form-control')) }}
					</div>
				</div>
			</div> 

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						{{ Form::submit(Lang::get('users.NextStep2'),  array('class' =>'btn btn-success btn-large')) }}

					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>

</div>			

@stop