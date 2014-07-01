<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Report AV PN | Welcome</title>
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
    var s1 = [{{$sl1}}];
    
    //var s2 = [460, -210, 690, 820];
    //var s3 = [-260, -440, 320, 200];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = [{{$lticks}}];
     
    var plot1 = $.jqplot('chart1', [s1], {
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
        // Turns on animatino for all series in this plot.
        animate: true,
        // Will animate plot on calls to plot1.replot({resetAxes:true})
        animateReplot: true,
        cursor: {
            show: true,
            zoom: true,
            looseZoom: true,
            showTooltip: false
        },
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
            renderer:$.jqplot.LineRenderer,
            rendererOptions: {fillToZero: true
            }
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
            {
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.LineRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: {
                    // Speed up the animation a little bit.
                    // This is a number of milliseconds.  
                    // Default for bar series is 3000.  
                    animation: {
                        speed: 2500
                    },
                    barWidth: null,
                    barPadding: -15,
                    barMargin: 0,
                    highlightMouseOver: false
                }
            }, {
                rendererOptions: {
                    // speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for a line series is 2500.
                    animation: {
                        speed: 2000
                    }
                }
            }
        ],

        axes: {
            // These options will set up the x axis like a category axis.
            
            yaxis: {
                tickOptions: {
                    formatString: "%'d"
                },
                rendererOptions: {
                    forceTickAt0: true
                }
            }
          },
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: false,
            placement: 'insideGrid'
        },
        //grid:[background: '#fff'],
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                tickOptions: {
                    showGridline: false
                },
                renderer: $.jqplot.CategoryAxisRenderer,
                
                ticks: ticks,
                
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.00,
                tickOptions: {formatString: '%d'}
            }
        }
    });
});


 
  </script>
@if ($nooffer != 1)
<script>

/*
  $(document).ready(function(){
    var s1 = [{{$s1}}];
    
    //var s2 = [460, -210, 690, 820];
    //var s3 = [-260, -440, 320, 200];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = [{{$ticks}}];
     
    var plot1 = $.jqplot('chart2', [s1], {
        // Turns on animatino for all series in this plot.
        animate: true,
        // Will animate plot on calls to plot1.replot({resetAxes:true})
        animateReplot: true,
        cursor: {
            show: true,
            zoom: true,
            looseZoom: true,
            showTooltip: false
        },
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true,
                barDirection: 'horizontal'}
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
            {
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'yaxis',
                rendererOptions: {
                    // Speed up the animation a little bit.
                    // This is a number of milliseconds.  
                    // Default for bar series is 3000.  
                    animation: {
                        speed: 2500
                    },
                    barWidth: 15,
                    barPadding: -15,
                    barMargin: 0,
                    highlightMouseOver: false
                }
            }, {
                rendererOptions: {
                    // speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for a line series is 2500.
                    animation: {
                        speed: 2000
                    }
                }
            }
        ],

        axes: {
            // These options will set up the x axis like a category axis.
            xaxis: {
                tickInterval: 1,
                drawMajorGridlines: false,
                drawMinorGridlines: true,
                drawMajorTickMarks: false,
                rendererOptions: {
                tickInset: 0.5,
                minorTicks: 1
            }
            },
            yaxis: {
                tickOptions: {
                    formatString: "$%'d"
                }, ticks:ticks, 
                rendererOptions: {
                    forceTickAt0: true
                }
            }
          },
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: false,
            placement: 'insideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.00,
                tickOptions: {formatString: '%d'}
            }
        }
    });
});
*/
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
  @endif 
<!-- END JAVASCRIPTS -->
  
   </body>
</html>




