@extends('admin.master')

@section('title')
Training Edge Dashboard
@endsection


@section('css')

@endsection

@section('title_page')
Dashboard
@endsection

@section('content')
    <div class="card-body">
    <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalDomains }}</h3>

                <p>Domains</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-code-branch"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalProfs }}</h3>

                <p>Professors</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-tie"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalUsers }}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-plus"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalCourses}}</h3>

                <p>Total Courses</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-flask"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalOrders}}</h3>

                <p>Payments</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          
          
        </div>

    </div>
@endsection


@section('js')

@endsection