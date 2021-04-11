@if(session()->has('success'))
  <div class="alert alert-success ">
  <i class="icon fa fa-check"></i>
    {{session('success')}}
  </div>
@endif
@if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible">

   <i class="icon fa fa-ban"></i>
    {{session('error')}}
  </div>
@endif
