@extends('template.internal')
@section('content')
<?php 
if (Auth::user()->role == 1)
{
 $rowbudget = DB::table('budget')->lists('description', 'id');

$rowbudgetico = DB::table('budget')->lists('kind', 'id');
}else{
 $rowbudget = DB::table('budget')->wherePartner(Auth::user()->partner)->lists('description', 'id');
$rowbudgetico = DB::table('budget')->wherePartner(Auth::user()->partner)->lists('kind', 'id');
}
$labelshort = Partner::lists('short', 'id');
 ?>

<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			
			
		</div>
	</div>
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Inserted cost
				</div>
				

			</div>
			<div class="portlet-body">

			
					<div class="row"><div class="col-lg-12"> 
						
						<div class="col-lg-2">
							<a href="?all=1" class="btn blue" style = "margin-right:4px;">
								{{Lang::get('generic.viewall');}} <i class="fa fa-filter"></i>
							</a> 
						</div>
						{{ Form::open(array('url' => '/visit', 'method' => 'GET')) }}
							
							@if (Auth::user()->role ==1)
							<div class="col-lg-12">

							{{ Form::select('filter', $arr_parner
 							, Input::get('filter'), array('class' => 'form-control control-inline')) }}

							</div>
							@endif
							<div class="col-lg-1">
								{{ Form::text('code',  Input::get('code'), array('class' => 'form-control control-inline', 'placeholder'=>'Id')) }}
							</div>
							<div class="col-lg-5">
								{{ Form::select('local',  array(''=>'')+$rowbudget, Input::get('local'), array('class' => 'form-control control-inline')) }}
							</div>
							<div class="col-lg-2">
								{{ Form::text('name',  Input::get('name'), array('class' => 'form-control control-inline', 'placeholder'=>'Activity')) }}
							</div>
							
							
							<div class="col-lg-2"><button class="btn " type="submit" style="width:80px;"><i class="fa fa-check-filter"></i> {{Lang::get('generic.filter');}}</button></div>
							
							
							
							{{ Form::close()}}
						
						
					</div>
				</div>
				
 
				

				<table class="table table-striped table-bordered table-hover"  >
					<thead>
						<tr>
							<th>
								{{Lang::get('partners.id');}}
							</th>
							<th>
								{{Lang::get('generic.created_at');}}
							</th>
							@if (Auth::user()->role ==1)
							<th>
								{{Lang::get('navigation.partner');}}
							</th>
							@endif
							<th>
								{{Lang::get('budget.budgetrow');}}
							</th>
							<th>
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
								 {{Lang::get('budget.verified');}}
							</th>
							<th>
								 
							</th>	
						</tr>
					</thead>
					<tbody>


						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c->id }}
							</td>
							<td>
								{{ Decoder::decodeDate($c->created_at)}}
							</td>
							@if (Auth::user()->role ==1)
							<td align="right">
								{{ $labelshort[$c->partner] }}
							</td>
							@endif
							<td align="left">
								<i  class="fa fa-{{ Budget::getIco($rowbudgetico[$c->budgetrow]) }}"></i>&nbsp;&nbsp;  {{ $rowbudget[$c->budgetrow] }}
							</td>
							<td align="right">
								{{ $c->currency }}
							</td>
							<td align="right">
								{{Decoder::formatCost($c->netamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{Decoder::formatCost($c->vatamount, 2, ',', ' ');}}
							</td>
							<td align="right">
								{{Decoder::formatCost($c->netamount + $c->vatamount , 2, ',', ' ');}}
							</td>
							<td align="right">
								{{Decoder::decodeYN($c->verified);}}
							</td>
							<td>
								<!--a href="/visit/{{ $c->id }} " class="btn blue">View</a-->
							
								<?php if(Auth::user()->role != 1 && $c->verified == 0 ) 
								{
								?>
								<a href="/visit/{{ $c->id }}/edit " class="btn blue">{{Lang::get('generic.edit');}}</a>

								{{ Form::open(array('url' => 'visit/'. $c->id)) }}
										{{ Form::hidden('_method', Lang::get('generic.delete')) }}
										{{ Form::submit(Lang::get('generic.delete'),  array('class' =>'btn default  yellow')) }}
										{{ Form::close() }}
								<?php } ?>
								
								<?php if(Auth::user()->role == 1) 
								{
								?>
								<a href="/visit/{{ $c->id }}/edit " class="btn blue">{{Lang::get('generic.check');}}</a>
							
								<?php } ?>
							</td>
							
							
						</tr>
						@endforeach
					</tbody>
				</table>
				<?php echo $roles_list->appends(Input::all())->links(); ?>
			</div>

		</div>
		<!--END TABLE -->

	</div>
</div>

@stop