<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>{{Config::get('app.site')}}  | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->          
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
     <link href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
     <!-- END GLOBAL MANDATORY STYLES -->
 

     <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/clockface/css/clockface.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap-datepicker/css/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap-colorpicker/css/colorpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}">
    <!-- END PAGE LEVEL STYLES -->

  
     <!-- BEGIN THEME STYLES --> 
     <link href="{{ url('/assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
     <!--link href="{{ url('/assets/css/pages/tasks.css') }}" rel="stylesheet" type="text/css"/-->
     <link href="{{ url('/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
     <link href="{{ url('/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
     <!-- END THEME STYLES -->

     <link rel="stylesheet" href="{{ url('/assets/plugins/data-tables/DT_bootstrap.css') }}" />
        
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/images/favicon.png') }}">



</head>

<?php 
  $dataT = false;
  if (   isset($DT)) $dataT=true;
?>

<body class="page-header-fixed">

<!-- BEGIN HEADER -->   
<div class="header navbar navbar-inverse navbar-fixed-top">
  @include('includes.header')
</div>    

</div>
<!-- END HEADER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
     @include('includes.sidebar')
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
       @yield('content')
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END PAGE -->
 
    
<!-- BEGIN FOOTER -->
<div class="footer">
    @include('includes.footer')
</div>
<!-- END FOOTER -->



<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->   
<!--[if lt IE 9]>
<script src="{{ url('/assets/plugins/respond.min.js') }}"></script>
<script src="{{ url('/assets/plugins/excanvas.min.js') }}"></script> 
<![endif]-->   
<script src="{{ url('assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/clockface/js/clockface.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('assets/scripts/core/app.js') }}"></script>
<script src="{{ url('assets/scripts/custom/components-pickers.js') }}"></script>

<script type="text/javascript" src="{{ url('assets/plugins/data-tables/jquery.dataTables.js') }}"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
        }); 

@if($dataT)
 jQuery(document).ready(function() {
    $('#{{$DT}}').dataTable( {
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": false
    } );
} );
@endif


/** start information source **/
 <?php
for ($i=1; $i < 10; $i++) { ?>    
     $('.editinformationsource{{$i}}').live('click', function () {
         var id = $(this).attr('data-id');
     
         $.ajax({
             url : '/activities/detail/' + id,
             type: "GET",
             success: function(data, textStatus, jqXHR)
             {
                 $("#informationSourceForm{{$i}} input[name='comment']").val(data.data.comment);
                 $("#informationSourceForm{{$i}} input[name='forseen']").val(data.data.forseen);
                 $("#informationSourceForm{{$i}} input[name='realized']").val(data.data.realized);
                 $("#informationSourceForm{{$i}} input[name='title']").val(data.data.title);
                 $("#informationSourceForm{{$i}} input[name='id']").val(data.data.id);
                 $('#informationSourceModal{{$i}}').modal('show');
                 
             },
             error: function(jqXHR, textStatus, errorThrown)
             {
                 console.log(errorThrown);
             }
         });

         return false;
     });

    
     $('#informationSourceModal{{$i}}').on('hidden.bs.modal', function () {
         $('#informationSourceForm{{$i}}').trigger("reset");
         $("#informationSourceForm{{$i}} input[name='id']").val('-1');
     });
     $('#saveinformationsource{{$i}}').on('click', function () {
         var form = $('#informationSourceForm{{$i}}');
         var formData = $(form).serializeArray();
         var formURL = $(form).attr("action");
         var formMethod = $(form).attr("method");
         $.ajax({
             url : formURL,
             type: formMethod,
             data : formData,
             success: function(data, textStatus, jqXHR)
             {
                 $('#is-' + data.data.id).remove();
                 $('#informationsources{{$i}}').append('<div id="is-' + data.data.id + '" class="row graybg">' +
                         '<div class="col-xs-1 col-md-1 col-lg-1">' +
                         '<button class="btn blue editinformationsource" data-id="' + data.data.id + '">Edit</button>' +'</div>' +'<div class="col-xs-3 col-md-3 col-lg-3">' +
                         data.data.title +
                         '</div>' +
                         '<div class="col-xs-2 col-md-2 col-lg-2">' +
                         data.data.forseen +
                         '</div>' +
                         '<div class="col-xs-2 col-md-2 col-lg-2">' +
                         data.data.realized +
                         '</div>' +
                         '<div class="col-xs-4 col-md-4 col-lg-4">' +
                         data.data.comment +
                         '</div></div>')
                 $('#informationSourceModal{{$i}}').modal('hide');
             },
             error: function(jqXHR, textStatus, errorThrown)
             {
                 console.log(errorThrown);
             }
         });
     });
     /** end information source **/
<?php
}
?>

</script>
<!-- END JAVASCRIPTS -->
  
   </body>
</html>




