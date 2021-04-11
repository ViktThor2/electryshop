<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Bejelentkezés</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
  </head>

  <body class="hold-transition login-page">

    <div class="login-box">

      <!-- /.login-logo -->
      <div class="card">

        @include('admin.layout.message')

        <div class="card-body login-card-body">

          <p class="login-box-msg">Bejelentkezés</p>

          @if($errors->first('email'))
            <p class="color-danger">{{$errors->first('email')}}</p>
          @endif

          <form action="{{route('admin.login.store')}}" method="POST">
            @csrf

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="email"
                     placeholder="Email"  value="{{old('email')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control"
                    name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="row">
              <button class="btn btn-primary btn-block"
                        type="submit">Belépés</button>
            </div>

          </form>

        </div>
      </div>
    </div>

  <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>
