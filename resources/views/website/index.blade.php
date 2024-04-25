@extends('website.layouts.master')


@section('title')
Home | Training Edge Consulting
@endsection


@section('css')
<style>
    a{
        text-decoration : none;
    }
    .owl-carousel .item img{
        transition : all .2s ease-in-out;
    }
    .owl-carousel .item img:hover{
        transform : scale(1.08);
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

@include('website.sections.slider')

@include('website.sections.AboutUs')

@include('website.sections.trend_course')

@include('website.sections.trend_domain')

@endsection


@section('js')
<script>
    $('.trend_course').owlCarousel({
    loop:true,
    margin:14,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        700:{
            items:2
        },
        800:{
            items:3
        },
        1100:{
            items:4
        }
    }
    })       
</script>


<script>
    $('.trend_domain').owlCarousel({
    loop:true,
    margin:14,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        700:{
            items:2
        },
        800:{
            items:3
        },
        1100:{
            items:4
        }
    }
    })       
</script>
@endsection
