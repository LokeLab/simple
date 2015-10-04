@extends('template.internal')

@section('content')
@include('frequenze.edit_breadcrumb')

{{ Form::open(array('url' => 'frequenze/'. $role_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<!--BEGIN SAVE MENU -->
			<div class="portlet-title">
				<div class="caption ">
					<ul class="list-inline">
						<li>
							<i class="fa fa-barcode"></i> {{$role_detail['id'] }}
						</li>
						<li>
							<i class="fa fa-pencil"></i> {{$role_detail['description'] }}
						</li>
						<li> 
							<i class="fa fa-users"></i> {{User::getNumberofUsersInRole($role_detail['id'])}}
						</li>
						<li>
							<i class="fa fa-power-off"></i> {{ Decoder::decodeYN($role_detail['update']) }}
								
						</li>
					</ul>
				</div>
				<div class="actions btn-set">
					<a href="{{ url('roles') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('roles/'.$role_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif
					<div class="form-group">
						<label class="col-md-2 control-label">{{Lang::get('roles.description')}}:
							<span class="required">
								 *
							</span>
						</label>
						<div class="col-md-10">
							{{ Form::text('description', $role_detail['description'], array('class'=>'form-control', 'placeholder'=>'Inserire una descrizione')) }}
						</div>
					</div>
					<!--<div class="form-group">
						{{ Form::label('update',  Lang::get('roles.update'), array('class' =>'col-md-2 control-labele')) }}
						<span class="required">
							 *
						</span>
						<div class="col-md-10">
							{{ Form::text('update', $role_detail['update'], array('class'=>'form-control', 'placeholder'=>'Inserire una descrizione')) }}
						</div>
					</div>-->
				</div>
			</div>
			<!--END EDIT FORM -->
		</div>
	</div>
</div>
{{ Form::close() }}
	
@stop