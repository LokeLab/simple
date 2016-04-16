<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>{{Config::get('app.site')}}  | Welcome </title>
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
     
  
     <!-- BEGIN THEME STYLES --> 
     <link href="{{ url('/assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/pages/tasks.css') }}" rel="stylesheet" type="text/css"/>
     <link href="{{ url('/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
     <link href="{{ url('/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
     <!-- END THEME STYLES -->
        
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/images/favicon.png') }}">
</head>


<body class="page-header-fixed">

<!-- BEGIN HEADER -->   
<div class="header navbar navbar-inverse navbar-fixed-top">
  @include('includes.headerNoMenu')
</div>    

</div>
<!-- END HEADER -->
<div class="page-container">
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
<script src="{{ url('/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" async="" src="http://stats.g.doubleclick.net/dc.js"></script>
<script src="{{ url('assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>

<script>
  jQuery(document).ready(function() {    
     App.init(); // initlayout and core plugins
     //Index.init();
     // Index.initJQVMAP(); // init index page's custom scripts
     // Index.initCalendar(); // init index page's custom scripts
     // Index.initCharts(); // init index page's custom scripts
     // Index.initChat();
     // Index.initMiniCharts();
     // Index.initDashboardDaterange();
      //Index.initIntro();
      //Tasks.initDashboardWidget();

  });
</script>
<!-- END JAVASCRIPTS -->
  
   </body>
</html>




