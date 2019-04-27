@extends('template.internal')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			
			<a href="{{ url('cost') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>

	<div class="col-xs-12">@include('faq.faq')</div>
	
</div>

@stop