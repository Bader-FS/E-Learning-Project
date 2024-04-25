  <div class="py-5">
  <div class="text-center fw-bold">
    <h2>Popular Courses</h2>
  </div>
  <div class="container owl-carousel trend_course owl-theme">
    @foreach($courses as $course)
    <div class="item">
      <a href="">
        <div class="card text-black">
          <img src="{{Storage::url($course->image)}}" class="card-img-top" style="height: 250px; width: 100%;" alt="Apple Computer" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{$course->name}}</h5>
              <p class="text-muted mb-4">{{$course->short_description}}</p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <s>{{$course->price}} $</s><span class="fw-bold">{{$course->selling_price}} $</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Duration</span><span class="fw-bold" >{{$course->duration}} Hour</span>
              </div>
            </div>
            
  
          </div>
        </div>
      </a>
    </div>
    @endforeach
    
  </div>
  
  </div>
  
  