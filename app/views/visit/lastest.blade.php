<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('partners.id');}}
							</th>
							<th>
								Created at
							</th>
							@if (Auth::user()->role == 1 )
							<th>
								Partner
							</th>
							@endif
							<th>
								Row
							</th>
							<th class="center">
								 <i class="fa fa-money"></i>
							</th>
							<th>
								 Net amount
							</th>
							<th>
								 VAT amount
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
							@if (Auth::user()->role == 1 )
									<td align="left">
										{{ $c->short }}
									</td>
							@endif
							<td align="left">
								{{ Budget::getLabel($c->row) }}
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
								{{number_format($c->netamount + $c->vatamount, 2, ',', ' ');}} 
							</td>
							
						</tr>
						@endforeach
						
					</tbody>
