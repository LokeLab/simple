@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}

	<div class="gradient_bottom">
		<div class="loghi_right"><img src="/images/unipolsai_logo.png"><img src="/images/partners_logo.png" alt="Partners logo" title="Partners logo" id="partners_logo"></div>
		
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">
				
				
				<div class="col-lg-12 testo_thanks">
					Grazie di aver richiesto un preventivo!
					<br/><a href="{{ url('/ms') }}" ><h2>Richiedi un altro preventivo</h2></a>
					@if ($type!=4)
					<br/><a href="{{ url('/visit/thanksplay/'.$idp.'/'.$id) }}" ><h2>Gioca</h2></a>
					@endif
				</div>
				<div class="col-lg-12 message_thanks">
					&nbsp;
				</div>
				<div class="col-lg-12 footer_home">&nbsp;</div>
			</div>
		</div>
		<div class="row button_home">
			 
		</div>
		
	</div>
</div>
{{ Form::close() }}

@stop