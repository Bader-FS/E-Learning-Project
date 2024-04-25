@extends('admin.master')

@section('title')
Profs
@endsection


@section('css')

@endsection

@section('title_page')
Profs List
@endsection

@section('content')
<div class="card-header">
    <a href="{{route('profs.create')}}" class="btn btn-outline-primary">Create New Prof</a>
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($profs as $prof)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$prof->name}}</td>
                  <td>{{$prof->email}}</td>
                  <td>{{$prof->phone}}</td>
                  <td>
                    <a href="{{route('profs.edit',$prof->id)}}" class="btn btn-sm btn-outline-warning">edit</a>
                    @include('admin.includes.delete_modal',['type'=>'prof','data'=>$prof,'routes'=>'profs.destroy'])
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