@extends('template.internal')

@section('content')
@include('activities.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('activities.activitieslist');}}
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<a href="{{ url('activities/add') }}" class="btn green">
							{{Lang::get('activities.addactivities');}} <i class="fa fa-plus"></i>
						</a> <a href="{{ url('activitiesrecapp') }}" class="btn yellow">
							{{Lang::get('activities.recappactivities');}} 
						</a>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover" id="userTable">
					<thead>
						<tr>
							<th>
								{{Lang::get('activities.id');}}
							</th>
							<th>
								 {{Lang::get('activities.description');}}
							</th>
							<th>
								 {{Lang::get('navigation.partner');}}
							</th>
						
							<th>
								 {{Lang::get('activities.closed');}}
							</th>
							<th colspan="2">
								 &nbsp;
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($activities_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c['id'] }}
							</td>
							<td>
								 {{ $c['activity'] }}
							</td>

							<td>
								 {{ Partner::getLabel($c['partner']) }}
							</td>
						
							<td>
								 {{ Decoder::decodeYN($c['closed']) }}
							</td>
							<td class="center">
								 <a href="{{ url('activities/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>
							</td>
							<td>
								<?php 
								if($c['closed'] == 0)
								{ ?>
									{{ Form::open(array('url' => 'activities/'. $c->id)) }}
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit(Lang::get('generic.delete'),  array('class' =>'btn default btn-xs red-stripe')) }}
									{{ Form::close() }}
								<?php } ?>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		<!--END TABLE -->

	</div>
</div>

@stop