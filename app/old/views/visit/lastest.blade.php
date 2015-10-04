

@foreach($campaigns_list as $c)
<div class="row">
<div class="col-lg-6">
						 {{ Decoder::decodeDateTime($c['created_at'])}} </div><div class="col-lg-6"> {{  $c['targa'] }} </div>
						  
</div>

@endforeach

