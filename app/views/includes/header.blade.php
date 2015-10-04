
<?php 

$id_notifiche = 1;

$data = User::find( Session::get('userid'));

$data_reg = $data->created_at;
$data_lastlog = $data->lastlogin_at;

$list_event = User::getAllEvents(Session::get('userid'));


?>
<div class="header navbar navbar-fixed-top mega-menu">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="header-inner">
    <!-- BEGIN LOGO -->
    <a class="navbar-brand" href="/home">
      {{Config::get('app.header')}} 
    </a>
    <!-- END LOGO -->
    <!-- BEGIN HORIZANTAL MENU -->
    <div class="hor-menu hidden-sm hidden-xs">
      
    </div>
    <!-- END HORIZANTAL MENU -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <img src="assets/img/menu-toggler.png" alt="">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">
      <!-- BEGIN NOTIFICATION DROPDOWN -->
      
      
      <!-- END TODO DROPDOWN -->
      <!-- BEGIN USER LOGIN DROPDOWN -->
      <li class="dropdown user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="fa fa-user"></i><!--<img alt="" src="assets/img/avatar1_small.jpg">-->
          <span class="username hidden-1024">
             {{ Session::get('nameComplete') }}
          </span>
          <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="/profile">
              <i class="fa fa-user"></i> {{ Lang::get('users.myprofile') }}
            </a>
          </li>
          <li>
            <a href="/logout">
              <i class="fa fa-key"></i> Log Out
            </a>
          </li>
        </ul>
      </li>
      <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>

