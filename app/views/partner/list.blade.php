@extends('template.internal')

@section('content')
@include('partner.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('partners.rolelist');}}
				</div>
			</div>
			<div class="portlet-body">
				<!--<div class="table-toolbar">
					<div class="btn-group">
						<a href="{{ url('partners/add') }}" class="btn green">
							{{Lang::get('partners.addrole');}} <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>-->
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
								Short
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
							<th>
								 {{Lang::get('partners.usersinrole');}}
							</th>
							<th colspan="1">
								 &nbsp;
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
								{{ $c->short }}
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
							<td >
								 {{User::getNumberofUsersInPartner($c->id)}}
							</td>
							<td class="center">
								<!-- <a href="{{ url('partners/'.$c->id.'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>-->
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
			</div>

		</div>
		<!--END TABLE -->

	</div>
</div>

@stop