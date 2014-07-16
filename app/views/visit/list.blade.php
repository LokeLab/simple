@extends('template.internal')
@section('content')


<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Visite a sistema
				</div>
				

			</div>
			<div class="portlet-body">

			<div class="table-toolbar">
					<div class="btn-group">
						
						
						<a href="?all=1" class="btn blue" style = "margin-right:4px;">
							{{Lang::get('enduser.viewall');}} <i class="fa fa-filter"></i>
						</a>
						<a href="?filter=1" class="btn blue" style = "margin-right:4px;">
							Advocacy <i class="fa fa-filter"></i>
						</a><a href="?filter=2" class="btn blue" style = "margin-right:4px;">
							Consumer <i class="fa fa-filter"></i>
						</a>
						<a href="?filter=3" class="btn blue" style = "margin-right:4px;">
							Autogestito <i class="fa fa-filter"></i>
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
							<th>
								 
							</th>	
						</tr>
					</thead>
					<tbody>


						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ Decoder::decodeDate($c->visit_at) }}  
							</td>
							<td>
								{{ $c->surname }}  {{ $c->name }} 
							</td>
						
							<td>
								{{ Visit::getTypeLabel($c->typevisit) }}  
							</td>	
							<td>
								  {{ $c->local }}  

							</td>					
							<td>
								 {{ $c->city }} 
							</td>
							<td>
								{{ Decoder::decodeDateTime($c->created_at) }}  
							</td>	
							<td>
								<a href="/visit/{{ $c->id }} " class="btn blue">Visualizza</a>
							</td>
							
							
							
						</tr>
						@endforeach
					</tbody>
				</table>
				<?php echo $roles_list->links(); ?>
			</div>

		</div>
		<!--END TABLE -->

	</div>
</div>

@stop