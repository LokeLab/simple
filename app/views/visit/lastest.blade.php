

@foreach($campaigns_list as $c)
<div class="row">
<div class="col-lg-2">
						 {{ Decoder::decodeDate($c['visit_at'])}} </div><div class="col-lg-4"> {{  $c['local'] }} ({{  $c['city'] }} )</div>
						  <div class="col-lg-6"> ({{  User::getLabel($c['user_created']) }}) <a href="visit/{{ $c['id']}}" class="green"><i class="fa fa-eye"></i></a>
</div>
</div>				
	
@endforeach

