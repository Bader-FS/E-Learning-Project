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
    .search-input {
    border-radius: 20px;
    border: 1px solid #ccc;
    padding: 10px 20px;
    font-size: 16px;
    transition: border-color 0.3s ease;
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
  <div class="container py-5">
    
  
    <div class="row d-flex flex-start py-2">
        <div class="col-lg-4 col-md-6 col-sm-10 mb-4">
            <input type="text" id="domainSearch" class="form-control search-input" placeholder="Search for a Specific domain...">
        </div>
    </div>


    <h2 class="text-center">The Domains We Offer</h2>
    <div class="row justify-content-center py-2" id="domainCards">
        @foreach($domains as $domain)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{route('get_domain_slug',$domain->slug)}}">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <img src="{{Storage::url($domain->image)}}" class="w-100" />
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    @if($domain->is_popular == 1)
                                    <h5><span class="badge bg-info ms-2">Wanted in Market</span></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title mb-3">{{$domain->name}}</h5>
                            <span class="text-reset">
                                <p>{{$domain->description}}</p>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="mt-3 text-center">
            {{$domains->links()}}
        </div>
    </div>
</div>
</section>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the input field and cards container
        const inputField = document.getElementById('domainSearch');
        const domainCards = document.getElementById('domainCards');

        // Add event listener for input field
        inputField.addEventListener('input', function () {
            const searchQuery = inputField.value.toLowerCase().trim();
            const cards = domainCards.getElementsByClassName('card');

            // Loop through each card and hide/show based on search query
            for (let card of cards) {
                const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
                if (cardTitle.includes(searchQuery)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    });
</script>
@endsection
