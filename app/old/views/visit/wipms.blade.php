@extends('template.public')

@section('content')
<?php
$targa = $_GET['targa'];
$km = $_GET['km'];
$data_nascita = $_GET['data_nascita'];





$getdata = http_build_query(
array(
    'form-ania:targa'=>  $targa,

));

$opts = array('http' =>
 array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => $getdata
)
);

$context  = stream_context_create($opts);

if ($role_detail['typevisit'] == 1)
	  $strlink = "http://www.unipol.fullquote.it/essigRJPW/view/richiesta.xhtml";
	if ($role_detail['typevisit'] == 2)  
	   $strlink = "http://www.fondiaria-sai.fullquote.it/fqweb/pages/dati-ania.faces";
	if ($role_detail['typevisit'] == 3) 
	   $strlink = "http://www.milanoassicurazioni.fullquote.it/fqweb/pages/dati-ania.faces";
	


$result = file_get_contents($strlink, false, $context);

?>



<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
						.bottoni
					{
					background-color: #003563;
					color:#fff;
					padding-top: 10px;
					padding-bottom: 15px;
					height:70px;

				}
				.bottoni a
					{
					background-color: #003563;
					color:#fff;

				}
					</style>


		<div class="center">

			<div class="bottoni">
					<div class="col-md-3 col-sm-3 bottoni">
					<a href="{{ url('/visit/thanksms/'.$idp.'/'.$id) }}"  >PROCEDI</a>
				</div><div class="col-md-3 col-sm-3 bottoni">
					<a href="{{ url('/visit/thanksmscli/'.$idp.'/'.$id) }}"  >PROCEDI COME GIA' CLIENTE</a>
</div><div class="col-md-3 col-sm-3 bottoni">
					<a href="{{ url('/visit/back/'.$idp.'/'.$id) }}"  >PREVENTIVO CON ERRORE</a>
</div><div class="col-md-3 col-sm-3 bottoni">
<a href="{{ url('/ms') }}" >ANNULLA</a></div>
				</div>
				<span class="h3_home">Hai inserito la targa: <strong>{{$targa}}</strong></span></div>
<div class=" iframe" border=0>
	<iframe class="iframe" src="<?php 
	
	 
	 if ($role_detail['typevisit'] == 1)
	  echo "http://www.unipol.fullquote.it/essigRJPW/view/richiesta.xhtml";
	if ($role_detail['typevisit'] == 2)  
	  echo "http://www.fondiaria-sai.fullquote.it/fqweb/pages/dati-ania.faces";
	if ($role_detail['typevisit'] == 3) 
	  echo "http://www.milanoassicurazioni.fullquote.it/fqweb/pages/dati-ania.faces";
	if ($role_detail['typevisit'] == 4) 
	  echo "";
	?>"> 	
</div>


@stop