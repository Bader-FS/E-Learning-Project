@extends('admin.master')

@section('title')
Users Of the Plateforme
@endsection


@section('css')

@endsection

@section('title_page')
Users List
@endsection


@section('content')

<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Country</th>
                  <th>Number Of Orders</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($users as $user)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>
                  {{$user->country}}
                  </td>
                  <td class="text-center">
                  <span class="badge badge-warning">
                  {{$user->orders->count()}}
                  </span>
                  </td>
                </tr>
                @endforeach
                </tbody>
                
    </table>
</div>
@endsection


@section('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection