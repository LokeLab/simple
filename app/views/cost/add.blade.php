@extends('template.internal')

@section('content')

<?php 
$type_cost = Input::get('type');
 switch ($type_cost) {
 	case 1:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(1)->lists('description', 'id');
 		break;
 	case 2:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(2)->lists('description', 'id');
 		break;
 	case 3:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(3)->lists('description', 'id');
 		break;
 	case 4:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(4)->lists('description', 'id');
 		break;
 	case 5:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(5)->lists('description', 'id');
 		break;
 	case 6:
 		$rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->whereKind(6)->lists('description', 'id');
 		break;
 	default:
 		# code...
 		break;
 }

 $rowpayedby = DB::table('payedby')->lists('description', 'id');
 $nation = DB::table('country')->lists('description', 'id');
 $currency = Currency::lists('longdescription', 'description');
 ?>
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
{{ Form::open(array('url' => 'cost', 'method' => 'POST', 'files' => true)) }}
    
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('cost') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
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
	@include('includes.message')

	<div class="col-lg-8">
	
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>{{Lang::get('budget.generalinfo')}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						
						{{ Form::label('budgetrow', Lang::get('budget.budgetrow')  , array('class' => 'control-label ')) }}
						{{ Form::select('budgetrow', $rowbudget, '' ,   array('class'=>'form-control ')   ) }}
					</div>	
				<div class="col-lg-4">

						{{ Form::label('d_document', Lang::get('budget.datedocument')  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => Lang::get('budget.datedocument'))   ) }}
					
					</div><div class="col-lg-4">
						{{ Form::label('d_document_start', Lang::get('budget.datefrom')  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_start', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => Lang::get('budget.datefrom'))   ) }}
					</div><div class="col-lg-4">
						{{ Form::label('d_document_stop', Lang::get('budget.to') , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_stop', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => Lang::get('budget.to'))   ) }}
					</div>

				<div class="col-lg-12">
						{{ Form::label('description_cost', Lang::get('budget.descriptioncost')  , array('class' => 'control-label ')) }}
						{{ Form::text('description_cost', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.descriptioncost')  ) ) }}
				</div><div class="col-lg-12">
						{{ Form::label('activity', Lang::get('budget.descriptionactivity')  , array('class' => 'control-label ')) }}
						{{ Form::text('activity', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.descriptionactivity')  ) ) }}

				</div>
				


					<div class="col-lg-4">
							{{ Form::label('currency', Lang::get('budget.currency')  , array('class' => 'control-label ')) }}
							{{ Form::select('currency', $currency, 'EUR' ,   array('class'=>'form-control ', )   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('netamount', Lang::get('budget.netamount') , array('class' => 'control-label ')) }}
							{{ Form::text('netamount',  '0' ,   array('class'=>'form-control ', 'placeholder' => Lang::get('budget.netamount'))   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('vatamount', Lang::get('budget.vatamount')  , array('class' => 'control-label ')) }}
							{{ Form::text('vatamount',  '0' ,   array('class'=>'form-control ', 'placeholder' => Lang::get('budget.vatamount'))   ) }}

					</div>

					<div class="col-lg-12">
						{{ Form::label('comment', Lang::get('budget.internalnote')  , array('class' => 'control-label ')) }}
						{{ Form::text('comment', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.internalnote')  ) ) }}

				</div>
					</div>
					
				
				</div>
			</div>
		</div>


	
	<div class="col-lg-4">
	
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>{{Lang::get('budget.ispayed') }}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				{{ Form::label('payedby', Lang::get('budget.payedby')  , array('class' => 'control-label ')) }}
				{{ Form::select('payedby', $rowpayedby, '4' ,   array('class'=>'form-control ')   ) }}

				{{ Form::label('d_document_paid', Lang::get('budget.paymentdate')   , array('class' => 'control-label ')) }}
				{{ Form::text('d_document_paid', '' ,   array('class'=>'form-control placeholder-no-fix date-picker')   ) }}

			</div>
		</div>

		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>{{Lang::get('budget.isspecial') }}
				</div>
				
			</div>

			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					
					<div class="col-lg-12">
						<div class="col-lg-4">	
							{{Lang::get('budget.thirdcountry') }}
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
											{{Lang::get('budget.needhelps') }}
										</a>
										</h4>
									</div>
									<div id="collapse_12" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												{{Lang::get('budget.needhelps3rd') }}
											</p>
											
										</div>
									</div>
								</div>
							</div>
							</div>
						
					</div>
@if ($type_cost <4)
					<div class="col-lg-12 active">
						<div class="col-lg-4">	
							{{Lang::get('budget.subcontracting') }}
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
											 {{Lang::get('budget.needhelps') }}
										</a>
										</h4>
									</div>
									<div id="collapse_11" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												{{Lang::get('budget.needhelpssub') }}
											</p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
@else
{{Form::hidden('sub',0)}}
@endif					

					
				
				</div>
			</div>
		</div>

	</div>

	@if ($type_cost >3)
	
<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>{{Lang::get('budget.addinformationtravel') }}
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">

				<div class="row">
					<div class="col-md-12">
						
						<div class="col-md-2">
								{{Lang::get('budget.datestart') }}	
						</div><div class="col-md-2">
											{{ Form::text('d_document_start_travel', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => Lang::get('budget.selectdate') )   ) }}
						</div>
						<div class="col-md-2">
								{{Lang::get('budget.dateend') }}	
						</div><div class="col-md-2">
											{{ Form::text('d_document_finish_travel', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => Lang::get('budget.selectdate'))   ) }}
						</div>
						<div class="col-lg-12"></div>
						<div class="col-md-2"> {{Lang::get('budget.numberp') }}	  </div>
						<div class="col-md-2">
									{{ Form::text('n_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.numberp' ) )) }}
						</div>

						<div class="col-md-2"> {{Lang::get('budget.namep') }}	 </div>
						<div class="col-md-2">
									{{ Form::text('name_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.namep') ) ) }}
						</div>

						<div class="col-md-2"> {{Lang::get('budget.rolep') }}  </div>
						<div class="col-md-2">
									{{ Form::text('role_people', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.rolep') ) ) }}
						</div>

						<div class="col-md-2"> {{Lang::get('budget.startcountry')}}   </div>
						<div class="col-md-2">
									{{ Form::select('from_nation', $nation, '',   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('from_city', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.city')  )) }}
						</div>

						<div class="col-md-2"> {{Lang::get('budget.endcountry')}}  </div>
						<div class="col-md-2">
									{{ Form::select('to_nation', $nation, '',   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-md-2">
									{{ Form::text('to_city', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.startcountry')) ) }}
						</div>

						

					</div>

					
			</div>
		</div>
@else
{{Form::hidden('d_document_start_travel','')}}
{{Form::hidden('d_document_finish_travel','')}}
{{Form::hidden('n_people','')}}
{{Form::hidden('role_people','')}}
{{Form::hidden('name_people','')}}
{{Form::hidden('from_nation','')}}
{{Form::hidden('from_city','')}}
{{Form::hidden('to_nation','')}}
{{Form::hidden('to_city','')}}


@endif



	
</div>

		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>{{Lang::get('budget.doc_rel')}}
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-md-8">
						<div class="row"><div class="col-md-6"><h3>
							{{Lang::get('budget.reldoc')}} 
						</h3> </div> <div class="col-md-6"><a href="/model/T1.xlsx" class="btn blue"><i class="fa fa-icon-time"></i> {{Lang::get('budget.temp_time')}} </a> 
						<a href="/model/T2.doc" class="btn  yellow"><i class="fa fa-money"></i> {{Lang::get('budget.temp_cash')}} </a>
						<a href="/model/T3.doc" class="btn blue"><i class="fa fa-truck"></i> {{Lang::get('budget.temp_car')}} </a>
						<a href="/model/T4.doc" class="btn  blue"><i class="fa fa-calendar"></i> {{Lang::get('budget.temp_sub')}} </a>

						<a href="/model/T5.xlsx" class="btn  green"><i class="fa fa-users"></i> {{Lang::get('budget.temp_salary')}} </a>    </div>
					</div>
						<h4> {{Lang::get('budget.cost_doc')}} </h4>
						<div class="col-md-6">
											{{ Form::file('doc1', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.cost_doc'))) }}
						</div><div class="col-md-6">
											{{ Form::file('doc2', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.cost_doc'))) }}
						</div>
						<h4> {{Lang::get('budget.cost_proof_payment')}} </h4>
						<div class="col-md-6">
											{{ Form::file('doc3', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.cost_proof_payment'))) }}
						</div><div class="col-md-6">
											{{ Form::file('doc4', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.cost_proof_payment'))) }}
						</div>
						<h4> {{Lang::get('budget.other_cost_doc')}} </h4>		
						<div class="col-md-6">
											{{ Form::file('doc5', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.other_cost_doc'))) }}
						</div><div class="col-md-6">
											{{ Form::file('doc6', array('class'=>'form-control' , 'placeholder'=>Lang::get('budget.other_cost_doc'))) }}
						</div>
					<div>		
					</div>
					
				</div>
				<div class="col-lg-4">
							<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>{{Lang::get('budget.needhelps')}}
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
											{{Lang::get('budget.cost_doc')}}
										</a>
										</h4>
									</div>
									<div id="collapse_10" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												{{Lang::get('budget.cost_doc_h')}}
											</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
											{{Lang::get('budget.cost_proof_payment')}}
										</a>
										</h4>
									</div>
									<div id="collapse_2" class="panel-collapse collapse">
										<div class="panel-body" style="height:200px; overflow-y:auto;">
										<p>
										   {{Lang::get('budget.cost_proof_payment_h')}}

										</p>
											
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_30">
											 {{Lang::get('budget.other_cost_doc')}}
										</a>
										</h4>
									</div>
									<div id="collapse_30" class="panel-collapse collapse">
										<div class="panel-body">
											<p>
												 {{Lang::get('budget.other_cost_doc_h')}}
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
			<a href="{{ url('cost') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop