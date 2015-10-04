@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}

	<div class="gradient_bottom">
		<div class="loghi_right"><img src="/images/unipolsai_logo.png"><img src="/images/partners_logo.png" alt="Partners logo" title="Partners logo" id="partners_logo"></div>
		
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">

				<div class="col-lg-12 testo_thanks">
					Grazie di aver richiesto un preventivo!
					<br/><a href="{{ url('/a/'.$idp) }}" ><h2>Richiedi un altro preventivo</h2></a>
				</div>
				
				<div class="col-lg-12 footer_home">&nbsp;</div>
			</div>
		</div>
		<div class="row button_home">
			<img src="/images/unipol_preventivo_calcola_r.png" alt="Full quote Unipol">
			<img src="/images/la_fondiaria_sai_calcola_ra.png" alt="Full quote Unipol">
			<img src="/images/milano_calcola_ra.png" alt="Full quote Unipol">
		</div>
	</div>
</div>
{{ Form::close() }}
@if ($idp == 1) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724932"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724932;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724932;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@if ($idp == 2) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724940"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724940;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724940;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@if ($idp == 3) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724939"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724939;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724939;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@stop