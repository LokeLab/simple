@extends('template.public')

@section('content')
{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}
<style>
.msgeneral
{
	width: 100%;
	height:100%;
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

</style>
<div class="mstop"><img src="/images/ms_top.png"></div>
<div class="msmiddle"><a href="{{ url('/visit/msplay/'.$idp.'/'.$id) }}"><img src="/images/ms_play.png" class="image" id="watchme"></a></div>
<div class="msbottom"><img src="/images/ms_bottom.png"></div>

{{ Form::close() }}

@stop