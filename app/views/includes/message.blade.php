@if($errors->has())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	<span>{{ $error }}</span><br />
	@endforeach
</div>
@endif
@if(Session::has('message'))
	<div class="alert alert-success">
		<?php echo Session::get('message'); ?>
	</div>
@endif
