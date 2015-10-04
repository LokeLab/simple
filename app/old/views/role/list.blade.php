@extends('template.internal')

@section('content')
@include('role.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('roles.rolelist');}}
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
								{{Lang::get('roles.id');}}
							</th>
							<th>
								 {{Lang::get('roles.description');}}
							</th>
							<th>
								 {{Lang::get('roles.update');}}
							</th>
							<th>
								 {{Lang::get('roles.usersinrole');}}
							</th>
							<th colspan="2">
								 &nbsp;
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c['id'] }}
							</td>
							<td>
								 {{ $c['description'] }}
							</td>
							<td>
								{{ Decoder::decodeYN($c['update']) }}
							</td>
							<td>
								 {{User::getNumberofUsersInRole($c['id'])}}
							</td>
							<td class="center">
								 <a href="{{ url('roles/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>
							</td>
							<td>
								<?php 
								if(User::getNumberofUsersInRole($c['id']) <= 0)
								{ ?>
									{{ Form::open(array('url' => 'roles/'. $c->id)) }}
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