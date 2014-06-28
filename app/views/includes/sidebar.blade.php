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

        @if (Role::isAdministrator(Auth::user()->id))
          <li ><a href="{{ url('/home_admin') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}}</span></a></li>
          <li ><a href="{{ url('/customers') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.customers');}} </span></a></li>
          <li ><a href="{{ url('/communities') }}"><i class="fa fa-group"></i><span class="title"> {{Lang::get('navigation.communities');}}</span></a></li>
           <li ><a href="{{ url('/enduser') }}"><i class="fa fa-users"></i><span class="title"> {{Lang::get('navigation.subscribed');}}</span></a></li>
          <li ><a href="{{ url('/campaigns') }}"><i class="fa fa-money"></i><span class="title"> {{Lang::get('navigation.campaigns');}}</span></a></li>
          <li ><a href="{{ url('/initialcode') }}"><i class="fa fa-key"></i><span class="title"> {{Lang::get('navigation.initialcode');}}</span></a></li>
          
         <!-- <li ><a href="{{ url('log') }}"><i class="fa fa-file-text-o"></i><span class="title"> {{Lang::get('navigation.log');}}</span></a></li>-->
          <li ><a href="{{ url('users') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.users');}} </span></a></li>
          <li ><a href="{{ url('statistics') }}"><i class="fa fa-signal"></i><span class="title">  {{Lang::get('navigation.statistics');}} </span></a></li>
        @endif
        @if (Role::isPromoter(Auth::user()->id))
          <li ><a href="{{ url('/home_promoter') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/customers') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.customers');}} </span></a></li>
          <li ><a href="{{ url('/campaigns') }}"><i class="fa fa-money"></i><span class="title"> {{Lang::get('navigation.campaigns');}}</span></a></li>
          <li ><a href="{{ url('/initialcode') }}"><i class="fa fa-key"></i><span class="title"> {{Lang::get('navigation.initialcode');}}</span></a></li>
          <li ><a href="{{ url('statistics') }}"><i class="fa fa-signal"></i><span class="title">  {{Lang::get('navigation.statistics');}} </span></a></li>

        <!--  <li ><a href="{{ url('/agenda') }}"><i class="fa fa-calendar"></i><span class="title"> {{Lang::get('navigation.agenda');}}</span></a></li>-->
        @endif
        @if (Role::isAdvertiser(Auth::user()->id))
          <li ><a href="{{ url('/home_advertiser') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          
          <li ><a href="{{ url('/campaigns') }}"><i class="fa fa-money"></i><span class="title"> {{Lang::get('navigation.campaigns');}}</span></a></li>
          <li ><a href="{{ url('/enduser') }}"><i class="fa fa-users"></i><span class="title"> {{Lang::get('navigation.subscribed');}}</span></a></li>
          <li ><a href="{{ url('statistics') }}"><i class="fa fa-signal"></i><span class="title">  {{Lang::get('navigation.statistics');}} </span></a></li>
          
        <!--  <li ><a href="{{ url('/agenda') }}"><i class="fa fa-calendar"></i><span class="title"> {{Lang::get('navigation.agenda');}}</span></a></li>
          <li ><a href="{{ url('/report') }}"><i class="fa fa-bar-chart-o"></i><span class="title"> {{Lang::get('navigation.report');}}</span></a></li>-->
        @endif
        @if (Role::isTecnico(Auth::user()->id))
          <li ><a href="{{ url('/home_tecnico') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/roles') }}"><i class="fa fa-sitemap"></i><span class="title"> {{Lang::get('navigation.roles');}}</span></a></li>
          <li ><a href="{{ url('/languages') }}"><i class="fa fa-globe"></i><span class="title"> {{Lang::get('navigation.languages');}}</span></a></li>
          <li ><a href="{{ url('/ttemplates') }}"><i class="fa fa-file-o"></i><span class="title"> {{Lang::get('navigation.ttemplates');}}</span></a></li>
          <li ><a href="{{ url('/templates') }}"><i class="fa fa-file-o"></i><span class="title"> {{Lang::get('navigation.templates');}}</span></a></li>
          <li ><a href="{{ url('/licences') }}"><i class="fa fa-file-text"></i><span class="title"> {{Lang::get('navigation.licences');}}</span></a></li>
        @endif

            
    @endif
  </ul>
  <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->