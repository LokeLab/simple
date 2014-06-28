@extends('template.home')
@section('content')
<div class="content">
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
		<div class="col-md-8 ">
			<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>{{Lang::get('adv.campaign_active');}}
				</div>
				
			</div>
			<div class="portlet-body">
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0">
					@include('campaign.active_ds_class')
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
		</div>
		<div class="col-md-4 ">
			<div class="col-md-12 ">

				<a href="/customers" class="icon-btn">
					<i class="fa fa-users"></i>
					<div>
						 {{Lang::get('users.userRelated')}}
					</div>
					<span class="badge badge-important">
						 
						  {{User::getNumberAdvRelated(Session::get('userid'))}}
					</span>
				</a>

				<a href="/initialcode?filter=unused" class="icon-btn">
					<i class="fa fa-users"></i>
					<div>
						 {{Lang::get('users.codeToBeActivate')}}
					</div>
					<span class="badge badge-important">
						 
						  {{InitialCode::countAllUnusedbyPromoter(Session::get('userid'))}}
					</span>
				</a>

				<a href="#" class="icon-btn">
					<i class="fa fa-users"></i>
					<div>
						 {{Lang::get('users.activeOffersByPromoter')}}
					</div>
					<span class="badge badge-important">
						 
						  {{Offer::countActiveOffersByPromoter(Session::get('userid'))}}
					</span>
				</a>

				
			</div>
			<div class="col-md-12 col-sm-12" style="padding:2px!important; margin:0px!important">
				<div class="col-lg-12"><h4> {{Lang::get('admin.mostactive')}} </h4></div>
				<div class="col-lg-12" style="padding:2px!important; margin:0px!important">
					<div id="chart2" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div>
				</div>
			</div>



			</div>
			
		</div>

	</div>
	<div class="row">

		<div class="col-md-12 col-sm-12">

 <div class="col-md-6 col-sm-6"> 
 	@if (Input::has('c'))
 	 <div class="col-md-12 col-sm-12">
								<div class="col-lg-12"><h4>Offers -  {{Lang::get('admin.scan_community',array('community' => $community_name))}} </h4></div> 
								
								</div>
 	@else
		<div class="col-lg-12"><h4>Community - {{Lang::get('admin.scan_all')}}</h4></div>
	@endif
 </div>
 <div class="col-md-6 col-sm-6">
<!--
							{{ Form::open(array('url' => 'home', 'method' => 'POST')) }}
							<div class="col-lg-8"><div class="col-lg-3">
							{{ Form::label('c',  Lang::get('offerts.community_id'), array('class'=>'control-label')) }}
							</div><div class="col-lg-9">
							{{ Form::select('c', $community_list, Input::get('c'), array('class' => 'form-control control-inline')) }}
							</div></div><div class="col-lg-2" style="padding:2px!important; margin:0px!important">
							<button class="btn green" type="submit" style="width:80px;"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.filter');}} </button>
							</div>
							@if (Input::has('c'))
							<div class="col-lg-2 " style="padding:2px!important; margin:0px!important"><a href="/home" class="btn default" style="width:80px;">{{Lang::get('generic.all')}}</a></div> 
							@endif 
							{{ Form::close()}}
						-->
</div>


							@if (Input::has('c'))
							 <div class="col-lg-12" style="padding:2px!important; margin:0px!important"><div id="chart1" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div></div>
							@else
								
								<div class="col-lg-12" style="padding:2px!important; margin:0px!important"><div id="chart1" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div></div>
							@endif

</div>
	</div>
</div>
@stop