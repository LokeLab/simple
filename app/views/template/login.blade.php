<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Report AV PN | Welcome </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/plugins/uniform/css/uniform.default.min.css') }}" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('/assets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/plugins/select2/select2-metronic.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME STYLES -->
        <link href="{{ url('/assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/css/pages/login.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
        
        
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/images/favicon.png') }}">
</head>


  </head>
<body class="login">

  @yield('content')

    

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
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {     
          App.init();
          
          ComponentsPickers.init();
        });
</script>
  
   </body>
</html>