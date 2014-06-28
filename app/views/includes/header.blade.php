
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
      <img src="/images/Quikode_logo_white.png" alt="logo" class="img-responsive logo" style="height:80%">
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
          <li class="external">
            <a href="#">
                {{Lang::get('notification.all')}} <i class="m-icon-swapright"></i>
            </a>
          </li>
        </ul>
      </li>
      <!-- END NOTIFICATION DROPDOWN -->
      <!-- BEGIN INBOX DROPDOWN 
      <li class="dropdown" id="header_inbox_bar" style="outline: 0px; box-shadow: rgba(221, 81, 49, 0) 0px 0px 13px; outline-offset: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="fa fa-envelope"></i>
          <span class="badge">7</span>
        </a>
        <ul class="dropdown-menu extended inbox">
          <li>
            <p>
               You have 12 new messages
            </p>
          </li>
          <li>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;">
              <li>
                <a href="inbox.html?a=view">
                  <span class="photo">
                    <img src="./assets/img/avatar2.jpg" alt="">
                  </span>
                  <span class="subject">
                    <span class="from">
                       Lisa Wong
                    </span>
                    <span class="time">
                       Just Now
                    </span>
                  </span>
                  <span class="message">
                     Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...
                  </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                  <span class="photo">
                    <img src="./assets/img/avatar3.jpg" alt="">
                  </span>
                  <span class="subject">
                    <span class="from">
                       Richard Doe
                    </span>
                    <span class="time">
                       16 mins
                    </span>
                  </span>
                  <span class="message">
                     Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                  </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                  <span class="photo">
                    <img src="./assets/img/avatar1.jpg" alt="">
                  </span>
                  <span class="subject">
                    <span class="from">
                       Bob Nilson
                    </span>
                    <span class="time">
                       2 hrs
                    </span>
                  </span>
                  <span class="message">
                     Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                  </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                  <span class="photo">
                    <img src="./assets/img/avatar2.jpg" alt="">
                  </span>
                  <span class="subject">
                    <span class="from">
                       Lisa Wong
                    </span>
                    <span class="time">
                       40 mins
                    </span>
                  </span>
                  <span class="message">
                     Vivamus sed auctor 40% nibh congue nibh...
                  </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                  <span class="photo">
                    <img src="./assets/img/avatar3.jpg" alt="">
                  </span>
                  <span class="subject">
                    <span class="from">
                       Richard Doe
                    </span>
                    <span class="time">
                       46 mins
                    </span>
                  </span>
                  <span class="message">
                     Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                  </span>
                </a>
              </li>
            </ul><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
          </li>
          <li class="external">
            <a href="inbox.html">
               See all messages <i class="m-icon-swapright"></i>
            </a>
          </li>
        </ul>
      </li>
      <!-- END INBOX DROPDOWN -->
      <!-- BEGIN TODO DROPDOWN  
      <li class="dropdown" id="header_task_bar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="fa fa-tasks"></i>
          <span class="badge">
             5
          </span>
        </a>
        <ul class="dropdown-menu extended tasks">
          <li>
            <p>
               You have 12 pending tasks
            </p>
          </li>
          <li>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;">
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       New release v1.2
                    </span>
                    <span class="percent">
                       30%
                    </span>
                  </span>
                  <span class="progress">
                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         40% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       Application deployment
                    </span>
                    <span class="percent">
                       65%
                    </span>
                  </span>
                  <span class="progress progress-striped">
                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         65% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       Mobile app release
                    </span>
                    <span class="percent">
                       98%
                    </span>
                  </span>
                  <span class="progress">
                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         98% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       Database migration
                    </span>
                    <span class="percent">
                       10%
                    </span>
                  </span>
                  <span class="progress progress-striped">
                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         10% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       Web server upgrade
                    </span>
                    <span class="percent">
                       58%
                    </span>
                  </span>
                  <span class="progress progress-striped">
                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         58% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       Mobile development
                    </span>
                    <span class="percent">
                       85%
                    </span>
                  </span>
                  <span class="progress progress-striped">
                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         85% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="task">
                    <span class="desc">
                       New UI release
                    </span>
                    <span class="percent">
                       18%
                    </span>
                  </span>
                  <span class="progress progress-striped">
                    <span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">
                         18% Complete
                      </span>
                    </span>
                  </span>
                </a>
              </li>
            </ul><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
          </li>
          <li class="external">
            <a href="#">
               See all tasks <i class="m-icon-swapright"></i>
            </a>
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
            <a href="/helpdesk">
              <i class="fa fa-bug"></i> {{ Lang::get('users.helpdesk') }}
            </a>
          </li>
          <!-- <li>
            <a href="page_calendar.html">
              <i class="fa fa-calendar"></i> My Calendar
            </a>
          </li>
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i> My Inbox
              <span class="badge badge-danger">
                 3
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-tasks"></i> My Tasks
              <span class="badge badge-success">
                 7
              </span>
            </a>
          </li>
          <li class="divider">
          </li>
          <li>
            <a href="javascript:;" id="trigger_fullscreen">
              <i class="fa fa-arrows"></i> Full Screen
            </a>
          </li>
          <li>
            <a href="extra_lock.html">
              <i class="fa fa-lock"></i> Lock Screen
            </a>
          </li>-->
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

