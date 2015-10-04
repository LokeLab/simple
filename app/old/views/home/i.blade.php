@extends('template.public')

@section('content')
{{ Form::open(array('url' => '/visitaI', 'method' => 'POST', 'id'=>'form_base', 'name'=>'form_base', 'files' => true)) }}

<script type="text/javascript">

function invia(param)
{
	if (param =='unipol')
	{
		document.getElementById("unipol").value = "1";
	}

	if (param =='fondiaria')
	{
		document.getElementById("fondiaria").value = "1";
	}

	if (param =='milano')
	{
		//$('#milano').text = '1';
document.getElementById("milano").value = "1";
		//alert($('#milano').val);

		
	}
	document.getElementById('form_base').submit();
return false;
}
</script>
	<div class="gradient_bottom">
				<div class="loghi_left"><img src="/images/logo_unipol.png"></div>
		<div class="fondo_centrale">
			
			<div class="fondo_centrale_interno" style="">
				<div class="h1_home"><img src="/images/unipol_orizzontale.png"></div>
		
		
			
		
				
				<div class="col-lg-12 campi_form">
					{{ Form::text('targa', '', array('class'=>' required campi_targa', 'placeholder'=>'TARGA')) }}
					
					<input name="unipol" id="unipol" type="hidden" value="1">
					
					
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
			<div class=" button_home">
				<a href="#" onclick="javascript:invia('unipol');"   class="button_single"><img src="/images/1802_unipol.png" class="button_single" alt="Full quote Unipol"></a>
			</div>
		</div>
		
	</div>
<div class="footer_home">
		<div class="footer-container">
            <div class="footer-terms wrapper">
                <div class="disclaimer" style="padding:0px 20px 20px;">Messaggio pubblicitario con finalità promozionale. Rateizzazione tramite finanziamento subordinato ad approvazione di Finitalia S.p.A. (Gruppo Unipol),TAN 0,00%,TAEG 0,00%. Tutti gli oneri del finanziamento a carico di UnipolSai Assicurazioni S.p.A. Esempio: importo totale del premio di polizza € 550,00 - importo totale dovuto dal cliente € 550,00 in 11 rate mensili da € 50. Prima di aderire all’iniziativa leggere la documentazione di legge, le Informazioni europee di base sul credito ai consumatori (SECCI) e il fascicolo informativo  disponibili nelle Agenzie UnipolSai, su questo sito  o sul www.finitaliaspa.it. Offerta valida fino al 31 dicembre 2015: maggiori  informazioni nelle Agenzie.</div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}



@if (false) 
	<script language="javascript" src="http://track.adform.net/adfscript/?bn=4724939"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=4724939;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=4724939;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
@endif 



@stop