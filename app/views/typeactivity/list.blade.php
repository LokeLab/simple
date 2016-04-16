@extends('template.internal')

@section('content')
@include('typeactivity.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>{{Lang::get('typeactivity.typeactivitylist');}}
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<a href="{{ url('typeactivity/add') }}" class="btn green">
							{{Lang::get('typeactivity.addtypeactivity');}} <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								{{Lang::get('typeactivity.id');}}
							</th>
							<th>
								 {{Lang::get('typeactivity.description');}}
							</th>
							
							<th colspan="2">
								 &nbsp;
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($typeactivity_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c['id'] }}
							</td>
							<td>
								 {{ $c['description'] }}
							</td>
							
							<td class="center">
								 <a href="{{ url('typeactivity/'.$c['id'].'/edit') }}" class="btn default btn-xs blue-stripe">{{Lang::get('generic.edit');}}</a>
							</td>
							<td>
							 
									{{ Form::open(array('url' => 'typeactivity/'. $c->id)) }}
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit(Lang::get('generic.delete'),  array('class' =>'btn default btn-xs red-stripe')) }}
									{{ Form::close() }}
								 
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