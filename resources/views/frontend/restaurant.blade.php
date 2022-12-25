@extends('frontend.layouts.app')

@section('title','restaurant')


@section('content')

<div class="hero-wrap" style="background-image: url({{asset('frontend/images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Restaurants</span></p>
                    <h1 class="mb-4 bread">Restaurants</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Our Menu</h2>
            </div>
        </div>
        <div class="row">
            @foreach($restaurants as $restaurant)
            <div class="col-md-6">
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img">
                        <img src="{{asset('uploads/facility/'. $restaurant->image)}}" class="img" alt="">
                    </div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>{{$restaurant->name}}</span></h3>
                            <span class="price">{{$restaurant->price}}tk </span>
                        </div>
                        <div class="d-block">
                            <p> {{$restaurant->description}} </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@ensection