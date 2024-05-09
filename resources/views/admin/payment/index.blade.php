@extends('admin.master')

@section('title')
Payments
@endsection


@section('css')

@endsection

@section('title_page')
List Of Effectued Payments 
@endsection

@section('content')

<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Phone</th>
                  <th>Course Name</th>
                  <th>Order Date</th>
                  <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($payments as $payment)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$payment->user->name}}</td>
                  <td>{{$payment->user->email}}</td>
                  <td>{{$payment->user->phone}}</td>
                  <td>{{$payment->course->name}}</td>
                  <td>{{$payment->created_at->format('Y-m-d')}}</td>
                  <td class="text-center">
                    <h5>
                    <span class="badge badge-info rounded-pill">
                        ${{$payment->total}}
                    </span>
                    </h5>
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