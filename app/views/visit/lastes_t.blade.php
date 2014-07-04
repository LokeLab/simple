@extends('template.internal')
@section('content')

<div class="row">
	<div class="col-lg-12">

	<h2>
		
		 
	</h2>
		
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>
				</div>
				

			</div>
			<div class="portlet-body">

			<div class="table-toolbar">
					<div class="btn-group">
						<a href="csv/enduser" class="btn green" style = "margin-right:4px;">
							{{Lang::get('generic.exportcsv');}} <i class="fa fa-file-o"></i>
						</a> 
						<a href="#" class="btn green" style = "margin-right:4px;">
							{{Lang::get('generic.exportxls');}} <i class="fa fa-file-o"></i>
						</a>
						<a href="?all=1" class="btn blue" style = "margin-right:4px;">
							{{Lang::get('enduser.viewall');}} <i class="fa fa-filter"></i>
						</a>
						<a href="?filter=2" class="btn blue" style = "margin-right:4px;">
							{{Lang::get('enduser.reg');}} <i class="fa fa-filter"></i>
						</a><a href="?filter=1" class="btn blue" style = "margin-right:4px;">
							{{Lang::get('enduser.sub');}} <i class="fa fa-filter"></i>
						</a>
					</div>
				</div>
 
				

				<table class="table table-striped table-bordered table-hover"  >
					<thead>
						<tr>
							<th>
								Data visita
							</th>
							<th>
								 Compilata da
							</th>
							<th>
								 Tipo visita 
							</th>
							<th>
								 Locale
							</th>
							<th>
								 Città
							</th>					
							<th>
								 Inserita il 
							</th>	
							
						</tr>
					</thead>
					<tbody>


						@foreach($endusers_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ Decoder::decodeDate($c->visit_at) }}  
							</td>
							<td>
								{{ $c->surname }}  {{ $c->name }} 
							</td>
						
							<td>
								{{ $c->typevisit }}  
							</td>	
							<td>
								  {{ $c->locale }}  

							</td>					
							<td>
								 {{ $c->city }} 
							</td>
							<td>
								{{ Decoder::decodeDateTime($c->created_at) }}  
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