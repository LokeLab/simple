@extends('template.internal')

@section('content')
<style type="text/css">
					.active div{ background-color: rgb(226, 211, 211);
						min-height:40px;}
					</style>
<div class="row">
	<div class="col-lg-10">
		<h3>Compila una nuova scheda</h3>
	</div>
</div>

{{ Form::open(array('url' => 'visit', 'method' => 'POST', 'files' => true)) }}


{{ Form::hidden('to_introducer_id', Input::old('to_introducer_id'),array('id'=>'to_introducer_id'))}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="introducer_no">Introducer :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="introducer_no" id="introducer_no" value="{{{ Input::old('introducer_no', isset($associate) ? $associate->introducer_no : null) }}}" />
            </div>
        </div>
    </div>
    <!-- ./ introducer_id -->

    <!-- rank_id -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="rank_id">Rank :</label>
            <div class="col-md-8">
                {{ Form::select('rank_id',$rank ,isset($associate) ? $associate->rank_id : null, array('class'=>'form-control ' ,'id' =>'rank_id'))}} 
                // $rank  = Rank::lists('rankname', 'id'); use of list method can be noted
            </div>
        </div>
    </div>
    
    // javascipt part
    $(function(){
    	$('#introducer_no').autocomplete({
      source: "add_to_introducer_id",
      select: function(event, ui){
        $('#to_introducer_id').val(ui.item.id);
        $.get("add_to_rank_list",{rank_id: ui.item.rank_id}, function(data,status){
          $('#rank_id').empty();
          $.each(data, function(index, item) {
                  var opt = $('<option />');
                  opt.val(data[index].id);
                  opt.text(data[index].rankname);
                  $('#rank_id').append(opt);
        			});
        });
      }
    });
  });
    

    
<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit(Lang::get('generic.save'),  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
<!--<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
		{{ Form::label('id', Lang::get('ttemplates.id')) }}: 
		{{ Form::text('id', '', array('class'=>'form-control')) }}
		</div>
	</div>
</div>-->
<div class="row">
	@if($errors->has())
					<div class="alert alert-danger">
					   @foreach ($errors->all() as $error)
					      <span>{{ $error }}</span><br />
					  	@endforeach
					  </div>
					@endif

	<div class="col-lg-8">
	
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-home"></i>Dati locale visitato
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						{{ Form::label('city', 'Città'  , array('class' => 'control-label ')) }}
						{{ Form::text('city', '' ,   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Città')   ) }}
						
						{{ Form::label('address', 'Indirizzo'  , array('class' => 'control-label ')) }}
						{{ Form::text('address',  '' ,  array('class'=>'form-control placeholder-no-fix' , 'placeholder' => 'Indirizzo')  ) }}
						
						{{ Form::label('local', 'Locale'  , array('class' => 'control-label ')) }}
						{{ Form::text('local', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Locale' ) ) }}
			
						{{ Form::label('local_definition', 'Ragione sociale'  , array('class' => 'control-label ')) }}
						{{ Form::text('local_definition', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Ragione sociale' ) ) }}

						{{ Form::label('code', 'Codice spedizione'  , array('class' => 'control-label ')) }}
						{{ Form::text('code', '',   array('class'=>'form-control placeholder-no-fix', 'placeholder' => 'Codice Spedizione')  ) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('furniture', 'Fornitore'  , array('class' => 'control-label ')) }}
						{{ Form::select('furniture', array('DIRETTO'=>'DIRETTO','INDIRETTO'=>'INDIRETTO'),'DIRETTO',  array('class'=>'form-control placeholder-no-fix'  )) }}
					</div>
					<div class="col-lg-6">
						{{ Form::label('code_team_sell_out', 'Classificazione TEAM SELL OUT'  , array('class' => 'control-label ')) }}
						{{ Form::select('code_team_sell_out', array('A'=>'A','B'=>'B','C'=>'C'),'A', array('class'=>'form-control placeholder-no-fix'   )) }}
					</div>
				
				
				</div>
			</div>
		</div>


	</div>
	<div class="col-lg-4">
	
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Dati compilatore
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				{{ Form::label('name', 'Nome' ) }} 
				{{ Form::label('name', Auth::user()->name, array('class'=>'form-control readonly	')) }}
				{{ Form::hidden('name', Auth::user()->name)}}
				{{ Form::label('surname', 'Cognome') }}
				{{ Form::label('surname', Auth::user()->surname, array('class'=>'form-control readonly')) }}
				{{ Form::hidden('surname', Auth::user()->surname)}}
				{{ Form::label('role_description_txt', 'Ruolo' ) }} {{ Form::hidden('role', Auth::user()->role) }}
				{{ Form::label('role_description_txt', Role::getLabel(Auth::user()->role), array('class'=>'form-control readonly')) }}
				{{ Form::hidden('role_description', Role::getLabel(Auth::user()->role) )}}
				{{ Form::label('plan', 'Piano strategico' ) }}
				{{ Form::text('plan', 'PN', array('class'=>'form-control readonly')) }}
				{{ Form::label('user_manager', 'Manager' ) }}
				{{ Form::text('user_manager', Auth::user()->manager, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_agente', 'Agente' ) }}
				{{ Form::text('user_agente', Auth::user()->agente, array('class'=>'form-control readonly')) }}
				{{ Form::label('user_developer', 'Developer' ) }}
				{{ Form::text('user_developer', Auth::user()->developer, array('class'=>'form-control readonly')) }}


			</div>
		</div>

	</div>
	
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Immagini della visita 
				</div>
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-4">
						Inserire le immagini collegate alla visita (massimo 2 immagini)
					</div>
					<div class="col-lg-8">
									
										
										{{ Form::file('img1', array('class'=>'form-control' , 'placeholder'=>'Carica immagine')) }}<br/>
										{{ Form::file('img2', array('class'=>'form-control' , 'placeholder'=>'Carica immagine')) }}
									
					</div>
				</div>
			</div>
		</div>
	
<div class="col-lg-8">
	
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bullseye"></i>Tipo di attività che si fa nel locale 
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="row">
					<div class="col-lg-12">
						<h4>Informazioni generali</h4>
					</div>

					<div class="col-lg-12">
						<div class="col-lg-4">	
							Aperitivo autogestito
						</div>
						<div class="col-lg-3">	
										
							<label class="radio-inline">
								{{ Form::radio('aperitif_auto', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('aperitif_auto', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
						<div class="col-lg-5">	
							{{ Form::select('aperitif_auto_fq', $selectFQ,'' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					<div class="col-lg-12 active">
						<div class="col-lg-4">	
							Advocacy
						</div>
						<div class="col-lg-3">	
										
							<label class="radio-inline">
								{{ Form::radio('advocacy', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('advocacy', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
						<div class="col-lg-5">	
							{{ Form::select('advocacy_fq', $selectFQ,'' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					<div class="col-lg-12">
						<div class="col-lg-4">	
							Serata consumer
						</div>
						<div class="col-lg-3">	
										
							<label class="radio-inline">
								{{ Form::radio('s_consumer', 1, 0) }} {{Lang::get('decode.Yes')}}
							</label>
							<label class="radio-inline">
								{{ Form::radio('s_consumer', 0, 0) }} {{Lang::get('decode.No')}}
							</label>
			
						</div>
						<div class="col-lg-5">	
							{{ Form::select('s_consumer_fq', $selectFQ, '' ,   array('class'=>'form-control placeholder-no-fix ', 'placeholder' => 'Frequenza')   ) }}
						</div>
					</div>

					
				
				</div>
			</div>
		</div>


	</div>


<div class="col-lg-4">
	
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-thumb-tack"></i>Tipo visita rilevata
				</div>
				
			</div>
			<div class="portlet-body" style="padding-top:0px!important ">
				<div class="col-lg-12">

						{{ Form::label('visit_at', 'Data visita'  , array('class' => 'control-label ')) }}
						{{ Form::text('visit_at', '' ,   array('class'=>'form-control placeholder-no-fix date-picker', 'placeholder' => 'Data')   ) }}
				</div>
				<div class="col-lg-12">	
						{{ Form::label('typevisit', 'Tipo visita'  , array('class' => 'control-label ')) }}
						{{ Form::select('typevisit', Visit::getTypeList() ,'',  array('class'=>'form-control placeholder-no-fix'  )) }}
						
						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="col-lg-5">Prima visita</div><div class="col-lg-7"> <label class="radio-inline">
									{{ Form::radio('first_visit', 1, 0) }} {{Lang::get('decode.Yes')}}
								</label>
								<label class="radio-inline">
									{{ Form::radio('first_visit', 0, 0) }} {{Lang::get('decode.No')}}
								</label>
							</div>
						</div>
					
				 
						<div class="col-lg-12 active">
							<div class="col-lg-5">Potenziale </div><div class="col-lg-7"><label class="radio-inline">
									{{ Form::radio('pot', '1', '0') }} {{Lang::get('decode.Yes')}}
								</label>
								<label class="radio-inline">
									{{ Form::radio('pot', '0', true) }} {{Lang::get('decode.No')}}
								</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="col-lg-5">Ripassaggio </div><div class="col-lg-7"><label class="radio-inline">
									{{ Form::radio('re', '1', '0') }} {{Lang::get('decode.Yes')}}
								</label>
								<label class="radio-inline">
									{{ Form::radio('re', '0', true) }} {{Lang::get('decode.No')}}
								</label>
							</div>
						</div>
					 

					<div class="col-lg-12">
						<h4>Quality</h4>
					</div>

					 
						<div class="col-lg-12">
							<div class="col-lg-5">Serve Martini Royale </div><div class="col-lg-7"><label class="radio-inline">
									{{ Form::radio('qsmr', 1, 0) }} {{Lang::get('decode.Yes')}}
								</label>
								<label class="radio-inline">
									{{ Form::radio('qsmr', 0, 0) }} {{Lang::get('decode.No')}}
								</label>
							</div>
						</div>

						<div class="col-lg-12 active">
							<div class="col-lg-5">Serve Martini Cocktail </div><div class="col-lg-7"><label class="radio-inline">
									{{ Form::radio('qscc', 1, 0) }} {{Lang::get('decode.Yes')}}
								</label>
								<label class="radio-inline">
									{{ Form::radio('qscc', 0, 0) }} {{Lang::get('decode.No')}}
								</label>
							</div>
						</div>
					</div>
					 
    			</div>
			</div>
		</div>
	
</div>


<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{{ Form::submit('Prosegui',  array('class' =>'btn btn-success btn-large')) }}
			&nbsp;
			<a href="{{ url('visit') }}" class="btn btn-warning">{{Lang::get('generic.cancell');}}</a>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop