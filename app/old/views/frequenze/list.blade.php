@extends('template.internal')

@section('content')
@include('frequenze.list_breadcrumb')
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->
		<div class="portlet box light-blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>Frequenze premi
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
								Id
							</th>
							<th>
								Fascia oraria
							</th>
							<th>
								Messaggio da sistema
							</th>
							<th>
								Numero slot occupati oggi
							</th>
							<th>
								Frequenza
							</th>
							<th>
								Prenotazione
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ $c['id'] }}<br/>
								 <a href="{{ url('frequenze/'.$c['id'].'/edit') }}" class="btn default btn blue">{{Lang::get('generic.edit');}}</a>
							</td>
							<td>
								 {{ $c['orario'] }}:00 -  {{ $c['orario'] +1 }}:00
							</td>
							<td>
								 {{ $c['sistema'] }}

							</td>
							<td>
								{{Visit::getSlot($c['orario']);}} / {{ $c['giri'] }}<br/>
								@if( Visit::getSlot($c['orario']) > 0)
							     	<a href="{{ url('listafrequenze/'.$c['orario'].'') }}" class="btn default btn blue">Vedi prenotazioni</a>
							    @endif
							</td>
							<td class="center">
								{{ $c['freq'] }}%
							</td>
							<td class="">
								
								 @if (Visit::getSlot($c['orario']) <  $c['giri'] )
								  {{ Form::open(array('url' => 'prenotaposto', 'method' => 'POST')) }}
{{ Form::label('targa', 'Nome') }}
		{{ Form::text('targa', '', array('class'=>'form-control')) }}
		{{Form::hidden('sistema',$c['sistema'])}}
		{{Form::hidden('orario',$c['orario'])}}
		{{ Form::submit('Prenota',  array('class' =>'btn btn-success btn-large')) }}
		{{ Form::close() }}
								  
								  @endif
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