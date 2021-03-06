<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>we</b>Products</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>we</b>Products</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-bell-o"></i>
            <span id="notification-quantity" class="label label-warning"></span>
          </a>
          <ul class="dropdown-menu">
            <li id="notification-quantity-content" class="header">You have 0 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul id="notifications-list" class="menu">
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs">{{$user->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/img/user.png" class="img-circle" alt="User Image">

              <p>
                Info...
                <small>Join date: {{date('d-m-Y', strtotime($user->created_at))}}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>