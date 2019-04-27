@extends('template.internal')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			
			<a href="{{ url('cost') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
	<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 ">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('navigation.currency');}}
				</div>
			</div>
			<div class="portlet-body">
				
				<table class="table table-striped table-bordered table-hover"  id="{{$DT}}">
					<thead>
						<tr>
							
							<th>
								 {{Lang::get('currency.code');}}
							</th>
							<th>
								  {{Lang::get('currency.description');}}
							</th>
							<th>
								 {{Lang::get('currency.rate');}}
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($currency_list as $c)
						<tr class="odd gradeX">
							<td>
								 {{ $c['description'] }}
							</td>
							<td>
								 {{ $c['longdescription'] }}
							</td>
							
							<td align="right">
								{{ Decoder::formatCost($c->rate, 4, ',', ' ');  }} 
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		<!--END TABLE -->

	</div>
	<div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('budget.currencyhelp');}}
				</div>
			</div>
			<div class="portlet-body">
				{{Lang::get('budget.currencyhelp_long');}}
			</div>
		</div>
	</div>
</div>

@stop