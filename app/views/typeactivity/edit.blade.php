@extends('template.internal')

@section('content')
@include('typeactivity.edit_breadcrumb')

{{ Form::open(array('url' => 'typeactivity/'. $typeactivity_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<!--BEGIN SAVE MENU -->
			<div class="portlet-title">
				
				<div class="actions btn-set">
					<a href="{{ url('typeactivity') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('typeactivity/'.$typeactivity_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					@include('includes.message')
					<div class="form-group">
						<label class="col-md-2 control-label">{{Lang::get('typeactivity.description')}}:
							<span class="required">
								 *
							</span>
						</label>
						<div class="col-md-10">
							{{ Form::text('description', $typeactivity_detail['description'], array('class'=>'form-control', 'placeholder'=>'Inserire una descrizione')) }}
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