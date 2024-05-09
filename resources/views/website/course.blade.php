@extends('website.layouts.master')


@section('title')
{{$course->slug}}
@endsection

@section('css')
<style>
body{margin-top:20px;}
.timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 10rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
}
</style>
@endsection

@section('content')


 
  <div class="bg-primary">
    <div class="container py-4">
      
      <nav class="d-flex">
        <h6 class="mb-0">
          <a href="{{route('get_domains')}}" class="text-white-50">Domains</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="{{route('get_domain_slug',$course->domain->slug)}}" class="text-white-50">{{$course->domain->slug}}</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>{{$course->slug}}</u></a>
        </h6>
      </nav>
      
    </div>
  </div>


<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{Storage::url($course->image)}}" />
          </a>
        </div>
        
       
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
          {{$course->name}}<br />
          </h4>
          <div class="d-flex flex-row my-3">
            
            <span class="text-muted"><i class="fas fa-clock fa-sm mx-1"></i>{{$course->duration}} Hours</span>
            <div>
              @if($course->certified == 1)
              <span class="badge badge-success fw-bold ms-2">Certfied</span>
              @else
              <span class="badge badge-danger fw-bold ms-2">Not Certfied</span>
              @endif
            </div>
            
          </div>

          <div class="mb-3">
            <span class="h5">{{$course->price}} $</span> |
            <s class="text-muted">{{$course->selling_price}} $</s>
          </div>

          <p>
          {{$course->description}}
          </p>

          <div class="row">
            <dt class="col-3">Language:</dt>
            <dd class="col-9">{{$course->language}}</dd>

            <dt class="col-3">is Trending:</dt>
            <dd class="col-9">
                @if($course->trend == 1)
                <span class="badge badge-success">
                  Trending
                </span>
                @else
                <span class="badge badge-danger">
                  Not Trending
                </span>
                @endif
            </dd>
            
          </div>
          <div class="py-3">
          @guest
              <a href="{{route('login')}}" 
                class="btn btn-warning btn-lg shadow-0">
                  Buy Now
              </a>
          @else
              @if(auth()->user()->orders->where('course_id', $course->id)->count())
              <a href="#" class="btn btn-warning btn-lg shadow-0 disabled">
                Buyed
              </a>
              @else
              <a href="{{route('stripe.form',$course->id)}}" 
                class="btn btn-warning btn-lg shadow-0">
                  Buy Now
              </a>
              @endif
          @endguest
          
          </div>
        </div>
         </main>
        </div>
       </div>
     </section>



<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
    <div class="col-lg-12">
            <h5 class="title text-dark text-center">What You Will Learn ?</h5>
            <div class="timeline-steps aos-init aos-animate py-2" data-aos="fade-up">
                @php $i = 1; @endphp
                @foreach($technologies as $technology)
                <div class="timeline-step">
                    <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">{{$i++}}</p>
                        <p class="h6 text-muted mb-0 mb-lg-0">{{$technology}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      
    </div>
  </div>
</section>
 
          

@endsection

@section('js')

@endsection