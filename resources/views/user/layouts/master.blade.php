<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('site-title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="access_token" content="Bearer {{session()->get('access_token')}}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/css/user/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/user/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="/css/user/skins/_all-skins.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/user/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('user.partials.header')
  @include('user.partials.main-sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('user.partials.header-content')
    @include('user.partials.main-content')
  </div>
  <!-- /.content-wrapper -->
  @include('user.partials.footer')
  @include('user.partials.control-sidebar')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/js/user/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/js/user/bootstrap/bootstrap.min.js"></script>
<!-- AdminLTE App //TMQ: Effect when resize -->
<script src="/js/user/app.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function () {
    /*
     * Get All Notifications
     */
    notifications = [];
    var token = $("meta[name=access_token]").attr('content');
    $.ajax({
        url: "/api/auth/notifications",
        headers: {"Authorization": token},
        success: function(data) {
          notifications = data;
          $('#notification-quantity').text(notifications.length);
          $('#notification-quantity-content').html('You have <strong>' + notifications.length + '</strong> notifications');
          $.each(notifications, function( index, value ) {
            $('#notifications-list').append(
              '<li style="padding: 0 1rem; word-break: break-all;" meta-noti-id="' + value.id + '">' +
              '<button class="checkNotiButton">' +
              '<i style="cursor: pointer" class="fa fa-check-circle-o text-success"></i> ' +
              '</button>' +
              value.content.substring(0, 100) +
              '</li>'
            );
          });
        }
    });
  });
</script>
@yield('javascript-section')
</body>
</html>
