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
						
						
					</ul>
				</div>
				<div class="actions btn-set">
					<a href="{{ url('profile/edit') }}" class="btn green" ><i class="fa fa-edit"></i>&nbsp;{{Lang::get('generic.edit');}} </a>
					
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			
				
	

				
				
				
				
				
			</div>
		</div>
	</div>
</div>	


{{ Form::close() }}
@stop