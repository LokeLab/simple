<!-- BEGIN SIDEBAR -->
<div class="page-sidebar navbar-collapse collapse">
  <!-- BEGIN SIDEBAR MENU -->         
  <ul class="page-sidebar-menu">
    <li>
      <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
      <div class="sidebar-toggler hidden-phone"></div>
      <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>
     @if ( Session::has('username') )

        @if (Auth::user()->role == 1)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}}</span></a></li>
          <li ><a href="{{ url('/visit') }}"><i class="fa fa-bullseye"></i><span class="title"> Schede compilate</span></a></li>
          <li ><a href="{{ url('/reporting') }}"><i class="fa fa-key"></i><span class="title"> Reporting</span></a></li>
          
         <!-- <li ><a href="{{ url('log') }}"><i class="fa fa-file-text-o"></i><span class="title"> {{Lang::get('navigation.log');}}</span></a></li>-->
          <li ><a href="{{ url('/users') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.users');}} </span></a></li>
          <li ><a href="{{ url('/statistics') }}"><i class="fa fa-signal"></i><span class="title">  {{Lang::get('navigation.statistics');}} </span></a></li>
        @endif
        @if (Auth::user()->role != 1 && Auth::user()->role < 6)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/visit/add') }}"><i class="fa fa-plus"></i><span class="title"> Compila una scheda</span></a></li>
          <li ><a href="{{ url('/visit') }}"><i class="fa fa-bullseye"></i><span class="title"> Schede compilate</span></a></li>
          
        <!--  <li ><a href="{{ url('/agenda') }}"><i class="fa fa-calendar"></i><span class="title"> {{Lang::get('navigation.agenda');}}</span></a></li>-->
        @endif
       
        @if (Auth::user()->role == 6)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/roles') }}"><i class="fa fa-sitemap"></i><span class="title"> {{Lang::get('navigation.roles');}}</span></a></li>
          <li ><a href="{{ url('/users') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.users');}} </span></a></li>
         
        @endif

            
    @endif
  </ul>
  <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->