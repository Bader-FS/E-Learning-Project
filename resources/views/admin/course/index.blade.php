@extends('admin.master')

@section('title')
Courses
@endsection


@section('css')

@endsection

@section('title_page')
Courses List
@endsection

@section('content')
<div class="card-header">
    <a href="{{route('courses.create')}}" class="btn btn-outline-primary">Create New Course</a>
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Domain</th>
                  <th>Prof</th>
                  <th>Image</th>
                  <th>Certified</th>
                  <th>Trend</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($courses as $course)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$course->name}}</td>
                  <td>{{$course->domain->name}}</td>
                  <td>{{$course->prof->name}}</td>
                  <td><img src="{{\Illuminate\Support\Facades\Storage::url($course->image)}}" class="rounded mx-auto d-block" style="max-width:100px;" alt=""></td>
                  <td>
                    @if($course->certified == 1)
                    <span class="badge badge-success">
                      Certified
                    </span>
                    @else
                    <span class="badge badge-danger">
                     Not Certified
                    </span>
                    @endif
                  </td>
                  <td>
                    @if($course->trend == 1)
                    <span class="badge badge-success">
                      Trending
                    </span>
                    @else
                    <span class="badge badge-danger">
                     Not Trending
                    </span>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('courses.show',$course->id)}}" class="btn btn-sm btn-outline-success">show</a>
                    <a href="{{route('courses.edit',$course->id)}}" class="btn btn-sm btn-outline-warning">edit</a>
                    @include('admin.includes.delete_modal',['type'=>'course','data'=>$course,'routes'=>'courses.destroy'])
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