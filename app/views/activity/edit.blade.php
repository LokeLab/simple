@extends('template.internal')

@section('content')
@include('activity.edit_breadcrumb')
<?php 

 $nation = DB::table('country')->lists('description', 'id');
 $informationsources = DB::table('activities_detail')->whereActivity($activities_detail->id)->get();

 ?>
{{ Form::open(array('url' => 'activities/'. $activities_detail->id, 'method' => 'PUT', 'class' =>'form-horizontal form-row-seperated')) }}	
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<!--BEGIN SAVE MENU -->
			<div class="portlet-title">
				
				<div class="actions btn-set">
					<a href="{{ url('activities') }}" class="btn blue"><i class="fa fa-angle-left"></i>&nbsp;{{Lang::get('generic.back');}}</a>					
					<button class="btn green" type="submit"><i class="fa fa-check-circle"></i>&nbsp;{{Lang::get('generic.save');}} </button>
					<a href="{{ url('activities/'.$activities_detail['id'].'/edit') }}" class="btn yellow"><i class="fa fa-reply"></i>&nbsp;{{Lang::get('generic.reset');}}</a>
					
				</div>
			</div>
			<!--END SAVE MENU -->
			<!--BEGIN EDIT FORM -->
			<div class="portlet-body">
				<div class="form-body">
					@include('includes.message')



					<div class="row">

						<div class="col-lg-6">
							<div class="form-group"><label class="col-md-2 control-label">{{Lang::get('activities.activity')}}:
								<span class="required">
								 *
							</span>
							</label>
								@if (Auth::user()->role == 1)
							{{ Form::text('activity',$activities_detail['activity'], array('class'=>'form-control')) }}
									@else
									{{$activities_detail['activity']}} {{Form::hidden('activity',$activities_detail['activity'])}}
								@endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							{{ Form::label('typeactivity', Lang::get('activities.typeactivity')) }}
							{{ Form::select('typeactivity', $array_type, $activities_detail['typeactivity'], array('class'=>'form-control')) }}
							</div>
						</div>

						{{Form::hidden('closed',0)}}
					</div>
					<div class="row">
						<div class="col-lg-4">
								{{ Form::label('from_nation', Lang::get('activities.country')) }}
								{{ Form::select('from_nation', $nation, $activities_detail['from_nation'],   array('class'=>'form-control placeholder-no-fix' ) ) }}
						</div>
						<div class="col-lg-4">
									{{ Form::label('from_city', Lang::get('activities.city')) }}
									{{ Form::text('from_city', $activities_detail['from_city'],   array('class'=>'form-control placeholder-no-fix', 'placeholder' => Lang::get('budget.city')  )) }}
						</div>
						<div class="col-lg-4">
							<div class="form-group">
							{{ Form::label('place', Lang::get('activities.place')) }}
							{{ Form::text('place', $activities_detail['place'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-12">
							@if ($activities_detail['summary'])
								{{$activities_detail['summary']}}
							@endif

						</div>
					</div>
					<div class="row">
					    
						<div class="col-lg-4">
							<div class="form-group">
								{{ Form::label('partner', Lang::get('navigation.partner')) }}
								{{ Form::select('partner', Partner::getList(), $activities_detail['partner'], array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">

								{{ Form::label('d_document_start', Lang::get('activities.datefrom')  , array('class' => 'control-label ')) }}
								{{ Form::text('d_document_start', Decoder::decodeDate($activities_detail['d_document_start'] ),   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.datefrom'))   ) }}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								{{ Form::label('d_document_stop', Lang::get('activities.to') , array('class' => 'control-label ')) }}
								{{ Form::text('d_document_stop', Decoder::decodeDate($activities_detail['d_document_stop']) ,   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.to'))   ) }}
							</div>
						</div>

						<div class="col-lg-4">

						</div>
						<div class="col-lg-4">
							<div class="form-group">

								{{ Form::label('d_document_start_event', Lang::get('activities.datefromevent')  , array('class' => 'control-label ')) }}
								{{ Form::text('d_document_start_event', Decoder::decodeDate($activities_detail['d_document_start'] ),   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.datefrom'))   ) }}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								{{ Form::label('d_document_stop_event', Lang::get('activities.toevent') , array('class' => 'control-label ')) }}
								{{ Form::text('d_document_stop_event', Decoder::decodeDate($activities_detail['d_document_stop']) ,   array('class'=>'form-control  date-picker', 'placeholder' => Lang::get('budget.to'))   ) }}
							</div>
						</div>

<?php
for ($i=1; $i < 10; $i++) { ?>
						<div class="col-lg-12">
							
							<div class="col-xs-12 col-md-12 col-lg-12 graybg blackfonttitle">
								<h4>{{Lang::get('activities_detail.line'.$i)}} </h4>
								<p><em>{{Lang::get('activities_detail.line_details'.$i)}} </em>
							</div>
							<div class="row">
								<div class="col-xs-1 col-md-1 col-lg-1 blackfonttitle">
									
								</div>
								<div class="col-xs-3 col-md-3 col-lg-3 blackfonttitle">
									{{Lang::get('activities_detail.title')}}
								</div>
								<div class="col-xs-2 col-md-2 col-lg-2 blackfonttitle">
									{{Lang::get('activities_detail.forseen')}}
								</div>
								<div class="col-xs-2 col-md-2 col-lg-2 blackfonttitle">
									{{Lang::get('activities_detail.realized')}}
								</div>
								<div class="col-xs-4 col-md-4 col-lg-4 blackfonttitle">
									{{Lang::get('activities_detail.comment')}}
								</div>
							</div>
							<div id="informationsources{{$i}}">


								@foreach($informationsources as $is)
									@if($is->typeindicator==$i)
										<div id="is-{{$is->id}}" class="row graybg">
											<div class="col-xs-1 col-md-1 col-lg-1">
												<button class="btn blue editinformationsource{{$i}}" data-id="{{$is->id}}">
												{{Lang::get('generic.edit')}}</button>
										</div>
											<div class="col-xs-3 col-md-3 col-lg-3">

												{{$is->title}}
												
												
											</div>
											<div class="col-xs-2 col-md-2 col-lg-2">
												{{$is->forseen}}
											</div>
											<div class="col-xs-2 col-md-2 col-lg-2">
												
													{{$is->realized}}
												
													
											</div>
											<div class="col-xs-4 col-md-4 col-lg-4">
												{{$is->comment}}
											</div>
										</div>
									@endif
								@endforeach
							</div>

							
						</div>

<?php
}
?>

					</div>

					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								{{ Form::submit('Salva',  array('class' =>'btn btn-success btn-large')) }}
								&nbsp;
								<a href="{{ url('activities') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!--END EDIT FORM -->
		</div>
	</div>
</div>
{{ Form::close() }}
<?php
for ($i=1; $i < 10; $i++) { ?>


				<div id="informationSourceModal{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informationSourceModalLabel{{$i}}">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="informationSourceModalLabel{{$i}}">{{Lang::get('activities_detail.line'.$i)}}</h4>
						</div>
						<div class="modal-body">
							{{ Form::open(array('id'=> 'informationSourceForm'.$i, 'url' => 'activities/detail', 'method' => 'POST')) }}
							{{ Form::hidden('activity', $activities_detail->id) }}
							{{ Form::hidden('id', -1) }}
							<div class="form-group">
								{{ Form::label('title',  Lang::get('activities_detail.title'), array('class'=>'control-label')) }}&nbsp;
								{{ Form::text('title', Lang::get('activities_detail.title'), array('class' => 'form-control required', 'disabled'=> true)) }}
							</div>
							<div class="form-group">
								{{ Form::label('forseen',  Lang::get('activities_detail.forseen'), array('class'=>'control-label')) }}&nbsp;
								{{ Form::text('forseen', '', array('class' => 'form-control required', 'placeholder'=>Lang::get('activities_detail.forseen'))) }}
							</div>
							<div class="form-group">
								{{ Form::label('realized',  Lang::get('activities_detail.realized'), array('class'=>'control-label')) }}&nbsp;
								{{ Form::text('realized', '', array('class' => 'form-control required', 'placeholder'=>Lang::get('activities_detail.realized'))) }}
							</div>
							<div class="form-group">
								{{ Form::label('comment',  Lang::get('activities_detail.comment'), array('class'=>'control-label')) }}&nbsp;
								{{ Form::text('comment', '', array('class' => 'form-control required', 'placeholder'=>Lang::get('activities_detail.comment'))) }}
							</div>
							{{Form::close()}}

						</div>
						<div class="modal-footer">
							<button id="saveinformationsource{{$i}}" type="button" class="btn blue">{{Lang::get('generic.save')}}</button>
							<button type="button" class="btn yellow"
									data-dismiss="modal">{{Lang::get('generic.cancel')}}</button>
						</div>
					</div>
				</div>
			</div>




<?php
}
?>







@stop