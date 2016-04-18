<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('partners.id');}}
							</th>
							<th>
								{{Lang::get('generic.created_at');}}
							</th>
							@if (Auth::user()->role == 1 )
							<th>
								{{Lang::get('navigation.partner');}}
							</th>
							@endif
							<th>
								{{Lang::get('budget.budgetrow');}}
							</th>
							<th class="center">
								{{Lang::get('budget.currency');}}
							</th>
							<th>
								 {{Lang::get('budget.netamount');}}
							</th>
							<th>
								 {{Lang::get('budget.vatamount');}}
							</th>
							<th>
								 {{Lang::get('budget.total');}}
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
								{{ Budget::getLabel($c->budgetrow) }}
							</td>
							<td align="right">
								{{ $c->currency }}
							</td>
							<td align="right">
								<nobr>{{Decoder::formatCost($c->netamount, 2, ',', ' ');}}</nobr>
							</td>
							<td align="right">
								<nobr>{{Decoder::formatCost($c->vatamount, 2, ',', ' ');}}</nobr>
							</td>
							<td align="right">
								<nobr>{{Decoder::formatCost($c->netamount + $c->vatamount, 2, ',', ' ');}}</nobr> 
							</td>
							
						</tr>
						@endforeach
						
					</tbody>
