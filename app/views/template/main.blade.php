<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Report AV PN | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('/bs/css/bootstrap.min.css') }}" media="screen">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="{{ url('/themes/font-awesome-4.0.3/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/themes/bs/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/uniform.min.css') }}" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('/css/select2.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/select2-metronic.css.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
        <link href="{{ url('/css/style-metronic.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/plugins.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/themes/default.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/themes/login.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/css/themes/custom.css') }}" rel="stylesheet" type="text/css">
        
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/images/favicon.png') }}">
<style type="text/css">
 body {
 padding-top: 70px;
 }
 </style>
</head>


  @yield('style')   
    
    <div class="container" style=" padding-top: 70px;">
      <div class="row">
        <div class="col-lg-12">
     @yield('content')
        </div>
      </div>
    </div>
    

    <script src="{{ url('/js/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/themes/bs/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/themes/bs/js/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/jquery.uniform.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('/js/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('/js/app.js" type="text/javascript') }}"></script>
<script src="{{ url('/js/login.js" type="text/javascript') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {     
      App.init();
      Login.init();
    });
</script>
  
   </body>
</html>