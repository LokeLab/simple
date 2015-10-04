@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}


<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<div class="form-body">
		<div class="immagine_top"> 
					<img src="/images/ESEC_Unipol_App_preventivi-01.png" alt="Full quote Unipol">
		</div>
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">
				<div class="col-lg-12 h1_home">&nbsp;</div>
				<div class="col-lg-12 h2_home">&nbsp;</div>
				<div class="col-lg-12 h3_home">&nbsp;</div>
				<div class="col-lg-12 campi_form">
					<h1 class="h1_home">Benvenuto</h1>
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
@stop

@stop