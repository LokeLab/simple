@extends('template.homeadv')
@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			{{Lang::get('navigation.home');}} <small>{{Lang::get('home.home');}}</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('home_advertiser') }}">{{Lang::get('navigation.home');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('adv.campaign_active');}}
				</div>
				
			</div>
			<div class="portlet-body">
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0">
					@include('campaign.active_ds')
				</div><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 191.89765458422175px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
				<div class="scroller-footer">
					<div class="pull-right">
						<a href="campaigns">
							 {{Lang::get('adv.see_all')}} <i class="m-icon-swapright m-icon-gray"></i>
						</a>
						 &nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">

		@if ($nooffer == 1)
		<h4>Offer: {{$offers}}</h4>
			<div class="dashboard-stat blue">
					<div class="visual">
						<i class="fa fa-bullseye"></i>
					</div>
					<div class="details">
						<div class="number">
							 {{$number}}
						</div>
						<div class="desc">
							Scans 
						</div>
					</div>
					
				</div>
		@else
		<h4>{{Lang::get('adv.mostactive')}} </h4>
		<div id="chart2" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div>	
		@endif
	</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12">
	<h4>{{Lang::get('admin.scan_all')}}</h4>
								<div id="chart1" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div>
</div>
</div>

@stop