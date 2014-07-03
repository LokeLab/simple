<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		{{Lang::get('navigation.offerts');}} <!--<small>{{Lang::get('home.home');}}</small>-->
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('/home') }}">{{Lang::get('navigation.home');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<i class="fa fa-group"></i>
				<a href="{{ url('/offers?c='.Input::get('c')) }}">{{Lang::get('navigation.offerts');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				{{Lang::get('navigation.list');}}
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>