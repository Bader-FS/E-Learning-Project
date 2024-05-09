@extends('website.layouts.master')


@section('title')
Effectued Payments
@endsection

@section('css')

@endsection



@section('content')
<section class="h-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">

      <p><span class="h2">Effectued Payments </span><span class="h4">({{$count_orders}} payment in your Orders)</span></p>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Courses</th>
                <th scope="col">Language</th>
                <th scope="col">Duration</th>
                <th scope="col">is Certified</th>
                <th scope="col">Amount Payed</th>
              </tr>
            </thead>
            <tbody>
              @forelse($orders as $order)
              <tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="{{Storage::url($order->course->image)}}" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2">{{$order->course->name}}</p>
                      <p class="mb-2">{{$order->course->domain->name}}</p>
                    </div>
                  </div>
                </th>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">{{$order->course->language}}</p>
                </td>
                <td class="align-middle">
                  <div>
                    <span class="badge badge-info">
                    {{$order->course->duration}} Hours
                    </span>
                  </div>
                </td>
                <td class="align-middle">
                  <div>
                    @if($order->course->certified == 1)
                    <span class="badge badge-success">
                    Certified
                    </span>
                    @else
                    <span class="badge badge-warning">
                    Without Certif
                    </span>
                    @endif
                  </div>
                </td>
                <td class="align-middle">
                  <p class="mb-0 fw-bold" style="font-weight: 500;">${{$order->course->selling_price}}</p>
                </td>
              </tr>
              @empty
                  <h6 class="text-center badge badge-danger">You Haven't Effect Any Payment !</h6>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection

@section('js')

@endsection