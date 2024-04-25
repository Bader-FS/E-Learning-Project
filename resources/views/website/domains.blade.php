@extends('website.layouts.master')


@section('title')
Our Domains
@endsection

@section('css')
<style>
    a{
        text-decoration : none;
    }
    
    .card{
        transition : all .2s ease-in-out;
    }
    .card:hover{
        transform : scaleX(1.03);
    } 
</style>
@endsection



@section('content')
<section>
  <div class="container py-5">
    <h2 class="text-center">The Domains We Offer</h2>
    <div class="row justify-content-center py-2">
      @foreach($domains as $domain)
      <div class="col-md-4 col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <a href="{{route('get_domain_slug',$domain->slug)}}">
            <div class="card text-black">
              <img style="height: 250px; width: 100%;" src="{{Storage::url($domain->image)}}" class="card-img-top" alt="Apple Computer" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title fw-bold">{{$domain->name}}</h5>
                  <p class="text-muted mb-4">{{$domain->description}}</p>
                </div>
              </div>
            </div>
        </a>
      </div>
      @endforeach
      <div class="row justify-content-center">
        <div class="mt-3 text-center">
          {{$domains->links()}}
        </div>
      </div>
    </div>
    
  </div>
</section>

@endsection

