<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		{{Lang::get('navigation.users');}}
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('/home') }}">{{Lang::get('navigation.home');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<i class="fa fa-sitemap"></i>
				<a href="{{ url('users') }}">{{Lang::get('navigation.users');}}</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				{{Lang::get('users.modifyuser');}}
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>