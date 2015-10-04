@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}
<style>
body{
	background-image: url('/images/ms_fondo.png')!important;
	background-repeat: no-repeat;
}
.msgeneral
{
	width: 768px;
	height:1024px;
	min-height: 1024px;
	min-width: 768px;
	text-align: center;
}

.mstop
{
padding:0px;
margin:0  ;
width:768px;
height:286px;
}
.msmiddle
{
padding:0px;
margin:0  ;
width:768px;
height:538px;
text-align: center;
}
.msbottom
{
padding:0px;
margin:0 ;
width:768px;
height:203px;
}
.msmiddlewin
{

	position: absolute;
	top: 128px;
	left: 0px;
}
.msmiddlewintext
{

	position: absolute;
top: 380px;
left: 0px;
text-align: center;
width: 768px;
font-size: 79px;
color: red;
}

.bottoni
					{
					background-color: #003563;
					color:#fff;
					padding-top: 10px;
					padding-bottom: 15px;
					height:56px;
				}
				.bottoni a
					{
					background-color: #003563;
					color:#fff;

				}

#watchme {
    
    -webkit-animation:spin 3s linear 1;
    -moz-animation:spin 3s linear 1;
    animation:spin 3s linear 1;
    -webkit-animation-fill-mode: forwards;

    
}
@-moz-keyframes spin { 100% { -moz-transform: rotate({{$degree}}deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate({{$degree}}deg); } }
@keyframes spin { 100% { -webkit-transform: rotate({{$degree}}deg); transform:rotate({{$degree}}deg); } }


</style>
<div class="msgeneral">
	<div class="mstop" id="top"><img src="/images/ms_top.png"></div>
	<div class="msmiddle" id="watchmefix"><img src="/images/ms_play.png" class="image" ></div>
	<div class="msmiddle"><img src="/images/ms_play.png" class="image" id="watchme"> </div>
    
	
</div>
<div class="msmiddlewin" id="winimg" ><img src="/images/ms_win.png" class=""   > 
<div class="bottoni">
	
					<div class="col-md-6 bottoni center">
					<a href="{{ url('/visit/rinuncia/'.$idp.'/'.$id) }}"  >RINUNCIA AL GIRO</a>
				</div><div class="col-md-6 bottoni center">
					<a href="{{ url('/visit/conferma/'.$idp.'/'.$id.'?orario='.$orario.'&sistema='.$sistema ) }}"  >CONFERMA IL PREMIO</a>
</div>
</div>
</div>
<div class="msmiddlewintext" id="winimgh" >{{$hour}} <a href="{{ url('/visit/nextslot/'.$idp.'/'.$id.'?orario='.$orario) }}"><i class="fa fa-forward"></i></a></div>

<div class="msmiddlewin" id="loose"><img src="/images/ms_loose.png" class=""  > 

<div class="bottoni">
	<div class="col-md-4 bottoni"> </DIV>
					<div class="col-md-4 bottoni center">
					<a href="{{ url('/ms') }}"  >RICOMINCIA</a></DIV>
					<div class="col-md-4 bottoni"> </DIV>

</div>

<script type="text/javascript">

var check = function(){

	$("#winimg").fadeOut(0,'linear');
	$("#winimgh").fadeOut(0,'linear');
	$("#loose").fadeOut(0,'linear');
	$("#watchme").fadeOut(0,'linear');

}

$( "#watchmefix" ).mousedown(function() {
	$("#watchme").fadeIn(0);

	$("#watchmefix").fadeOut(0,'linear');
  setInterval(function () {
    setTimeout( 10000); 
    $("#top").fadeOut(1000, 'swing');
    $("#bottom").fadeOut(1000, 'swing');
    $("#watchme").fadeOut(1000,'swing', function(){ 
	@if($win==1)
    	$("#winimg").fadeIn();
    	$("#winimgh").fadeIn();
    });
     @else
    	$("#loose").fadeIn() });
	@endif
   
}, 3000);
});







check();
</script>

 <script language="javascript" src="http://track.adform.net/adfscript/?bn=5078865"></script>
	<noscript>
	<a href="http://track.adform.net/C/?bn=5078865;C=0" TARGET="_blank">
	<img src="http://track.adform.net/adfserve/?bn=5078865;srctype=4;ord=[timestamp]" border="0" width="468" height="60" alt="">
	</a>
	</noscript>
{{ Form::close() }}

@stop