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
	<div class="col-lg-9 col-md-12 col-sm-12" style="padding:2px!important; margin:0px!important">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('home.hometitlebudget');}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div  >
					@include('budget.recapp')
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-12 col-sm-12" style="padding:2px!important; margin:0px!important">
	

		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding:2px!important; margin:0px!important">

	<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('home.titlecalendar');}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-md-12"> {{Lang::get('home.elegibility');}}</div><div class="col-md-6"> {{Lang::get('home.from');}} </div><div class="col-md-6"> 01/09/2015 </div><div class="col-md-6">{{Lang::get('home.to');}}</div><div class="col-md-6">	28/02/2019</div></div>
					<div class="row bg-yellow"><div class="col-md-12"> {{Lang::get('home.grant');}}</div><div class="col-md-12"> <strong>2015-1504/001-001</strong>	</div></div>
					<div class="row bg-green"><div class="col-md-6"> {{Lang::get('home.support');}} </div><div class="col-md-6">  	</div>

					<div class="col-md-12"><a href="mailto:support@caravanext.eu" style="color:white"><i class="fa fa-envelope"></i> support@caravanext.eu</a>	</div></div>
				
			</div>
		</div>
	</div>

		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding:2px!important; margin:0px!important">

	
	<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('navigation.news');}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div >
					@include('news.lastest')
				</div>
				<div class="scroller-footer">
					<div class="pull-right">
						<a href="news">
							 {{Lang::get('admin.see_all')}} <i class="m-icon-swapright m-icon-gray"></i>
						</a>
						 &nbsp;
					</div>
				</div>
			</div>
		</div>
	
 </div>	

	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12" style="padding:2px!important; margin:0px!important">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('home.lastestcost');}}
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div >
					@include('visit.lastest')
				</div>
				<div class="scroller-footer">
					<div class="pull-right">
						<a href="visit">
							 {{Lang::get('admin.see_all')}} <i class="m-icon-swapright m-icon-gray"></i>
						</a>
						 &nbsp;
					</div>
				</div>
			</div>
		</div>
	



		</div>
	</div>

</div>





@stop