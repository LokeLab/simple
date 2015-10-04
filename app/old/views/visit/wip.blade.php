@extends('template.public')

@section('content')
<?php
$targa = $_GET['targa'];
$km = $_GET['km'];
$data_nascita = $_GET['data_nascita'];



?>



<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
@if (false)
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
@endif 
		<div class="center">
			<div class="bottone_wip"><a href="{{ url('/visit/thanks/'.$idp.'/'.$id) }}"  ><img src="/images/ESEC_procedi.png" alt="Full quote Unipol" width=385></a><a href="{{ url('/redir/'.$idp) }}" ><img src="/images/ESEC_cancella.png" alt="Full quote Unipol"></a>
				<br/> <span class="h3_home">Hai inserito la targa: <strong>{{$targa}}</strong></span></div>
<div class=" iframe" border=0>
	<iframe class="iframe" src="<?php 
	/*if ($role_detail['typevisit'] == 1)
	  echo 'form1.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita."';
	 // echo 'http://www.unipol.fullquote.it/essigRJPW/view/richiesta.xhtml';
	if ($role_detail['typevisit'] == 2)  
	  echo 'form2.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita."';
	if ($role_detail['typevisit'] == 3) 
	  echo 'form3.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita."';
	  */
	 
	 if ($role_detail['typevisit'] == 1)
	  echo "/form1.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	 // echo 'http://www.unipol.fullquote.it/essigRJPW/view/richiesta.xhtml';
	if ($role_detail['typevisit'] == 2)  
	  echo "/form2.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	if ($role_detail['typevisit'] == 3) 
	  echo "/form3.php?targa=".$targa."&km=".$km."&data_nascita=".$data_nascita;
	?>"> 
	
</div>


@stop