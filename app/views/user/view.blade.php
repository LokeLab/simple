@extends('template.internal')



@section('content')


<div class="tab_content">
	<div class="tab-pane" id="tab_0">
		@include('user.view_tab_1')
	</div>
	<div class="tab-pane" id="tab_1">
		@include('user.view_tab_2')
			
		
	</div>





{{ Form::close() }}


</div>
	
@stop