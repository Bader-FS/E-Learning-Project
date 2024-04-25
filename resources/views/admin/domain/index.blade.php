@extends('admin.master')

@section('title')
Training Edge Dashboard
@endsection


@section('css')

@endsection

@section('title_page')
Domains
@endsection

@section('content')
<div class="card-header">
    <a href="{{route('domains.create')}}" class="btn btn-outline-primary">Create New Domain</a>
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>is Active</th>
                  <th>is Popular</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($domains as $domain)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$domain->name}}</td>
                  <td><img src="{{\Illuminate\Support\Facades\Storage::url($domain->image)}}" class="rounded mx-auto d-block" style="max-width:100px;" alt=""></td>
                  <td>
                    @if($domain->is_active == 1)
                    <span class="badge badge-success">
                        Active
                    </span>
                    @else
                    <span class="badge badge-danger">
                        Not Active
                    </span>
                    @endif
                  </td>
                  <td>
                    @if($domain->is_popular == 1)
                    <span class="badge badge-success">
                        Popular
                    </span>
                    @else
                    <span class="badge badge-danger">
                        Not Popular
                    </span>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('domains.show',$domain->id)}}" class="btn btn-sm btn-outline-success">show</a>
                    <a href="{{route('domains.edit',$domain->id)}}" class="btn btn-sm btn-outline-warning">edit</a>
                    @include('admin.includes.delete_modal',['type'=>'domain','data'=>$domain,'routes'=>'domains.destroy'])
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