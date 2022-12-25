@extends('frontend.layouts.app')

@section('title','rooms')

@section('content')
<div class="hero-wrap" style="background-image: url({{asset('frontend/images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">All Rooms</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($rooms as $room)
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="{{route('single', $room->id)}}">
                                <img src="{{url('uploads/room/'. $room->image)}}" class="img d-flex justify-content-center align-items-center" alt="image">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="{{route('single', $room->id)}}"> {{$room->name}} </a></h3>
                                <p><span class="price mr-2">{{$room->price}} tk</span> <span class="per">per night</span></p>
                                <ul class="list">
                                    <li><span>Max:</span>{{$room->person}}</li>
                                    <li><span>Category:</span> {{$room->category->name}} </li>
                                    <li><span>Bed:</span>{{$room->bed}}</li>
                                </ul>
                                <hr>
                                <p class="pt-1"><a href="{{route('single', $room->id)}}" class="btn-custom">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection