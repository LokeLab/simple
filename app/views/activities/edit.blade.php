@extends('template.internal')

@section('content')
@include('activities.edit_breadcrumb')

{{ Form::open(array('url' => 'activities/'. $activities_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<!--BEGIN SAVE MENU -->
			<div class="portlet-title">
				
				<div class="actions btn-set">
					<a href="{{ url('activities') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('activities/'.$activities_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
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
						<label class="col-md-2 control-label">{{Lang::get('activities.description')}}:
							<span class="required">
								 *
							</span>
						</label>
						<div class="col-md-10">
							{{ Form::text('activity', $activities_detail['description'], array('class'=>'form-control', 'placeholder'=>'Inserire una descrizione')) }}
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