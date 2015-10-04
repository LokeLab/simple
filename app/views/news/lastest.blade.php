

@foreach($news_list as $c)

<h4>{{ Decoder::decodeDate($c['created_at'])}} - {{  $c['title'] }} </h4>
						  <p> {{ $c['description'] }} </p>
	
@endforeach

