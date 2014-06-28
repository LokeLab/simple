<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Quikode | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->          
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
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
      <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/jqplot/jquery.jqplot.min.css') }}" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/images/favicon_quikode.png') }}">



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
<script type="text/javascript" src="{{ url('assets/plugins/jqplot/jquery.jqplot.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jqplot/jqplot.barRenderer.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jqplot/jqplot.categoryAxisRenderer.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jqplot/jqplot.pointLabels.min.js') }}"></script>

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




</script>




<script>

$(document).ready(function(){
    // For horizontal bar charts, x an y values must will be "flipped"
    // from their vertical bar counterpart.
    var plot2 = $.jqplot('chart2', [{{$s1}}], {
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            // Show point labels to the right ('e'ast) of each bar.
            // edgeTolerance of -15 allows labels flow outside the grid
            // up to 15 pixels.  If they flow out more than that, they 
            // will be hidden.
            pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
            // Rotate the bar shadow as if bar is lit from top right.
            shadowAngle: 135,
            // Here's where we tell the chart it is oriented horizontally.
            rendererOptions: {
                barDirection: 'horizontal',
                barWidth: null,
                    barPadding: -15,
                    barMargin: 5,
            }
        },
        grid: {
                drawGridLines: true,        // wether to draw lines across the grid or not.
                    gridLineColor: '#cccccc',   // CSS color spec of the grid lines.
                    background: '#fff',      // CSS color spec for background color of grid.
                    borderColor: '#999999',     // CSS color spec for border around grid.
                    borderWidth: 2.0,           // pixel width of border around grid.
                    shadow: true,               // draw a shadow for grid.
                    shadowAngle: 45,            // angle of the shadow.  Clockwise from x axis.
                    shadowOffset: 1.5,          // offset from the line of the shadow.
                    shadowWidth: 3,             // width of the stroke for the shadow.
                    shadowDepth: 3
            }, 
        axes: {
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
});

  </script>
<!-- END JAVASCRIPTS -->
  <script>

$(document).ready(function(){
    // For horizontal bar charts, x an y values must will be "flipped"
    // from their vertical bar counterpart.
    var plot2 = $.jqplot('chart2b', [{{$s1b}}], {
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            // Show point labels to the right ('e'ast) of each bar.
            // edgeTolerance of -15 allows labels flow outside the grid
            // up to 15 pixels.  If they flow out more than that, they 
            // will be hidden.
            pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
            // Rotate the bar shadow as if bar is lit from top right.
            shadowAngle: 135,
            // Here's where we tell the chart it is oriented horizontally.
            rendererOptions: {
                barDirection: 'horizontal',
                barWidth: null,
                    barPadding: -15,
                    barMargin: 5,
            }
        },
        grid: {
                drawGridLines: true,        // wether to draw lines across the grid or not.
                    gridLineColor: '#cccccc',   // CSS color spec of the grid lines.
                    background: '#fff',      // CSS color spec for background color of grid.
                    borderColor: '#999999',     // CSS color spec for border around grid.
                    borderWidth: 2.0,           // pixel width of border around grid.
                    shadow: true,               // draw a shadow for grid.
                    shadowAngle: 45,            // angle of the shadow.  Clockwise from x axis.
                    shadowOffset: 1.5,          // offset from the line of the shadow.
                    shadowWidth: 3,             // width of the stroke for the shadow.
                    shadowDepth: 3
            }, 
        axes: {
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
});

  </script>

  <script>

$(document).ready(function(){
    // For horizontal bar charts, x an y values must will be "flipped"
    // from their vertical bar counterpart.
    var plot2 = $.jqplot('chart2c', [{{$s1c}}], {
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            // Show point labels to the right ('e'ast) of each bar.
            // edgeTolerance of -15 allows labels flow outside the grid
            // up to 15 pixels.  If they flow out more than that, they 
            // will be hidden.
            pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
            // Rotate the bar shadow as if bar is lit from top right.
            shadowAngle: 135,
            // Here's where we tell the chart it is oriented horizontally.
            rendererOptions: {
                barDirection: 'horizontal',
                barWidth: null,
                    barPadding: -15,
                    barMargin: 5,
            }
        },
        grid: {
                drawGridLines: true,        // wether to draw lines across the grid or not.
                    gridLineColor: '#cccccc',   // CSS color spec of the grid lines.
                    background: '#fff',      // CSS color spec for background color of grid.
                    borderColor: '#999999',     // CSS color spec for border around grid.
                    borderWidth: 2.0,           // pixel width of border around grid.
                    shadow: true,               // draw a shadow for grid.
                    shadowAngle: 45,            // angle of the shadow.  Clockwise from x axis.
                    shadowOffset: 1.5,          // offset from the line of the shadow.
                    shadowWidth: 3,             // width of the stroke for the shadow.
                    shadowDepth: 3
            }, 
        axes: {
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
});

  </script>
   </body>
</html>




