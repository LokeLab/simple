@extends('template.internal')

@section('content')

<div class="col-lg-12">
	
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>{{Lang::get('budget.kindofcost')}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
			<div style="min-height: 20px"></div>
					

				<div class="row ">
					<div class="col-lg-4 text-center">
					<a href="{{ url('visit/add?type=1') }}" ><i class="fa fa-briefcase big_ico"></i>
					<br/>
						{{Lang::get('budget.staff')}}</a>
					</div>
						<div class="col-lg-4 text-center">
					<a href="{{ url('visit/add?type=2') }}" ><i class="fa fa-shopping-cart big_ico"></i>
					<br/>
						{{Lang::get('budget.services')}}</a>
					</div>
					<div class="col-lg-4 text-center">
					<a href="{{ url('visit/add?type=3') }}" ><i class="fa fa-flag big_ico"></i>
					<br/>
						{{Lang::get('budget.other')}}</a>
					</div>
					</div>
					<div class="row ">
					<div style="min-height: 20px"></div>
					</div>

					<div class="row ">
						
					<div class="col-lg-4 text-center">
						<a href="{{ url('visit/add?type=4') }}" ><i class="fa fa-hotel big_ico"></i>
						<br/>
						{{Lang::get('budget.accomodation')}}</a>
					</div>
						<div class="col-lg-4 text-center">
					<a href="{{ url('visit/add?type=5') }}" ><i class="fa fa-plane big_ico"></i>
					<br/>
						{{Lang::get('budget.plan')}}</a>
					</div>
					
<div class="col-lg-4 text-center">
					<a href="{{ url('visit/add?type=6') }}" ><i class="fa fa-cutlery big_ico"></i>
					<br/>
						{{Lang::get('budget.subsistence')}}</a>
					</div>
				</div>
			</div>
		</div>
</div>



@stop