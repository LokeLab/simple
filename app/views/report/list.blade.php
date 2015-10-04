@extends('template.internal')
@section('content')

<div class="row">
	<div class="col-lg-12">
	<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report mensili (valori massimi)
				</div>
				

			</div>
			<div class="portlet-body">
				<div class="row">
				@foreach($datemese_list as $cl)
					<div class="col-lg-3">

						 <a href="/export/monthallmax/{{ $cl->anno}}/{{ $cl->mese}}" class="btn blue" style = "margin-right:4px;">
						 {{$cl->mese}}/{{$cl->anno}} <i class="fa fa-file-o"></i>
					</a>   
					</div>	
				@endforeach
					</div>	
			<div class="row">
				<div class="col-lg-12">

					@if (Input::has('error') )
			

				<div class="alert alert-danger">
			    
			      <span>{{ Input::get('error') }}</span><br />
			   
			  </div>
			  @endif

			  @if (Input::has('message') )
			

				<div class="alert alert-warning">
			    
			      <span>{{ Input::get('message') }}</span><br />
			   
			  </div>
			  @endif
				{{ Form::open(array('url' => 'reportingMax', 'method' => 'POST')) }}
				<div class="row">
					<div class="col-lg-2">Da</div>
					<div class="col-lg-3">  <select id="data_da" name="data_da">
						@foreach($datemese_list as $cl)
							<option value="{{$cl->anno*100 + $cl->mese}}"  >{{$cl->mese}}/{{$cl->anno}}</option>
							<?php break; ?>
						@endforeach

					</select></div>
					<div class="col-lg-2">A</div>
					<div class="col-lg-3"><select id="data_a" name="data_a">
						@foreach($datemese_list as $cl)
							<option value="{{$cl->anno*100 + $cl->mese}}"  >{{$cl->mese}}/{{$cl->anno}}</option>
						@endforeach

					</select></div>
					<div class="col-lg-2"> </div>
					<div class="col-lg-4">{{ Form::label('email notifica', Lang::get('users.email'), array('class'=>'control-label ')) }}  </div>

					<div class="col-lg-4">
		{{ Form::text('email', Auth::user()->email, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}</div>
					<div class="col-lg-4">{{ Form::submit('Prenota',  array('class' =>'btn blue btn-large')) }}</div>
					{{Form::hidden('tipoform', 1 )}}
						</div>
				
					
				
			{{ Form::close() }}
			@include('report/prenotatiMax')
		
			</div>
		</div>
	</div>

	</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report complessivi per risorsa (tutte le visite)
				</div>
				

			</div>
			<div class="portlet-body">

			<div class="row">

				 @foreach($roles_list as $c)
					<div class="col-lg-3">

						 <a href="/export/useralldetail/{{ $c->id}}" alt="Tutte le visite per {{ $c->surname }} {{ $c->name }}  " title="Tutte le visite per {{ $c->surname }} {{ $c->name }}  " class="btn green" style = "margin-right:4px;">
						{{ $c->surname }}  {{ $c->name }}  <i class="fa fa-filter"></i>
					</a>   
					</div>	
				@endforeach
			</div>
		</div>
</div>
</div>

</div>
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report periodici
				</div>
				

			</div>
			<div class="portlet-body">

			<div class="row">
				 @foreach($datemese_list as $cl)
					<div class="col-lg-3">

						 <a href="/reporting?anno={{ $cl->anno}}&mese={{ $cl->mese}}" class="btn {{($cl->mese ==$fmese && $cl->anno==$fanno)?"orange":"green"}}" style = "margin-right:4px;">
						 {{$cl->mese}}/{{$cl->anno}} <i class="fa fa-filter"></i>
					</a>   
					</div>	
				@endforeach
			</div>
 
				

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
									 <a href="/export/weekall/{{ $cl->anno}}/{{ $cl->settimana}}" alt="Tutte le visite - {{ $cl->period}} " title="Tutte le visite - {{ $cl->period}} "  class="btn green" style = "margin-right:4px;">
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
									 <a href="/export/weekRoleall/{{ $cl->anno}}/{{ $cl->settimana}}/{{$i}}" alt="Tutte le visite per ruolo {{Role::getLabel($i)}} - {{ $cl->period}} "  title="Tutte le visite per ruolo {{Role::getLabel($i)}} - {{ $cl->period}} " class="btn green" style = "margin-right:4px;">
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
									 <a href="/export/week/{{ $cl->anno}}/{{ $cl->settimana}}/{{ $c->id}}" alt="Tutte le visite per {{ $c->surname }} {{ $c->name }}  - {{ $cl->period}} " title="Tutte le visite per {{ $c->surname }} {{ $c->name }}  - {{ $cl->period}} " class="btn green" style = "margin-right:4px;">
									 <i class="fa fa-file-o" ></i>
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


<div class="row">
	<div class="col-lg-12">
	<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>Report mensili (valori medi)
				</div>
				

			</div>
			<div class="portlet-body">
				<div class="row">
				@foreach($datemese_list as $cl)
					<div class="col-lg-3">

						 <a href="/export/monthall/{{ $cl->anno}}/{{ $cl->mese}}" class="btn yellow" style = "margin-right:4px;">
						 {{$cl->mese}}/{{$cl->anno}} <i class="fa fa-file-o"></i>
					</a>   
					</div>	
				@endforeach
					</div>	

					@if (Input::has('error') )
			

				<div class="alert alert-danger">
			    
			      <span>{{ Input::get('error') }}</span><br />
			   
			  </div>
			  @endif

			  @if (Input::has('message') )
			

				<div class="alert alert-warning">
			    
			      <span>{{ Input::get('message') }}</span><br />
			   
			  </div>
			  @endif
				{{ Form::open(array('url' => 'reporting', 'method' => 'POST')) }}
				<div class="row">
					<div class="col-lg-2">Da</div>
					<div class="col-lg-3">  <select id="data_da" name="data_da">
						@foreach($datemese_list as $cl)
							<option value="{{$cl->anno*100 + $cl->mese}}"  >{{$cl->mese}}/{{$cl->anno}}</option>
						@endforeach

					</select></div>
					<div class="col-lg-2">A</div>
					<div class="col-lg-3"><select id="data_a" name="data_a">
						@foreach($datemese_list as $cl)
							<option value="{{$cl->anno*100 + $cl->mese}}"  >{{$cl->mese}}/{{$cl->anno}}</option>
						@endforeach

					</select></div>
					<div class="col-lg-2"> </div>
					<div class="col-lg-4">{{ Form::label('email notifica', Lang::get('users.email'), array('class'=>'control-label ')) }}  </div>

					<div class="col-lg-4">
		{{ Form::text('email', Auth::user()->email, array('class'=>'form-control required', 'placeholder'=>Lang::get('users.email'))) }}</div>
					<div class="col-lg-4">{{ Form::submit('Prenota',  array('class' =>'btn yellow btn-large')) }}</div>

				</div>
				
					{{Form::hidden('tipoform', 2 )}}
				
			{{ Form::close() }}
			@include('report/prenotati')
		
			</div>

	</div>
</div>



	</div>
</div>
</div>

@stop