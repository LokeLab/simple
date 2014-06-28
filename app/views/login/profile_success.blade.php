@extends('template.internal')


@section('content')

@include('login.profile_breadcrumb')
<div class="note note-success">
	<h4 class="block">{{Lang::get('users.gratzProfile');}}</h4>
	<p>
		{{Lang::get('users.gratzProfileExt');}}

	</p>
</div>

<a href="/home" class="btn btn-success btn-large">{{Lang::get('users.backToHome');}}</a>


@stop