<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user"></i>{{Lang::get('users.userview');}}
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
			<a href="javascript:;" class="reload">
			</a>
			<a href="javascript:;" class="remove">
			</a>
		</div>
	</div>
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
				
	{{ Form::open(array('url' => 'user/'. $user_detail['id'], 'method' => 'GET', 'class'=> 'horizontal-form')) }}
	<div class="form-body">
		<h3 class="form-section">{{Lang::get('users.persinfo');}}</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('username', Lang::get('users.username'), array('class'=>'control-label')) }}: 
					{{ Form::label('username', $user_detail['username'], array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_username');}}
					</span>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group ">
					
					{{ Form::label('role', Lang::get('users.role'), array('class'=>'control-label')) }}: 
					{{ Form::label('role', Role::getLabel($user_detail['role']), array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_role');}}
					</span>
				</div>
			</div>
			<!--/span-->
		</div>
		<!--/row-->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('name', Lang::get('users.name'), array('class'=>'control-label')) }}: 
					{{ Form::label('name', $user_detail['name'], array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_name');}}
					</span>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('surname', Lang::get('users.surname'), array('class'=>'control-label')) }}: 
					{{ Form::label('surname', $user_detail['surname'], array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_surname');}}
					</span>
				</div>
			</div>
			<!--/span-->
		</div>

		

		<h3 class="form-section">{{Lang::get('users.contacts');}}</h3>
		<div class="row">
			
			<!--/span-->
			<div class="col-md-12">
				<div class="form-group">
					{{ Form::label('email', Lang::get('users.email'), array('class'=>'control-label')) }}: 
					{{ Form::label('email', $user_detail['email'], array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_email');}}
					</span>
				</div>
			</div>
			<!--/span-->
		</div>
		<!--/row-->
		
						
						
		<div class="row">
			<div class="col-md-12 ">
				<div class="form-group">
					{{ Form::label('note', Lang::get('users.note'), array('class'=>'control-label')) }}: 
					{{ Form::label('note', $user_detail['note'], array('class'=>'form-control')) }}
					<span class="help-block">
						 {{Lang::get('users.h_note');}}
					</span>
				</div>
				
			</div>
		</div>

<div class="row">
	<div class="col-lg-3">
{{ Form::label('access_code', 'Piano strategico' ) }}
{{ Form::label('access_code', $user_detail['access_code'], array('class'=>'form-control')) }}
</div>

		<div class="row">
	<div class="col-lg-3">
{{ Form::label('user_manager', 'Manager' ) }}
{{ Form::label('user_manager', $user_detail['user_manager'], array('class'=>'form-control')) }}
</div>



	<div class="col-lg-3">
{{ Form::label('agente', 'Agente' ) }}
{{ Form::label('agente', $user_detail['agente'], array('class'=>'form-control')) }}
</div>

	<div class="col-lg-3">
{{ Form::label('developer', 'Developer' ) }}
{{ Form::label('developer', $user_detail['developer'], array('class'=>'form-control')) }}
</div>
</div> 

	</div>
</div>				