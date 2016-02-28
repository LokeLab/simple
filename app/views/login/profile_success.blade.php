@extends('template.internal')


@section('content')

@include('login.profile_breadcrumb')
<div class="note note-success">
	<h4 class="block">Success!</h4>
	<p>
		You updated your profile. Please go back to home and continue your work.

	</p>
</div>

<a href="/home" class="btn btn-success btn-large">{{Lang::get('users.backToHome');}}</a>


@stop