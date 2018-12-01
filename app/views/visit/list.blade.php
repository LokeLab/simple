@extends('template.internal')
@section('content')
<?php 
$decoderowbudget = DB::table('budget')->lists('description', 'id');
if (Auth::user()->role == 1)
{
	if (Input::get('partner'))
 		$rowbudget = DB::table('budget')->wherePartner(Input::get('partner'))->lists('description', 'id');
 	else
 		$rowbudget = array(''=>'All')+DB::table('budget')->lists('description', 'id');
		
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
								{{ Form::select('partner', $arr_parner
	 							, $arrFilter['partner'], array('class' => 'form-control control-inline')) }}
								</div>
								@else
								{{ Form::hidden('partner',  $arrFilter['partner']) }}
							@endif
							<div class="col-lg-1">
								{{ Form::text('code',  $arrFilter['code'], array('class' => 'form-control control-inline', 'placeholder'=>'Id')) }}
							</div>
							<div class="col-lg-5">
								{{ Form::select('budgetrow',  array(''=>'')+$rowbudget, $arrFilter['budgetrow'], array('class' => 'form-control control-inline')) }}
							</div>
							<div class="col-lg-2">
								{{ Form::text('activity',  $arrFilter['activity'], array('class' => 'form-control control-inline', 'placeholder'=>'Activity')) }}
							</div>
							
							<div class="col-lg-12">
							<div class="col-lg-3">

							</div>

							<div class="col-lg-3">
							{{ Form::select('notpayed', [0=>trans('generic.all'), 1=>trans('budget.notpayed')],$arrFilter['notpayed'], array('class'=>'form-control ')) }}  {{trans('budget.notpayed')}}
							</div>

							<div class="col-lg-3">
							{{ Form::select('withproblem', [0=>trans('generic.all'), 1=>trans('generic.yes')],$arrFilter['withproblem'], array('class'=>'form-control ')) }}  {{trans('budget.withproblem')}}
							</div>
							<div class="col-lg-3">
							{{ Form::select('checked', ['0'=>trans('generic.all'), '1'=>trans('generic.yes')],$arrFilter['checked'], array('class'=>'form-control ')) }}  {{trans('budget.checked')}}
							</div>
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
								Date on document
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
								 {{Lang::get('budget.status');}}
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
								{{ Decoder::decodeDate($c->d_document)}}
							</td>
							@if (Auth::user()->role ==1)
							<td align="right">
								{{ $labelshort[$c->partner] }}
							</td>
							@endif
							<td align="left">
								<i  class="fa fa-{{ Budget::getIco($rowbudgetico[$c->budgetrow]) }}"></i>&nbsp;&nbsp;  {{ $decoderowbudget[$c->budgetrow] }}
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
								 <?php
								 if($c->payedby !=4) 
								 	echo trans('budget.payed');
								 else
								 	echo trans('budget.notpayed');
								 echo "<br>";
								 
								 if($c->verified) 
								 	echo trans('budget.checkedok');
								 else if($c->rejected) 
								 	echo '<a href="/visit/'.$c->id.'/edit " class="btn red">'.trans('budget.rejected').'</a>';
								 else if($c->active) 
								 	echo trans('budget.undercheck');
								 
								 ?>
								 
								 
								 
							</td>
							<td>
								
							
								<?php if( $c->verified == 0 && $c->active == 0 && Auth::user()->role != 1) 
								{
								?>
								<a href="/visit/{{ $c->id }}/edit " class="btn blue">{{Lang::get('generic.edit');}}</a>

								{{ Form::open(array('url' => 'visit/'. $c->id)) }}
										{{ Form::hidden('_method', Lang::get('generic.delete')) }}
										{{ Form::submit(Lang::get('generic.delete'),  array('class' =>'btn default  yellow')) }}
										{{ Form::close() }}
								<?php } ?>
								
								<?php if( $c->active == 1 ) 
								{
								?>
								<a href="/visit/{{ $c->id }}/check " class="btn blue">{{Lang::get('generic.view');}}</a>
								<?php } ?>

								<?php if(Auth::user()->role == 1 && $c->verified == 0 ) 
								{
								?>
								<a href="/visit/{{ $c->id }}/edit " class="btn blue">{{Lang::get('generic.edit');}}</a>
							
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