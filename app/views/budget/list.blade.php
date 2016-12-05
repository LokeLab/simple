@extends('template.internal')

@section('content')
@include('budget.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('budget.detail');}}
				</div>
			</div>
			<div class="portlet-body">
				<!--<div class="table-toolbar">
					<div class="btn-group">
						<a href="{{ url('roles/add') }}" class="btn green">
							{{Lang::get('roles.addrole');}} <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>-->
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							
							<th>
								 {{Lang::get('budget.description');}}
							</th>
							<th>
								 {{Lang::get('budget.budget');}}  &euro;
							</th>
							<th>
								 {{Lang::get('budget.inserted');}} &euro;
							</th>
							<th>
								 {{Lang::get('budget.spent');}} &euro;
							</th>
							<th>
								 {{Lang::get('budget.verified');}} &euro;
							</th>
							<th colspan="1">
								 &nbsp;
							</th>
						</tr>
					</thead>
					<tbody>
					<?php 

							$Tamountbudget		= 0;
							$Tamountinserted	= 0;
							$Tamountspent		= 0;
							$Tamountverified 	= 0;

						?>
						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							
							<td>
								<i  class="fa fa-{{ Budget::getIco($c['kind']) }}"></i>&nbsp;&nbsp; {{ $c['description'] }}
							
							</td>
							<td style="width:15%;text-align: right">
								{{Decoder::formatCost($c['amountbudget'], 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
							{{Decoder::formatPercentCost($c->amountinserted,$c->amountbudget)}}
								
							</td>
							<td style="width:15%;text-align: right">
								{{Decoder::formatPercentCost($c->amountspent,$c->amountbudget)}}
								  
							</td >
							<td style="width:15%;text-align: right">
							{{Decoder::formatPercentCost($c->amountverified,$c->amountbudget)}}
								 
							</td>
							<td class="center">
							<a href="{{ url('visit?budgetrow='.$c['id']) }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.view');}}</a>
								 <!--a href="{{ url('budget/'.$c['partner'].'/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a-->
							</td>
							
						</tr>

						<?php 

							$Tamountbudget		+= $c['amountbudget'];
							$Tamountinserted	+= $c['amountinserted'];
							$Tamountspent		+= $c['amountspent'];
							$Tamountverified 	+= $c['amountverified'];

						?>
						@endforeach
						<tfoot class="bg-blue">
							
							<td>
								{{Lang::get('budget.total');}}
							</td>
							<td style="width:15%;text-align: right">
								{{Decoder::formatCost($Tamountbudget, 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
							{{Decoder::formatPercentCost($Tamountinserted,$Tamountbudget)}}
							
							</td>
							<td style="width:15%;text-align: right">{{Decoder::formatPercentCost($Tamountspent,$Tamountbudget)}}
							
							</td >
							<td style="width:15%;text-align: right">{{Decoder::formatPercentCost($Tamountverified,$Tamountbudget)}}
								 
							</td>
							<td class="center">
								 <a href="{{ url('visit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.viewall');}}</a>
								 <!--a href="{{ url('budget/'.$c['partner'].'/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a-->
							</td>
							</td>

						</tfoot>
					</tbody>
				</table>
			</div>

		</div>
		<!--END TABLE -->

	</div>
</div>

@stop