@extends('template.login')


@section('content')
<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		
		<div class="content ">
			<div  class="col-lg-12"><img src="{{ url('/images/logo_mrquikode.png') }}" class='img-responsive' alt="logo" ></div>
<div class="note note-success">
	<h4 class="block">{{Lang::get('users.gratzReg');}}</h4>
	<p>
		{{Lang::get('users.gratzRegExt');}}
		<br/>
		{{Lang::get('users.gratzRegPass');}}
		<!--h3>{{Lang::get('users.password');}}: <strong>{{$password}}</strong></h3-->

	</p>
</div>

<a href="/login" target="_blank" class="btn btn-success btn-large">{{Lang::get('users.backToLogin');}}</a>

</div>
</div>
</div>

@stop