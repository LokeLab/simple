@if (Auth::user()->partner == 1)

				<?php
							$budget = 0;
							$spent = 0;
							$verified = 0;
							
						?>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('partners.id');}}
							</th>
							<th>
								 {{Lang::get('partners.description');}}
							</th>
							<th>
								 {{Lang::get('partners.budget');}} &euro;
							</th>
							<th>
								 {{Lang::get('partners.spent');}} &euro;
							</th>
							<th>
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
							<td align="right">
								{{ number_format($c->budget, 2, ',', ' '); }}
							</td>
							<td align="right">
								{{ number_format($c->spent, 2, ',', ' ');  }}
							</td>
							<td align="right">
								{{ number_format($c->verified, 2, ',', ' ');  }}
							</td>
							
							
						</tr>
						<?php
							$budget = $budget + $c->budget;
							$spent = $spent + $c->spent;
							$verified = $verified + $c->verified;

						?>
						@endforeach

						<tr class="odd gradeX " style="background-color:rgb(168, 168, 168); font-weight:bold">
							<td colspan=2>
								Total
							</td>
							<td align="right">
								{{number_format($budget, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($spent, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($verified, 2, ',', ' ');}}
							</td>
							<td>
								 
							</td>
							<td class="center">
								<!-- <a href="{{ url('partners/'.$c->id.'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>-->
							</td>
							
						</tr>
					</tbody>
				</table>
@else

<?php
							$budget = Partner::getBudget(Auth::user()->partner);
							$spent = Partner::getSpent(Auth::user()->partner);


							$perc = round($spent*100 / $budget,2) ;
							$verified = 0;

							$budgetM = 0;
							$spentM = 0;
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
								 {{ number_format($budget, 2, ',', ' '); }}
							</div>
							<div class="desc">
								 Budget
							</div>
						</div>
						<a class="more" href="/budget/{{Auth::user()->partner}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
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
								  {{ number_format($spent, 2, ',', ' '); }}
							</div>
							<div class="desc">
								 Spent ({{$perc}} %)
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								Code
							</th>
							<th>
								 Description
							</th>
							<th>
								 Budget &euro;
							</th>
							<th>
								 Spent &euro;
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
								{{ number_format($c->amount, 2, ',', ' '); }}
							</td>
							<td align="right">
								{{ number_format($c->amountspent, 2, ',', ' '); }}
							</td>
							
							
							
						</tr>
						<?php
							$budgetM = $budgetM + $c->amount;
							$spentM = $spentM + $c->amountspent;
							

						?>
						@endforeach

						<tr class="odd gradeX " style="background-color:rgb(168, 168, 168); font-weight:bold">
							<td colspan=2>
								Total
							</td>
							<td align="right">
								{{number_format($budgetM, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{number_format($spentM, 2, ',', ' ');}}
							</td>
						
							
						</tr>
					</tbody>
				</table>


				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="{{ url('budget/'.Auth::user()->partner) }}" class="btn btn-warning">Budget detail</a>
				</div>
			</div>
			

@endif

