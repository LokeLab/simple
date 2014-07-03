@extends('template.internal')
@section('content')

<div class="row">
	<div class="col-lg-12">

	<h2>
		
			{{Lang::get('enduser.allOffers');}} 
	</h2>
		
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<!--BEGIN TABLE -->

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt"></i>{{Lang::get('enduser.offertlist');}}
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
								 {{Lang::get('enduser.date');}}
							</th>
							<th>
								 {{Lang::get('enduser.name');}}
							</th>
							<th>
								 {{Lang::get('enduser.email');}}
							</th>
							<th>
								 {{Lang::get('enduser.attribute');}}
							</th>
							<th>
								 {{Lang::get('enduser.offert');}}
							</th>					
							<th>
								 
							</th>	
							
						</tr>
					</thead>
					<tbody>


						@foreach($endusers_list as $c)
						<tr class="odd gradeX">
							<td>
								{{ Decoder::decodeDateTime($c->created_at) }}  
							</td>
							<td>
								{{ $c->surname }}  {{ $c->name }} 
							</td>
						
							<td>
								{{ $c->email }}  
							</td>	
							<td>
								{{Lang::get('enduser.phone')}}: {{ $c->phone }}  <br/>
								{{Lang::get('enduser.other')}}: {{ $c->other }}  
							</td>					
							<td>
								{{Offer::getLabel($c->offer_id)}}
								{{Offer::getRegistration($c->typereg)}}
								@if (Role::isAdmin(Auth::user()->id))
									<br/> {{$c->adv}}
								@endif
							</td>
							<td>
								{{ Decoder::decodeReg($c->typereg)  }}  
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