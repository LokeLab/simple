@extends('template.public')

@section('content')
{{ Form::open(array('url' => '/visit', 'method' => 'POST',  'id'=>'form_base', 'name'=>'form_base', 'files' => true)) }}
<script type="text/javascript">

function invia(param)
{
	if (param =='unipol')
	{
		$('#unipol').text = '1';
	}

	if (param =='fondiaria')
	{
		$('#fondiaria').text = '1';
	}

	if (param =='milano')
	{
		$('#milano').text = '1';
	}
	document.getElementById('form_base').submit();

}
</script>


	<!-- BEGIN FORM-->
	<div class="gradient_bottom">
		<div class="loghi_right"><img src="/images/unipolsai_logo.png"><img src="/images/partners_logo.png" alt="Partners logo" title="Partners logo" id="partners_logo"></div>
		
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">
				<div class="h1_home"><img src="/images/testo.jpg"></div>
				

				
				<div class="col-lg-12 campi_form">
					{{ Form::text('targa', '', array('class'=>' required campi_targa', 'placeholder'=>'TARGA')) }}
					{{ Form::text('data_nascita', '', array('class'=>'required date-picker campi_data', 'placeholder'=>'Data di Nascita')) }}
					{{ Form::text('km', '', array('class'=>'required campi_km', 'placeholder'=>'KM annui')) }}
					{{ Form::hidden('id', $id )}}
					{{ Form::hidden('unipol', '' )}}
					{{ Form::hidden('fondiaria', '' )}}
					{{ Form::hidden('milano', '' )}}
				</div>
				<div class="col-lg-12 message_home">
					&nbsp;
					@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif
				</div>
				<div class="col-lg-12 footer_home">&nbsp;</div>
			</div>
		</div>
		<div class=" button_home">
			<a href="#" onclick="javascript:invia('unipol');"  style="height:146px!important" class="button_single"><img src="/images/unipol_preventivo_calcola_r.png" class="button_single" alt="Full quote Unipol"></a>
			<a href="#" onclick="javascript:invia('fondiaria');"    class="button_single"><img src="/images/la_fondiaria_sai_calcola_ra.png" class="button_single" alt="Full quote Unipol"></a>
			<a href="#" onclick="javascript:invia('milano');"   class="button_single"><img src="/images/milano_calcola_ra.png" class="button_single" alt="Full quote Unipol"></a>

		</div>



	</div>
	<div class="footer_home">
		<div class="footer-container">
            <div class="footer-terms wrapper">
                <p class="text-center" id="offerta"><b>Offerta valida fino al 31 dicembre 2014</b> riservata ai già clienti con polizza annuale o semestrale e ai nuovi clienti solo con 
                polizza semestrale. Finanziamento tramite Finitalia S.p.A. (società del Gruppo Unipol) subordinato ad approvazione. 
                <b>TAN e TAEG 0%:</b> tutti gli oneri del finanziamento a carico di UnipolSai Assicurazioni (es. importo totale del premio 
                assicurativo finanziato per contratto con frazionamento semestrale euro 550,00, importo totale dovuto dal cliente euro 550,00 
                in 10 rate mensili da 55 euro, 5 a semestre).</p>
                <p class="text-center warning"><i class="icon-circle"></i>Prima di aderire leggere il fascicolo informativo e la documentazione di legge disponibile <a href="http://www.polizzatassozero.it/documenti.html">qui</a> o in agenzia.<i class="icon-circle"></i></p>
                <footer class="wrapper">
                    <img class="fleft footer-logo" src="http://www.polizzatassozero.it/img/unipolsai_logo.png" alt="Polizza Tasso Zero è un’offerta di UnipolSai Assicurazioni" title="UnipolSai">
                    <div class="fleft footer-text">
                        <p class="leader"><b>UnipolSai</b> è leader in Italia nel settore danni, con <b>oltre 3.000 agenzie e 10 milioni di clienti.</b></p>
                        <p class="contacts">UnipolSai Assicurazioni S.p.A. - via Stalingrado, 45 - 40128 Bologna - <a href="http://www.unipolsai.it" target="_blank"><b>www.unipolsai.it</b></a></p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

{{ Form::close() }}


@if ($id == 1) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724932"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724932;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724932;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@if ($id == 2) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724940"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724940;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724940;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@if ($id == 3) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724939"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724939;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724939;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 

@stop