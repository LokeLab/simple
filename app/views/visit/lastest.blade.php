<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('partners.id');}}
							</th>
							<th>
								Created at
							</th>
							<th>
								Partner
							</th>
							<th>
								Row
							</th>
							<th>
								 Currency
							</th>
							<th>
								 Net amount
							</th>
							<th>
								 VAT amount
							</th>
							<th>
								Euro Net amount 
							</th>
							<th>
								 Euro Vat amount
							</th>
							<th>
								 Total
							</th>
							<th>
								 
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($visit_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c->id }}
							</td>
							<td>
								{{ Decoder::decodeDate($c->created_at)}}
							</td>
							<td align="right">
								{{ $c->short }}
							</td>
							<td align="right">
								{{ $c->row }}
							</td>
							<td align="right">
								{{ $c->currency }}
							</td>
							<td align="right">
								{{number_format($c->netamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($c->vatamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($c->euronetamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($c->eurovatamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($c->eurototal, 2, ',', ' ');}}
							</td>
							
						</tr>
						@endforeach
						
					</tbody>
