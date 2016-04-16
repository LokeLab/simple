<?php
/* parametro in ingresso $source 
controlla le fAQ da 1 a 20 e pubblica le valorizzate prendendole da lang/faq.php 


*/ 
if (Input::has('faq'))
	$source =Input::get('faq');

?>

@if (isset($source))

<div class="col-lg-12">
		<div class="form-group">
			
			<a href="{{ url('faq') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
<div class="clearfix" style="padding-top:10px"></div>
	<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> {{Lang::get('faq.title')}}</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								
							</div>
						</div>
						<div class="portlet-body">
	@for($i = 1; $i < 21; $i++)
		@if (Lang::get('faq.domanda_'.$source.'_'.$i)<>'faq.domanda_'.$source.'_'.$i)

		
							<div class="panel-group accordion scrollable" id="accordion2">
								<div class="panel panel-default">
									<div class="panel-heading" style="color:#333!important">
										<h4 class="panel-title" >
										<a class="accordion-toggle" style="color:#333!important" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_{{$i}}">
											 <i class="fa fa-info"></i> - {{Lang::get('faq.domanda_'.$source.'_'.$i)}}
										</a>
										</h4>
									</div>
									<div id="collapse_2_{{$i}}" class="panel-collapse collapse">
										<div class="panel-body" style="color:#333">
											{{Lang::get('faq.risposta_'.$source.'_'.$i)}}
										</div>
									</div>
								</div>
								
								
							</div>
						

			
			
		@endif
	@endfor
						</div>
					</div>
@else
<div class="col-lg-12">
		<div class="form-group">
			
			<a href="{{ url('home') }}" class="btn btn-warning">{{Lang::get('generic.back');}}</a>
		</div>
	</div>
<div class="clearfix" style="padding-top:10px"></div>
	<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> {{Lang::get('faq.title')}}</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								
							</div>
						</div>

						<div class="portlet-body  ">
	@for($i = 1; $i < 21; $i++)
		@if (Lang::get('faq.title_'.$i)<>'faq.title_'.$i)

		
							<div class="panel-group  scrollable" >
								<div class="panel panel-default">
									<div class="panel-heading" style="color:#333!important">
										<h4 class="panel-title" >
										<a href="faq?faq={{Lang::get('faq.title_th_'.$i)}}"  style="color:#333!important"  >
											 <i class="fa fa-info"></i> - {{Lang::get('faq.title_'.$i)}}
										</a>
										</h4>
									</div>
									
								</div>
								
								
							</div>
						

			
			
		@endif
	@endfor
						</div>
					</div>


@endif 