<!DOCTYPE html>
<html lang="en">
  @include('frontend.layout.head')
  @include('frontend.layout.menu')

  <body>

    <div class="container">
      @yield('content')
    </div>

    @include('frontend.layout.footer')
  </body>

</html>
