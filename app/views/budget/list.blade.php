@extends('template.internal')

@section('content')
@include('budget.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>Budget detail
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
								 Description
							</th>
							<th>
								 Budget  &euro;
							</th>
							<th>
								 Inserted &euro;
							</th>
							<th>
								 Spent &euro;
							</th>
							<th>
								 Verified &euro;
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
								 {{ $c['description'] }}
							</td>
							<td style="width:15%;text-align: right">
								{{number_format($c['amountbudget'], 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
								{{number_format($c['amountinserted'], 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
								 {{number_format($c['amountspent'], 2, ',', ' ');}}
							</td >
							<td style="width:15%;text-align: right">
								 {{number_format($c['amountverified'], 2, ',', ' ');}}
							</td>
							<td class="center">
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
								Total
							</td>
							<td style="width:15%;text-align: right">
								{{number_format($Tamountbudget, 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
								{{number_format($Tamountinserted, 2, ',', ' ');}}
							</td>
							<td style="width:15%;text-align: right">
								 {{number_format($Tamountspent, 2, ',', ' ');}}
							</td >
							<td style="width:15%;text-align: right">
								 {{number_format($Tamountverified, 2, ',', ' ');}}
							</td>
							<td class="center">
								 
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