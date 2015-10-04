@extends('template.internal')
@section('content')


<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Targhe a sistema
				</div>
				

			</div>
			<div class="portlet-body">

			
					<div class="row"><div class="col-lg-12"> 
						&nbsp;
						<a href="/export/all" class="btn blue" style = "margin-right:4px;">
						 Scarica tutto <i class="fa fa-file-o"></i>
						</a>

					</div>
				</div>
				
 
				

				<table class="table table-striped table-bordered table-hover"  >
					<thead>
						<tr>
							<th>
								ID
							</th>
							<th>
								 Tipo preventivo 
							</th>
						<!--	<th>
								 Già cliente?
							</th>
							<th>
								 Errore
							</th>-->
							<th>
								 Targa
							</th>					
							<th>
								 Inserita il 
							</th>	
							<!--<th>
								 Premio
							</th>	-->
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
								{{ Visit::getTypeLabel($c->typevisit) }}  
							</td>	
							<!--<td>
								 {{ Decoder::decodeYN($c->km) }} 
							</td>
							<td>
								 {{ Decoder::decodeYN($c->errore) }} 
							</td>			-->
							<td>
								 {{ $c->targa }} 
							</td>
							<td>
								{{ Decoder::decodeDateTime($c->created_at) }}  
							</td>	
							<!--<td>
								@if ($c->giorno > 0)
									Si ( giorno {{$c->giorno}} - fascia oraria {{$c->sistema}})
								@else
									No
								@endif
							</td>	-->
							
							<td>
								
								{{ Form::open(array('url' => 'visit/'. $c->id)) }}
										{{ Form::hidden('_method', 'DELETE') }}
										{{ Form::submit( 'Cancella',  array('class' =>'btn default btn-xs red-stripe')) }}
										{{ Form::close() }}
								
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