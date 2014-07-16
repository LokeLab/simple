
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
      <img src="/images/logo_martini.png" height="70">
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
      <li class="dropdown" id="header_notification_bar" style="outline: 0px; box-shadow: rgba(102, 188, 230, 0) 0px 0px 13px; outline-offset: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="fa fa-warning"></i>
          <span class="badge">{{$id_notifiche}}</span>
        </a>
        <ul class="dropdown-menu extended notification">
          <li>
            <p>
               {{Lang::get('notification.notification', array('id'=>$id_notifiche)) }}
            </p>
          </li>
          <li>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;">
              @foreach( $list_event as $element )
                <li>
                <a href="#">
                  <span class="label label-{{$element->type}} label-{{$element->type}}">
                    <i class="fa fa-plus"></i>
                  </span>
                    {{$element->message}}
                  <span class="time">
                    <!-- {{Lang::get('notification.now')}}-->
                  </span>
                </a>
              </li>
              @endforeach
            </ul><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
          </li>
          
        </ul>
      </li>
      
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

