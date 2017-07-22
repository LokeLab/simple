@if (Auth::user()->partner == 1)

				<?php
							$budget = 0;
							$spent = 0;
							$verified = 0;
							$inserted = 0;
							
						?>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th width="3%">
								{{Lang::get('partners.id');}}
							</th>
							<th width="25%">
								 {{Lang::get('partners.description');}}
							</th>
							<th width="12%">
								 {{Lang::get('partners.budget');}} &euro;
							</th>
							<th width="20%"> 
								 {{Lang::get('budget.inserted');}} &euro;
							</th>
							<th width="20%">
								 {{Lang::get('partners.spent');}} &euro;
							</th>
							<th width="20%">
								 {{Lang::get('partners.verified');}} &euro;
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($partners_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c->id }}
							</td>
							<td>
								 {{ $c->description }}
							</td>
							<td  class="economic">
							{{ Decoder::formatCost($c->budget, 2, ',', ' ');  }}
								
							</td>
							<td class="economic">
								{{Decoder::formatPercentCost($c->inserted,$c->budget)}}
							</td>
							<td class="economic">
								 {{Decoder::formatPercentCost($c->spent + round($c->spent *0.05,2),$c->budget)}}
							</td>
							<td class="economic">
								{{Decoder::formatPercentCost($c->verified + round($c->verified*0.05,2),$c->budget)}}
							</td>
							
							
						</tr>
						<?php
							$inserted = $inserted + $c->inserted;
							
							$budget = $budget + $c->budget;
							$spent = $spent + $c->spent;
							$verified = $verified + $c->verified;

						?>
						@endforeach

						<tr class="odd gradeX " style="background-color:rgb(168, 168, 168); font-weight:bold">
							<td colspan=2>
								
							
							Total
							</td>
							<td class="economic">
								{{Decoder::formatCost($budget, 2, ',', ' ');}}
							</td>
							<td class="economic">
								 {{Decoder::formatPercentCost($inserted,$budget)}}
							</td>
							
							<td class="economic">
								{{Decoder::formatPercentCost($spent,$budget)}}
							</td>
							<td class="economic">
								{{Decoder::formatPercentCost($verified,$budget)}}
							</td>
							
						</tr>
					</tbody>
				</table>
@else

<?php
							$budget = Partner::getBudget(Auth::user()->partner);
							$spent = Partner::getSpent(Auth::user()->partner);
							$verified = Partner::getVerified(Auth::user()->partner);


							$perc = round($spent*100 / $budget,2) ;
							$verified = 0;

							$budgetM = 0;
							$spentM = 0;
							$verifiedM = 0;
							$budget_list = DB::table('v_budget_macro')->wherePartner(Auth::user()->partner)->orderby('macro1','asc')->get();
							
						?>

	<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ Decoder::formatCost($budget, 2, ',', ' '); }}
							</div>
							<div class="desc">
								 {{Lang::get('budget.budget');}}
							</div>
						</div>
						<a class="more" href="/budget/{{Auth::user()->partner}}">
						{{Lang::get('generic.viewmore');}} <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-tags"></i>
						</div>
						<div class="details">
							<div class="number">
								  {{ Decoder::formatCost($spent, 2, ',', ' '); }}
							</div>
							<div class="desc">
								  {{Lang::get('budget.spent');}} ({{$perc}} %)
							</div>
						</div>
						<a class="more" href="/budget/{{Auth::user()->partner}}">
							 {{Lang::get('generic.viewmore');}} <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('budget.code');}}
							</th>
							<th>
								 {{Lang::get('budget.description');}}
							</th>
							<th>
								 {{Lang::get('budget.budget');}} &euro;
							</th>
							<th>
								 {{Lang::get('budget.spent');}} &euro;
							</th>
							<th width="20%">
								 {{Lang::get('partners.verified');}} &euro;
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($budget_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c->macro1 }}
							</td>
							<td>
								 {{ $c->description }}
							</td>
							<td align="right">
								{{ Decoder::formatCost($c->amount, 2, ',', ' '); }}
							</td>
							<td align="right">

							@if ($c->macro1<5)
							    {{Decoder::formatPercentCost($c->amountspent,$budgetM)}}
							@else
								{{Decoder::formatPercentCost(round( $spentM*0.05,2) ,$budgetM)}}
							@endif
								
							</td>
							<td align="right">
							@if ($c->macro1<5)
							    {{Decoder::formatPercentCost($c->amountverified,$budgetM)}}
							@else
								{{Decoder::formatPercentCost(round( $verifiedM*0.05,2) ,$budgetM)}}
							@endif
								
								
							</td>
							
							
							
						</tr>
						<?php
							$budgetM = $budgetM + $c->amount;
							
							if ($c->macro1<5)
							{
								$verifiedM = $verifiedM + $c->amountverified;
								$spentM = $spentM + $c->amountspent;
							}
							else
							{
								$verifiedM = $verifiedM + round( $verifiedM*0.05,2);
								$spentM = $spentM + round( $spentM*0.05,2);
							}


						?>
						@endforeach

						<tr class="odd gradeX " style="background-color:rgb(168, 168, 168); font-weight:bold">
							<td colspan=2>
								{{Lang::get('budget.total');}}
							</td>
							<td align="right">
								{{Decoder::formatCost($budgetM, 2, ',', ' ');}}
							</td>
							<td align="right">

							    {{Decoder::formatPercentCost($spentM,$budgetM)}}
							</td>
							<td align="right">
							
							    {{Decoder::formatPercentCost($verifiedM,$budgetM)}}
							
							
							</td>
						
							
						</tr>
					</tbody>
				</table>


				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="{{ url('budget/'.Auth::user()->partner) }}" class="btn btn-warning">{{Lang::get('budget.detail');}} &euro;</a>
				</div>
			</div>
			

@endif

