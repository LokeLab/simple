@extends('template.login')

@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		<div class="logo"> 
					<img src="{{ url('/images/Quikode_logo_white.png') }}" alt="logo" width="20%">
		</div>
		<div class="content">
			<h3 class="form-title">Work in progress</h3>
			<p> System is in maintenance mode. We are sorry for the inconvenience.
				We'll be back soon.
			<div class="login-options">
					<h4><a href="http://quikode.com/" target="_blank">{{Lang::get('users.discover_quikode') }}</a></h4>
			</div>
		</div>
	</div>
</div>


@stop