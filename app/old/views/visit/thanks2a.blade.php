@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}

	<div class="gradient_bottom">
		<div class="loghi_left"><img src="/images/logo_unipol.png"></div>
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">
<div class="h1_home"><img src="/images/unipol_orizzontale.png"></div>
				<div class="col-lg-12 testo_thanks">
					Grazie di aver richiesto un preventivo!
					<br/><a href="{{ url('/unipol/1') }}" ><h2>Richiedi un altro preventivo</h2></a>
				</div>
				
				<div class="col-lg-12 footer_home">&nbsp;</div>
			</div>
		</div>
		<div class="row button_home">
			<img src="/images/1802_unipol.png" alt="Full quote Unipol">
			<img src="/images/1802_sai.png" alt="Full quote Unipol">
			<img src="/images/1802_previdente.png" alt="Full quote Unipol">
		</div>
	</div>
</div>
{{ Form::close() }}
@if (false) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724932"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724932;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724932;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 


@stop