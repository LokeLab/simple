@extends('template.internal')
@section('content')


<div class="row">
	<div class="col-lg-12">
	<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report mensili
				</div>
				

			</div>
			<div class="portlet-body">
				<div class="row">
				@foreach($datemese_list as $cl)
					<div class="col-lg-3">

						 <a href="/export/monthall/{{ $cl->anno}}/{{ $cl->mese}}" class="btn blue" style = "margin-right:4px;">
						 {{$cl->mese}}/{{$cl->anno}} <i class="fa fa-file-o"></i>
					</a>   
					</div>	
				@endforeach
					</div>	
			</div>

	</div>
</div>
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report periodici
				</div>
				

			</div>
			<div class="portlet-body">

			
 
				

				<table class="table table-striped table-bordered table-hover"  >
					<thead>
						<tr>
							<th>
								 Compilatore 
							</th>
							@foreach($date_list as $cl)
							<th>
								 {{ $cl->period}}
							</th>	
							@endforeach
						</tr>
					</thead>
					<tbody>

						<tr class="odd gradeX">
							
							<td>
								Tutte le visite 
							</td>
						
						
								@foreach($date_list as $cl)
								<td>
									 <a href="/export/weekall/{{ $cl->anno}}/{{ $cl->settimana}}" class="btn green" style = "margin-right:4px;">
									 <i class="fa fa-file-o"></i>
								</a>   
								</td>	
								@endforeach
								 
							
							
							
							
							
						</tr>

						@for ($i = 2; $i < 6; $i++)
				           <tr class="odd gradeX">
							
							<td >
								Tutte le visite {{Role::getLabel($i)}}
							</td>
						
						
								@foreach($date_list as $cl)
								<td>
									 <a href="/export/weekRoleall/{{ $cl->anno}}/{{ $cl->settimana}}/{{$i}}" class="btn green" style = "margin-right:4px;">
									 <i class="fa fa-file-o"></i>
								</a>   
								</td>	
								@endforeach
								 
							
							
							
							
							
						</tr>
				       @endfor
						
						@foreach($roles_list as $c)
						<tr class="odd gradeX">
							
							<td>
								{{ $c->surname }}  {{ $c->name }} 
							</td>
						
						
								@foreach($date_list as $cl)
								<td>
									 <a href="/export/week/{{ $cl->anno}}/{{ $cl->settimana}}/{{ $c->id}}" class="btn green" style = "margin-right:4px;">
									 <i class="fa fa-file-o"></i>
								</a>   
								</td>	
								@endforeach
								 
							
							
							
							
							
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