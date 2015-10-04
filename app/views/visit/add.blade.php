@extends('template.internal')

@section('content')

<?php 
 $rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->lists('description', 'id');
 $rowpayedby = DB::table('payedby')->lists('description', 'id');
 $nation = DB::table('province')->lists('description', 'id');
 ?>
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}
    
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
<!--<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('ttemplates.id')) }}: 
		{{ Form::text('id', '', array('class'=>'form-control')) }}
		</div>
	</div>
</div>-->
<div class="row">
	@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif

	<div class="col-lg-8">
	
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>Nature of cost
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						
						{{ Form::label('row', 'Row'  , array('class' => 'control-label ')) }}
						{{ Form::select('row', $rowbudget, '' ,   array('class'=>'form-control ', 'placeholder' => 'Città')   ) }}
						

						{{ Form::label('d_document', 'Date on document'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date document')   ) }}

					<div class="col-lg-6">
						{{ Form::label('d_document_start', 'Related activity start from'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_start', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date from')   ) }}
					</div><div class="col-lg-6">
						{{ Form::label('d_document_stop', 'to'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_stop', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date to')   ) }}
					</div>

			
						{{ Form::label('description_cost', 'Description of cost (like plane ticket, Costume, actor in performance, administrative activity related to the project) '  , array('class' => 'control-label ')) }}
						{{ Form::text('description_cost', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Cost description' ) ) }}

						{{ Form::label('description_activity', 'Other info about of activity (like name of performance, city for meeting) '  , array('class' => 'control-label ')) }}
						{{ Form::text('description_activity', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Description of activity' ) ) }}


						
					</div>
					
				
				</div>
			</div>
		</div>


	</div>
	<div class="col-lg-4">
	
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Is payed?
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				{{ Form::label('payedby', 'Payed by'  , array('class' => 'control-label ')) }}
				{{ Form::select('payedby', $rowpayedby, '4' ,   array('class'=>'form-control ')   ) }}

				{{ Form::label('d_document_paid', 'Date payment'  , array('class' => 'control-label ')) }}
				{{ Form::text('d_document_paid', '' ,   array('class'=>'form-control placeholder-no-fix date-picker')   ) }}

			</div>
		</div>

		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Is a special costs?
				</div>
				
			</div>

			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					
					<div class="col-lg-12">
						<div class="col-lg-4">	
							Third party cost 
						</div>
						<div class="col-lg-8">	
										
							<label class="radio-inline">
								{{ Form::radio('tpc', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('tpc', 0, 1) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
						<div class="col-lg-12 active">

						<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
											 Need some helps about that?
										</a>
										</h4>
									</div>
									<div id="collapse_1" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												How document well a costs?
											</p>
											
										</div>
									</div>
								</div>
							</div>
							</div>
						
					</div>

					<div class="col-lg-12 active">
						<div class="col-lg-4">	
							Subcontracting
						</div>
						<div class="col-lg-8">	
										
							<label class="radio-inline">
								{{ Form::radio('sub', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('sub', 0, 1) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
						<div class="col-lg-12 active">
						<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
											 Need some helps about that?
										</a>
										</h4>
									</div>
									<div id="collapse_1" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												How document well a costs?
											</p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					

					
				
				</div>
			</div>
		</div>

	</div>
	
<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Additional information for travel and accomodation
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">

				<div class="row">
					<div class="col-md-12">
						
						<div class="col-md-2">
								Date start travel	
						</div><div class="col-md-2">
											{{ Form::text('d_document_start_travel', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-md-2">
								Date finish travel	
						</div><div class="col-md-2">
											{{ Form::text('d_document_finish_travel', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-lg-12"></div>
						<div class="col-md-2"> Number people involved  </div>
						<div class="col-md-2">
									{{ Form::text('n_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'nr.' ) ) }}
						</div>

						<div class="col-md-2"> Name of people involved  </div>
						<div class="col-md-2">
									{{ Form::text('name_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'name of people' ) ) }}
						</div>

						<div class="col-md-2"> Role of people involved  </div>
						<div class="col-md-2">
									{{ Form::text('role_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'role of people' ) ) }}
						</div>

						<div class="col-md-2"> Start from ( nation / city) (for accomodation put here where you live/start travel)   </div>
						<div class="col-md-2">
									{{ Form::select('from_nation', $nation, '',   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('from_city', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'City' ) ) }}
						</div>

						<div class="col-md-2"> To (nation / city)  (for accomodation put here where you stay)  </div>
						<div class="col-md-2">
									{{ Form::select('to_nation', $nation, '',   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('to_city', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'City' ) ) }}
						</div>

						

					</div>

					
			</div>
		</div>
	




	
</div>

		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Document related to cost  
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-md-8">
						<div class="row"><div class="col-md-8"><h3>
							Insert document related to cost  
						</h3> </div> <div class="col-md-4"><img src="/images/time_sheet.png" height="40"></div>
					</div>
						<h4> Cost documentation </h4>
						<div class="col-md-6">
											{{ Form::file('img1', array('class'=>'form-control' , 'placeholder'=>'Cost document')) }}
						</div><div class="col-md-6">
											{{ Form::file('img1', array('class'=>'form-control' , 'placeholder'=>'Cost document')) }}
						</div>
						<h4> Proof of payment </h4>
						<div class="col-md-6">
											{{ Form::file('img2', array('class'=>'form-control' , 'placeholder'=>'Proof of payment')) }}
						</div><div class="col-md-6">
											{{ Form::file('img2', array('class'=>'form-control' , 'placeholder'=>'Proof of payment')) }}
						</div>
						<h4> Other document related to cost </h4>		
						<div class="col-md-6">
											{{ Form::file('img2', array('class'=>'form-control' , 'placeholder'=>'Other document related to cost')) }}
						</div><div class="col-md-6">
											{{ Form::file('img2', array('class'=>'form-control' , 'placeholder'=>'Other document related to cost')) }}
						</div>
					<div>		
					</div>
					
				</div>
				<div class="col-lg-4">
							<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Do you need some help?
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
						<div class="portlet-body">
							<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
											 Cost documentation
										</a>
										</h4>
									</div>
									<div id="collapse_1" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												How document well a costs?
											</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
											Proof of payment
										</a>
										</h4>
									</div>
									<div id="collapse_2" class="panel-collapse collapse">
										<div class="panel-body" style="height:200px; overflow-y:auto;">
										<p>
										   What you need insert for document a cost?
										</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
											 What else?
										</a>
										</h4>
									</div>
									<div id="collapse_3" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												 Some activities need more documents.
											</p>
											
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					</div>
			</div>
		</div>
	




	
</div>


<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit('Save',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop