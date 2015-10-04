@extends('template.internal')
@section('content')


<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Visite non complete a sistema
				</div>
				

			</div>
			<div class="portlet-body">

			
					<div class="row"><div class="col-lg-12"> 
						
						<div class="col-lg-2">
							<a href="?all=1" class="btn blue" style = "margin-right:4px;">
								{{Lang::get('enduser.viewall');}} <i class="fa fa-filter"></i>
							</a>
						</div>
						{{ Form::open(array('url' => '/visitSospese', 'method' => 'GET')) }}
							

							<div class="col-lg-3">

							{{ Form::select('filter', array('0' => 'Tutte' , '1'=>'Advocacy','2'=>'Consumer','3'=>'Autogestito' )
							, Input::get('filter'), array('class' => 'form-control control-inline')) }}

							</div>
							<div class="col-lg-1">
							{{ Form::text('code',  Input::get('code'), array('class' => 'form-control control-inline', 'placeholder'=>'Codice')) }}
							</div>
							<div class="col-lg-2">
							{{ Form::text('local',  Input::get('local'), array('class' => 'form-control control-inline', 'placeholder'=>'Locale')) }}
							</div>
							<div class="col-lg-2">
							{{ Form::text('name',  Input::get('name'), array('class' => 'form-control control-inline', 'placeholder'=>'Compilata da')) }}

							</div>
							
							
							<div class="col-lg-2"><button class="btn " type="submit" style="width:80px;"><i class="fa fa-check-filter"></i> Filtra</button></div>
							
							
							
							{{ Form::close()}}
						
						
					</div>
				</div>
				
 
				

				<table class="table table-striped table-bordered table-hover"  >
					<thead>
						<tr>
							<th>
								ID
							</th>
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
								{{ $c->id }}  
							</td>
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
								<?php if(Auth::user()->role < 10) 
								{
								?>
								<a href="/visit/{{ $c->id }}/edit " class="btn blue">Recupera</a>
								<?php } ?>
								<?php if(Auth::user()->role < 10) 
								{
								?>
								{{ Form::open(array('url' => 'visitSospese/'. $c->id)) }}
										{{ Form::hidden('_method', 'DELETE') }}
										{{ Form::submit(Lang::get('generic.delete'),  array('class' =>'btn default  yellow')) }}
										{{ Form::close() }}
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