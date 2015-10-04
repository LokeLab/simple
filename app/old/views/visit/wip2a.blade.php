@extends('template.public')

@section('content')
<?php
$targa = $_GET['targa'];
$km = $_GET['km'];
$data_nascita = $_GET['data_nascita'];



?>

<script type="text/javascript">
window.open('<?php 
	if ($role_detail['typevisit'] == 1)
	  //echo 'form1.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita."';
	  echo 'http://www.unipolsai.it/essigRJPW/view/compute.xhtml?tgNm='.$targa."&km=&data=&email=";
	if ($role_detail['typevisit'] == 2)  
	  echo 'http://www.unipolsai.it/fqwebfs/pages/compute.faces?targa='.$targa."&km=&data=&email=";
	if ($role_detail['typevisit'] == 3) 
	  echo 'http://www.unipolsai.it/fqwebpr/pages/compute.faces?targa='.$targa."&km=&data=&email=";
	 
	 
	/* if ($role_detail['typevisit'] == 1)
	  echo "/form1.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	 // echo 'http://www.unipol.fullquote.it/essigRJPW/view/richiesta.xhtml';
	if ($role_detail['typevisit'] == 2)  
	  echo "/form2.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	if ($role_detail['typevisit'] == 3) 
	  echo "/form3.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	   */
	?>','preventivatore');


</script>

<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>

		<div class="center">
			<div class="bottone_wip"><a href="{{ url('/visit/thanks2/'.$id) }}"  ><img src="/images/ESEC_procedi.png" alt="Full quote Unipol" width=385></a><a href="{{ url('/unipol/'.$id) }}" ><img src="/images/ESEC_cancella.png" alt="Full quote Unipol"></a>
			<br/> <span class="h3_home">Hai inserito la targa: <strong>{{$targa}}</strong></span></div>



<div class=" iframe" border=0>
	<h2>La compilazione del preventivo è in corso in un altra scheda.
	
</div>


@stop