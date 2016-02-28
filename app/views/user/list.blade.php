@extends('template.internal')
@section('content')
@include('user.list_breadcrumb')

<div class="row">
	<div class="col-lg-12">
		@if(Session::has('message'))
		<diV class="row">
			<div class="alert alert-success">
				{{Session::get('message')}}
			</div>
		</div>
		@endif
		<!--BEGIN TABLE -->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users"></i>{{Lang::get('users.userlist');}}
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<a href="{{ url('users/add') }}" class="btn green">
							{{Lang::get('users.adduser');}} <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover"  id="{{$DT}}">
					<thead>
						<tr>
							<th>{{Lang::get('users.email')}}</th>
							<th>{{Lang::get('users.name')}}</th>
							
							<th>{{Lang::get('users.role')}}</th>
							<th>Partner</th>
							
							<th>{{Lang::get('users.active');}}</th>
							<th >&nbsp;</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($users_list as $c)
						<tr class="odd gradeX">
							<td>{{ $c['email'] }}</td>
							<td>{{ $c['name'] }} {{ $c['surname'] }}</td>
							<td>{{  Decoder::decodeRole($c['role']) }} </td>
							<td>{{  Decoder::decodePartnerShort($c['partner']) }} </td>
							<td><?php if($c['active'])
								{ ?>
								<span class="btn btn-xs green">{{Lang::get('decode.Yes')}}  - Last access {{  Decoder::decodeDate($c['lastlogin_at']) }} </span>
								@if (Role::isAdmin())
									{{ Form::open(array('url' => 'users/'. $c->id. '/disactivate')) }}
									{{ Form::hidden('_method', 'PUT') }}
									{{ Form::submit(Lang::get('generic.disactivate'),  array('class' =>'btn default btn-xs ')) }}
									{{ Form::close() }}
								@endif
								<?php }else 
								{ ?>
								<span class="btn-xs green">{{Lang::get('decode.No')}}</span>
								@if (Role::isAdmin())
									{{ Form::open(array('url' => 'users/'. $c->id. '/activate')) }}
									{{ Form::hidden('_method', 'PUT') }}
									{{ Form::submit(Lang::get('generic.activate'),  array('class' =>'btn default btn-xs ')) }}
									{{ Form::close() }}
								@endif
								<?php } ?>


								
							</td>
						
							
								<td><a href="{{ url('users/'.$c['id'].'') }}" class="btn default btn-xs green-stripe">{{Lang::get('generic.view');}}</a>
<br/>
									<?php if(Role::isAdministrable($c['role']))
								{ ?>
									<a href="{{ url('users/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>
								<?php } ?>
									<?php 
									if(Role::isAdministrable($c['role']))
									{ ?>
										{{ Form::open(array('url' => 'users/'. $c->id)) }}
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