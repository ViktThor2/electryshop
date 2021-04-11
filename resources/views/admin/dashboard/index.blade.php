@extends('admin.layout.app')

@section('content')
  <div class="container-fluid">
    <h1>Dashboard</h1>
    <hr>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jegyzetek száma</span>
            <span class="info-box-number">

                </span>
          </div>

        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Új felhasználók</span>
            <span class="info-box-number"></span>
          </div>
        </div>
      </div>
    </div>
  </div>


@stop
