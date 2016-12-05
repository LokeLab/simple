@extends('template.internal')

@section('content')

<?php 
 $type_cost = Budget::getTypeCost($v->budgetrow);


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
 $nation = DB::table('province')->lists('description', 'id');
 $currency = array('EUR'=> 'EUR');
?>
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
{{ Form::open(array('url' => 'visit/'.$v->id.'/reject', 'method' => 'POST', 'files' => true)) }}
    
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		@if ($v->active=0 || Auth::user()->role == 1)
		<a href="{{ url('visit/'.$v->id.'/edit') }}" class="btn blue">{{Lang::get('generic.edit');}}</a>
		@endif
		@if ( Auth::user()->role == 1)
		<a href="{{ url('visit/'.$v->id.'/approve') }}" class="btn green">{{Lang::get('generic.approve');}}</a>
		@endif	
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
</div></div>
			<div class="col-lg-9">
@if ( Auth::user()->role == 1)
			<div class="form-group">
			{{ Form::label('rejection', 'Reason why costs is not correct '  , array('class' => 'control-label ')) }}
						{{ Form::text('rejection', $v->rejection,   array('class'=>'form-control placeholder-no-fix',  'placeholder' => 'Motivation' ) ) }}
			{{ Form::submit(Lang::get('generic.reject'),  array('class' =>'btn red btn-large')) }}
			&nbsp;
			</div>
			@endif	
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
						<strong>{{ Budget::getLabel( $v->budgetrow )    }}</strong>
					</div>	
				<div class="col-lg-4">

						{{ Form::label('d_document', 'Date on document'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document', Decoder::decodeDate($v->d_document) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled', 'placeholder' => 'Date document')   ) }}
					
					</div><div class="col-lg-4">
						{{ Form::label('d_document_start', 'Related activity start from'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_start', Decoder::decodeDate($v->d_document_start) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled', 'placeholder' => 'Date from')   ) }}
					</div><div class="col-lg-4">
						{{ Form::label('d_document_stop', 'to'  , array('class' => 'control-label ')) }}
						{{ Form::text('d_document_stop', Decoder::decodeDate($v->d_document_stop) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled', 'placeholder' => 'Date to')   ) }}
					</div>

				<div class="col-lg-12">
						{{ Form::label('description_cost', 'Description of cost (like plane ticket, Costume, actor in performance, administrative activity related to the project) '  , array('class' => 'control-label ')) }}
						<strong>{{  $v->description_cost }}</strong>
				</div><div class="col-lg-12">
						{{ Form::label('activity', 'Other info about of activity (like name of performance, city for meeting) '  , array('class' => 'control-label ')) }}
						<strong>{{  $v->activity }}</strong>

				</div>
				


					<div class="col-lg-4">
							{{ Form::label('currency', 'currency'  , array('class' => 'control-label ')) }}
							{{ Form::select('currency', $currency, $v->currency ,   array('class'=>'form-control ', 'disabled', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('netamount', 'Net amount'  , array('class' => 'control-label ')) }}
							{{ Form::text('netamount',  $v->netamount,   array('class'=>'form-control ', 'disabled', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-4">
							{{ Form::label('vatamount', 'VAT amount'  , array('class' => 'control-label ')) }}
							{{ Form::text('vatamount',  $v->vatamount ,   array('class'=>'form-control ', 'disabled', 'placeholder' => 'Città')   ) }}

					</div>

					<div class="col-lg-12">
						{{ Form::label('comment', 'Internal note (not in reporting) '  , array('class' => 'control-label ')) }}
						<strong>{{  $v->comment }}</strong>

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
				{{ Form::select('payedby', $rowpayedby, $v->payedby ,   array('class'=>'form-control ','disabled')   ) }}

				{{ Form::label('d_document_paid', 'Date payment'  , array('class' => 'control-label ')) }}
				{{ Form::text('d_document_paid', Decoder::decodeDate($v->d_document_paid) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled')   ) }}

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
							Third country cost 
						</div>
						<div class="col-lg-8">	
										
							<label class="radio-inline">
								@if ( $v->tpc==1)
								 {{Lang::get('decode.Yes')}}
								 @else
								  {{Lang::get('decode.No')}}
								  @endif
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
@if ($type_cost < 4)
					<div class="col-lg-12 active" >
						<div class="col-lg-4">	
							Subcontracting
						</div>
						<div class="col-lg-8">	
										
							@if ( $v->sub==1)
								 {{Lang::get('decode.Yes')}}
								 @else
								  {{Lang::get('decode.No')}}
								  @endif

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
					<i class="fa fa-bullseye"></i>Additional information for travel and accomodation
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">

				<div class="row">
					<div class="col-md-12">
						
						<div class="col-md-2">
								Date start travel	
						</div><div class="col-md-2">
											{{ Form::text('d_document_start_travel', Decoder::decodeDate($v->d_document_start_travel) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-md-2">
								Date finish travel	
						</div><div class="col-md-2">
											{{ Form::text('d_document_finish_travel', Decoder::decodeDate($v->d_document_finish_travel) ,   array('class'=>'form-control placeholder-no-fix date-picker', 'disabled', 'placeholder' => 'select')   ) }}
						</div>
						<div class="col-lg-12"></div>
						<div class="col-md-2"> Number people involved  </div>
						<div class="col-md-2">
									{{ Form::text('n_people', $v->n_people,   array('class'=>'form-control placeholder-no-fix', 'disabled', 'placeholder' => 'nr.' ) ) }}
						</div>

						<div class="col-md-2"> Name of people involved  </div>
						<div class="col-md-2">
									{{  $v->name_people }}
						</div>

						<div class="col-md-2"> Role of people involved  </div>
						<div class="col-md-2">
									{{ $v->role_people }}
						</div>

						<div class="col-md-2"> Start from ( nation / city) (for accomodation put here where you live/start travel)   </div>
						<div class="col-md-2">
									{{ Form::select('from_nation', $nation,$v->from_nation,   array('class'=>'form-control placeholder-no-fix', 'disabled' ) ) }}
						</div>
						<div class="col-md-2">
									{{  $v->from_city }}
						</div>

						<div class="col-md-2"> To (nation / city)  (for accomodation put here where you stay)  </div>
						<div class="col-md-2">
									{{ Form::select('to_nation', $nation, $v->to_nation,   array('class'=>'form-control placeholder-no-fix', 'disabled' ) ) }}
						</div>
						<div class="col-md-2">
									{{  $v->to_city }}
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
					<i class="fa fa-bullseye"></i>Document related to cost  
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-md-8">
						
					<div class="row">
					<div class="col-md-12">
						<h4> Cost documentation </h4>
						<div class="col-md-6">
											
											@if ($v->doc1 != '')
												<a href="/uploadfile/{{$v->doc1}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div><div class="col-md-6">
											
											@if ($v->doc2 != '')
												<a href="/uploadfile/{{$v->doc2}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div>
						<h4> Proof of payment </h4>
						<div class="col-md-6">
											
											@if ($v->doc3 != '')
												<a href="/uploadfile/{{$v->doc3}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div><div class="col-md-6">
											
											@if ($v->doc4 != '')
												<a href="/uploadfile/{{$v->doc4}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div>
						<h4> Other document related to cost </h4>		
						<div class="col-md-6">
										
											@if ($v->doc5 != '')
												<a href="/uploadfile/{{$v->doc5}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div><div class="col-md-6">
											
											@if ($v->doc6 != '')
												<a href="/uploadfile/{{$v->doc6}}" class="btn btn-warning" target="_blank">Download</a>
											@endif 
						</div>
							
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



{{ Form::close() }}
@stop