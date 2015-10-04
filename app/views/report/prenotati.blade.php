

<div class="row">
	<div class="col-lg-12">
		
		<!--BEGIN TABLE -->
		
				<table class="table table-striped table-bordered table-hover"  id="report">
					<thead>
						<tr>
							<th>Data prenotazione</th>
							<th>Email notifica</th>
							<th>Da</th>
							<th>A</th>
							<th>Estratto (data aggiornamento)</th>
							<th >&nbsp;</th>
							<th >&nbsp;</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($report_list as $c)
						<tr class="odd gradeX">
							<td>{{ Decoder::decodeDateTime($c['created_at']) }}</td>
							<td>{{ $c['da_mese'] }}/{{ $c['da_anno'] }}</td>
							<td>{{ $c['email'] }}</td>
							<td>{{ $c['a_mese'] }}/{{ $c['a_anno'] }}</td>
							<td>{{ Decoder::decodeYN($c['estratto']) }} ({{ Decoder::decodeDateTime($c['updated_at']) }})</td>
							<td>
								@if ($c['filename'])
									<a href="{{ url('/excel/exports/'.$c['filename'].'') }}" target="_blank" class="btn default btn-xs green-stripe">Scarica </a>
								@endif
							</td>
							<td>
								{{ Form::open(array('url' => 'async/'. $c->id. '/disactivate')) }}
								{{ Form::hidden('_method', 'POST') }}
								{{ Form::submit('Rimuovi',  array('class' =>'btn default btn-xs ')) }}
								{{ Form::close() }}
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			