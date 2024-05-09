@extends('website.layouts.master')

@section('title')
The Courses
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

    .search-input {
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 10px 20px;
        font-size: 16px;
        transition: border-color 0.3s ease;
        width: 100%;
    }

    .search-input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
@endsection

@section('content')
<section>
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-3"><strong>Our Offered Courses</strong></h4>

       
        <div class="row d-flex flex-start py-2">
            <div class="col-lg-4 col-md-6 col-sm-10 mb-4">
                <input type="text" id="courseSearch" class="form-control search-input" placeholder="Search for a Specific Course...">
            </div>
        </div>

        <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="{{Storage::url($course->image)}}" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    @if($course->trend == 1)
                                    <h5><span class="badge bg-warning ms-2">Trend</span></h5>
                                    @endif
                                    @if($course->certified == 1)
                                    <h5><span class="badge bg-success ms-2">Certified</span></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <a href="{{route('get_course_slug',[$course->domain->slug,$course->slug])}}">
                        <div class="card-body text-dark">
                            <h5 class="card-title mb-3">{{$course->name}}</h5>
                            <span class="text-reset">
                                <p>{{$course->domain->name}}</p>
                            </span>
                            <h6 class="mb-3">
                                <s>${{$course->selling_price}}</s><strong class="ms-2 text-warning">${{$course->price}}</strong>
                            </h6>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

            <div class="row justify-content-center">
                <div class="mt-3 text-center">
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputField = document.getElementById('courseSearch');
        const courseCards = document.querySelectorAll('.card');
        const noResultsCard = document.getElementById('noResultsCard');

        inputField.addEventListener('input', function () {
            const searchQuery = inputField.value.toLowerCase().trim();
            let hasResults = false;

            for (let card of courseCards) {
                const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
                if (cardTitle.includes(searchQuery)) {
                    card.style.display = 'block';
                    hasResults = true;
                } else {
                    card.style.display = 'none';
                }
            }

            // Show or hide no results message 
            noResultsCard.style.display = hasResults ? 'none' : 'block';
        });
    });
</script>
@endsection

