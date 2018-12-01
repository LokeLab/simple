@extends('template.home')
@section('content')

<div class="row">
	
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('/home') }}">{{Lang::get('navigation.home');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->


	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12" style="padding:2px!important; margin:0px!important">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('home.hometitlebudget');}}
				</div>
				
			</div>

			<div class="portlet-body" style="padding-top:0px!important ">
			<div class="col-lg-12">
				
				<a href="updateCurrency" class="btn yellow">{{trans('budget.updateCurrency')}}</a>
			</div>
				<div  >
					@include('budget.recappfunction')
				</div>
			</div>
		</div>
	</div>
	

		

	</div>
</div>


</div>





@stop