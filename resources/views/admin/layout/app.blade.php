<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>

    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet">
  </head>

  <body class="hold-transition sidebar-mini">

    <div class="wrapper" id="adminNav">

      @include('admin.layout.upper_nav_bar')
      @include('admin.layout.left_menu_bar')

      <div class="content-wrapper">
        <div class="content">
          @include('admin.layout.message')
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </div>

    </div>

    @include('admin.layout.footer')
  </body>

</html>
