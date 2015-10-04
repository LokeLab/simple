<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user"></i>{{Lang::get('users.t_accessData');}}
		</div>
		
	</div>
	<div class="portlet-body form">

		
					
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				{{ Form::label('lastlogin_at',  Lang::get('users.lastlogin_at')) }}
				{{ Form::label('lastlogin_at',  $user_detail['lastlogin_at'], array('class'=>'form-control')) }}
				</div>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				{{ Form::label('try_wrong_login',  Lang::get('users.try_wrong_login')) }}
				{{ Form::label('try_wrong_login',  $user_detail['try_wrong_login'], array('class'=>'form-control')) }}
				</div>
			</div>
		</div>-->
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				{{ Form::label('active',  Lang::get('users.active')) }}
				{{ Form::label('active',  Decoder::decodeYN($user_detail['active']), array('class'=>'form-control')) }}
				</div>
			</div>
		</div>
	</div>
</div>