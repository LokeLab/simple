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
          <li ><a href="{{ url('/visit') }}"><i class="fa fa-money"></i><span class="title"> Inserted costs</span></a></li>
          <li ><a href="{{ url('/visitSospese') }}"><i class="fa fa-bullseye"></i><span class="title"> Cost to be verified</span></a></li>
          <li ><a href="{{ url('/reporting') }}"><i class="fa fa-arrows"></i><span class="title"> Reporting</span></a></li>
          
         <!-- <li ><a href="{{ url('log') }}"><i class="fa fa-file-text-o"></i><span class="title"> {{Lang::get('navigation.log');}}</span></a></li>-->
          <li ><a href="{{ url('/users') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.users');}} </span></a></li>
          <li ><a href="{{ url('/partners') }}"><i class="fa fa-sitemap"></i><span class="title">  Partners </span></a></li>
        @endif
        @if (Auth::user()->role != 1 && Auth::user()->role < 6)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/budget/'.Auth::user()->partner) }}"><i class="fa fa-sitemap"></i><span class="title"> Budget</span></a></li>
          <li ><a href="{{ url('/visit/add') }}"><i class="fa fa-plus"></i><span class="title"> Insert costs</span></a></li>
         
          <li ><a href="{{ url('/visit') }}"><i class="fa fa-money"></i><span class="title"> Inserted costs</span></a></li>
           <!--li ><a href="{{ url('/visitSospese') }}"><i class="fa fa-bullseye"></i><span class="title"> Cost to be completed</span></a></li-->
           <li ><a href="https://podio.com/odinteatretdk/caravan-next/apps/financial/items/15" target="_blank"><i class="fa fa-file-excel-o  "></i><span class="title"> Models</span></a></li>
           <!--li ><a href="{{ url('/reporting') }}"><i class="fa fa-arrows"></i><span class="title"> Reporting</span></a></li-->
          
        <!--  <li ><a href="{{ url('/agenda') }}"><i class="fa fa-calendar"></i><span class="title"> {{Lang::get('navigation.agenda');}}</span></a></li>-->
        @endif
       
        @if (Auth::user()->role == 6)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}} </span></a></li>
          <li ><a href="{{ url('/roles') }}"><i class="fa fa-sitemap"></i><span class="title"> {{Lang::get('navigation.roles');}}</span></a></li>
          <li ><a href="{{ url('/users') }}"><i class="fa fa-users"></i><span class="title">  {{Lang::get('navigation.users');}} </span></a></li>
         
        @endif
        @if (Auth::user()->role == 10)
          <li ><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span class="title">  {{Lang::get('navigation.home');}}</span></a></li>
          <li ><a href="{{ url('/visit') }}"><i class="fa fa-bullseye"></i><span class="title"> Cost to be verified</span></a></li>
          <li ><a href="{{ url('/reporting') }}"><i class="fa fa-arrows"></i><span class="title"> Reporting</span></a></li>
        @endif 

            
    @endif
  </ul>
  <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->