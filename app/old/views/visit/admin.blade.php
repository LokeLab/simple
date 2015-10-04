@extends('template.home')
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
				<a href="{{ url('/home') }}">{{Lang::get('navigation.home');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->


	</div>
</div>



<div class="row">

	<div class="col-md-8 col-sm-8" style="padding:2px!important; margin:0px!important">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>Riepilogo compilazioni 
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 320px;"><div class="scroller" style="height: 320px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0">
					<div class="row">
						<div class="col-md-2 col-sm-2">Giorno
						</div><div class="col-md-2 col-sm-2"> Clienti </div>
						<div class="col-md-2 col-sm-2"> Preventivi </div>
						<div class="col-md-2 col-sm-2"> Errori </div>
						<div class="col-md-2 col-sm-2"> Mancate conferme </div>
						<div class="col-md-2 col-sm-2"> Totale</div>								  
						</div>
					@foreach($risultati_list as $c)
						<div class="row">
						<div class="col-md-2 col-sm-2">{{  $c->giorno }} 
						</div><div class="col-md-2 col-sm-2"> {{  $c->clienti  }} </div>
						<div class="col-md-2 col-sm-2"> {{  $c->preventivi }} </div>
						<div class="col-md-2 col-sm-2"> {{  $c->errori }} </div>	
						<div class="col-md-2 col-sm-2"> {{  $c->not_conf }} </div>	
						<div class="col-md-2 col-sm-2"> {{  $c->errori + $c->preventivi+$c->clienti+$c->not_conf }} </div>					  
						</div>

					@endforeach
				</div><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 191.89765458422175px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
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
	
	<div class="col-md-4 col-sm-4" style="padding:2px!important; margin:0px!important">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-money"></i>Ultime targhe compilate 
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 320px;"><div class="scroller" style="height: 320px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0">
					@include('visit.lastest')
				</div><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 191.89765458422175px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
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
<div class="row">
<div class="col-md-12 col-sm-12">

							
		<div class="col-lg-12" style="padding:2px!important; margin:0px!important"><div id="chart1" style="width: 100%; height: 350px; position: relative;" class="jqplot-target"></div></div>
							
</div>
</div>





@stop