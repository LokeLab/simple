@extends('template.internal')

@section('content')

<?php 
 $rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->lists('description', 'id');
 $rowpayedby = DB::table('payedby')->lists('description', 'id');
 $nation = DB::table('province')->lists('description', 'id');
 $currency = array('EUR'=> 'EUR');
?>
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
{{ Form::open(array('url' => 'visit/'.$v->id.'/edit', 'method' => 'POST', 'files' => true)) }}
    
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
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
						
						{{ Form::label('budgetrow', 'Row'  , array('class' => 'control-label ')) }}
						{{ Form::select('budgetrow', $rowbudget, $v->budgetrow ,   array('class'=>'form-control ', 'placeholder' => 'Rows')   ) }}
					</div>	
				<div class="col-lg-4">

						{{ Form::label('d_document', 'Date on document'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document', Decoder::decodeDate($v->d_document) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date document')   ) }}
					
					</div><div class="col-lg-4">
						{{ Form::label('d_document_start', 'Related activity start from'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_start', Decoder::decodeDate($v->d_document_start) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date from')   ) }}
					</div><div class="col-lg-4">
						{{ Form::label('d_document_stop', 'to'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_stop', Decoder::decodeDate($v->d_document_stop) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Date to')   ) }}
					</div>

				<div class="col-lg-12">
						{{ Form::label('description_cost', 'Description of cost (like plane ticket, Costume, actor in performance, administrative activity related to the project) '  , array('class' => 'control-label ')) }}
						{{ Form::text('description_cost', $v->description_cost,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Cost description' ) ) }}
				</div><div class="col-lg-12">
						{{ Form::label('activity', 'Other info about of activity (like name of performance, city for meeting) '  , array('class' => 'control-label ')) }}
						{{ Form::text('activity', $v->activity,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Description of activity' ) ) }}

				</div>
				


					<div class="col-lg-4">
							{{ Form::label('currency', 'currency'  , array('class' => 'control-label ')) }}
							{{ Form::select('currency', $currency, $v->currency ,   array('class'=>'form-control ', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('netamount', 'Net amount'  , array('class' => 'control-label ')) }}
							{{ Form::text('netamount',  $v->netamount,   array('class'=>'form-control ', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('vatamount', 'VAT amount'  , array('class' => 'control-label ')) }}
							{{ Form::text('vatamount',  $v->vatamount ,   array('class'=>'form-control ', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-12">
						{{ Form::label('comment', 'Internal note (not in reporting) '  , array('class' => 'control-label ')) }}
						{{ Form::text('comment', $v->comment,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Description of activity' ) ) }}

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
				{{ Form::select('payedby', $rowpayedby, $v->payedby ,   array('class'=>'form-control ')   ) }}

				{{ Form::label('d_document_paid', 'Date payment'  , array('class' => 'control-label ')) }}
				{{ Form::text('d_document_paid', Decoder::decodeDate($v->d_document_paid) ,   array('class'=>'form-control placeholder-no-fix date-picker')   ) }}

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
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_12">
											 Need some helps about that?
										</a>
										</h4>
									</div>
									<div id="collapse_12" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												Only documents emitted by an not EU country are considered a third country costs. Example: a people payed by an EU company ARE NOT third country cost. A freelancer not EU directly payed is a third country cost.
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
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_11">
											 Need some helps about that?
										</a>
										</h4>
									</div>
									<div id="collapse_11" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												Every cost emitted by a company is subcontracting. 
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
											{{ Form::text('d_document_start_travel', Decoder::decodeDate($v->d_document_start_travel) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-md-2">
								Date finish travel	
						</div><div class="col-md-2">
											{{ Form::text('d_document_finish_travel', Decoder::decodeDate($v->d_document_finish_travel) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-lg-12"></div>
						<div class="col-md-2"> Number people involved  </div>
						<div class="col-md-2">
									{{ Form::text('n_people', $v->n_people,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'nr.' ) ) }}
						</div>

						<div class="col-md-2"> Name of people involved  </div>
						<div class="col-md-2">
									{{ Form::text('name_people', $v->name_people,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'name of people' ) ) }}
						</div>

						<div class="col-md-2"> Role of people involved  </div>
						<div class="col-md-2">
									{{ Form::text('role_people', $v->role_people,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'role of people' ) ) }}
						</div>

						<div class="col-md-2"> Start from ( nation / city) (for accomodation put here where you live/start travel)   </div>
						<div class="col-md-2">
									{{ Form::select('from_nation', $nation,$v->from_nation,   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('from_city', $v->from_city,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'City' ) ) }}
						</div>

						<div class="col-md-2"> To (nation / city)  (for accomodation put here where you stay)  </div>
						<div class="col-md-2">
									{{ Form::select('to_nation', $nation, $v->to_nation,   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('to_city', $v->to_city,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'City' ) ) }}
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
						<div class="row"><div class="col-md-6"><h3>
							Insert document related to cost  
						</h3> </div> <div class="col-md-6"><div class="col-md-4"><a href="/model/T1.xlsx" class="btn blue"><i class="fa fa-icon-time"></i> Timesheet </a> 
						<a href="/model/T2.doc" class="btn yellow"><i class="fa fa-money"></i> Cash rembuirsement </a>
						<a href="/model/T3.doc" class="btn blue"><i class="fa fa-truck"></i> Car rembuirsement </a>
						<a href="/model/T4.doc" class="btn blue"><i class="fa fa-calendar"></i> Daily allowance rembuirsement </a>

						<a href="/model/T5.xlsx" class="btn green"><i class="fa fa-users"></i> Salary slip summary </a>  </div>
					</div>
					</div>
					<div class="row">
						<h4> Cost documentation </h4>
						<div class="col-md-6">
											{{ Form::file('doc1', array('class'=>'form-control' , 'placeholder'=>'Cost document')) }}
						</div><div class="col-md-6">
											{{ Form::file('doc2', array('class'=>'form-control' , 'placeholder'=>'Cost document')) }}
						</div>
						<h4> Proof of payment </h4>
						<div class="col-md-6">
											{{ Form::file('doc3', array('class'=>'form-control' , 'placeholder'=>'Proof of payment')) }}
						</div><div class="col-md-6">
											{{ Form::file('doc4', array('class'=>'form-control' , 'placeholder'=>'Proof of payment')) }}
						</div>
						<h4> Other document related to cost </h4>		
						<div class="col-md-6">
											{{ Form::file('doc5', array('class'=>'form-control' , 'placeholder'=>'Other document related to cost')) }}
						</div><div class="col-md-6">
											{{ Form::file('doc6', array('class'=>'form-control' , 'placeholder'=>'Other document related to cost')) }}
						</div>
							
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
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_10">
											 Cost documentation
										</a>
										</h4>
									</div>
									<div id="collapse_10" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												How document well a costs?<br/>
												Insert document inserted in your accountancy. 
											</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_20">
											Proof of payment
										</a>
										</h4>
									</div>
									<div id="collapse_20" class="panel-collapse collapse">
										<div class="panel-body" style="height:200px; overflow-y:auto;">
										<p>
										  What you need insert for document the you payed a cost? <br/>
										   Just need insert proof of payment like bank account with evidence of costs. <br<br/>For partner credit card insert detail of expenses and bank account. 
										   <br/>For cash payment use model inserted on top or similar document. 

										</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_30">
											 What else?
										</a>
										</h4>
									</div>
									<div id="collapse_30" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
											 Some activities need more documents, like salary. Please insert:
												 <ul><li>For salary and freelancer: contract or letter of appointment(one time), timesheet</li>
												 <li>For travel: borading pass or train / bus ticket </li>
												 <li>For print or brochure or good buyed: PDF or pics of goods  </li>
												 <li>For other costs: all that can prove that costs is related at activities  </li>
												 <li>For car rembuirsement: use specific model with map and km calculation  </li>
												 </ul>
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