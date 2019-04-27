@extends('template.internal')

@section('content')
@include('budget.list_breadcrumb')

{{ Form::open(array('url' => 'budget/'. $role_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
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
							<i class="fa fa-money"></i> {{Budget::getNumberofCostInRow($role_detail['id'])}}
						</li>
						
					</ul>
				</div>
				<div class="actions btn-set">
					<a href="{{ url('budget') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('budget/'.$role_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					@include('includes.message')
					<div class="form-group">
						<label class="col-md-2 control-label">{{Lang::get('budget.description')}}:
							<span class="required">
								 *
							</span>
						</label>
						<div class="col-md-10">
							{{ Form::text('description', $role_detail['description'], array('class'=>'form-control', 'placeholder'=>Lang::get('budget.insertdescription'))) }}
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