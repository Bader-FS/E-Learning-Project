@extends('website.layouts.master')


@section('title')
{{$domain->slug}}
@endsection

@section('css')

@endsection

@section('content')



  <div class="bg-primary">
    <div class="container py-4">

      <nav class="d-flex">
        <h6 class="mb-0">
          <a href="{{route('get_domains')}}" class="text-white-50">Domains</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>{{$domain->slug}}</u></a>
        </h6>
      </nav>

    </div>
  </div>


<!-- Domain Deatils -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
            <img style="max-width: 100%; max-height: 60vh; margin: auto;" class="rounded-4 fit" src="{{Storage::url($domain->image)}}" />
          </a>
        </div>
        
       
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          
          <div class="d-flex flex-row my-3">
            <h4 class="title text-dark">{{$domain->name}}</h4>
          </div>

          <div class="row">
            <dt class="col-3">Description:</dt>
            <dd class="col-9">{{$domain->description}}</dd>

            <dt class="col-3">is Popular:</dt>
            <dd class="col-9">
                @if($domain->is_popular == 1)
                <span class="badge badge-success fw-bold ms-2">Popular Domain</span>
                @else
                <span class="badge badge-success fw-bold ms-2">Not a Popular Domain</span>
                @endif
            </dd>
          </div>

          
        </div>
      </main>
        </div>
       </div>
     </section>



<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-6">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Courses Belongs To {{$domain->name}} Domain</h5>
              @foreach($domain->courses as $course)
              <div class="d-flex mb-3">
                <a href="#" class="me-3">
                  <img src="{{Storage::url($course->image)}}" class="rounded mx-auto d-block img-md img-thumbnail" style="max-width:120px;" />
                </a>
                <div class="info">
                  <a href="#" class="nav-link mb-1">
                    {{$course->name}} <br />
                    {{$course->language}}
                  </a>
                  <strong class="text-dark"> ${{$course->price}}</strong>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 
          





@endsection


@section('js')

@endsection
