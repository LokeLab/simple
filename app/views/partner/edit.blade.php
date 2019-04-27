@extends('template.internal')

@section('content')
@include('partner.edit_breadcrumb')

{{ Form::open(array('url' => 'partners/'. $role_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
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
					<a href="{{ url('partners') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('partners/'.$role_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					@include('includes.message')
					<div class="form-group">
						<label class="col-md-2 control-label">{{Lang::get('partners.description')}}:
							<span class="required">
								 *
							</span>
						</label>
						<div class="col-md-10">
							{{ Form::text('description', $role_detail['description'], array('class'=>'form-control', 'placeholder'=>'Inserire una descrizione')) }}
						</div>
					</div>
					<!--<div class="form-group">
						{{ Form::label('update',  Lang::get('partners.update'), array('class' =>'col-md-2 control-labele')) }}
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