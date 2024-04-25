<div class="py-5">
  <div class="text-center fw-bold">
    <h2>Trend Domains That we Offer</h2>
  </div>
  <div class="container owl-carousel trend_course owl-theme">
    @foreach($domains as $domain)
    <div class="item">
      <a href="">
        <div class="card text-black">
          <img src="{{Storage::url($domain->image)}}" class="card-img-top" style="height: 250px; width: 100%;" alt="Apple Computer" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{$domain->name}}</h5>
              <p class="text-muted mb-4">{{$domain->description}}</p>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
    
  </div>  
</div>
  
  