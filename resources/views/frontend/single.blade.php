@extends('frontend.layouts.app')

@section('title','room-details')

@section('content')
<div class="hero-wrap" style="background-image: url({{asset('uploads/room/'. $room->image)}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span class="mr-2"><a href="{{route('room')}}">Room</a></span></p>
                    <h1 class="mb-4 bread">{{$room->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <h2 class="mb-4">{{$room->name}}</h2>
                        <div class="item">
                            <div class="room-img" style="background-image: url({{asset('uploads/room/'. $room->image)}});"></div>
                        </div>
                    </div>
                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <p>{{$room->description}}</p>
                        <div class="d-md-flex mt-5 mb-2">
                            <ul class="list">
                                <li><span>Max: </span>{{$room->person}} Person</li>
                                <li><span>Category: </span>{{$room->category->name}}</li>
                            </ul>
                            <ul class="list ml-md-5">
                                <li><span>Bed: </span>{{$room->bed}}</li>
                                <li><span>Price: </span>{{$room->price}}tk per night</li>
                            </ul>
                        </div>
                        @if($room->is_available == 1)
                        <a href=" {{route('booking', $room->id)}} " class="btn btn-success btn-block">Book now</a>
                        @else
                        <div class="card py-2">
                            <span class="text-danger text-center">Sorry, This room is not available right now</span>
                            <a href=" {{route('booking', $room->id)}} " class="btn btn-success btn-block d-none">Book now</a>
                        </div>
                        @endif
                    </div>

                </div>
            </div> <!-- .col-md-8 -->


            <div class="col-lg-4 sidebar ftco-animate">


                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        @foreach($categories as $category)
                        <li><a href="#"> {{$category->name}} <span>{{$category->rooms->count()}}</span></a></li>
                        @endforeach
                    </div>
                </div>


            </div>

            <div class="col-lg-12 room-single ftco-animate mb-5">
                <h4 class="mb-4">Available Room</h4>
                <div class="row">

                    @foreach($randomrooms as $randomroom)
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="{{route('single', $randomroom->id)}}">
                                <img src="{{url('uploads/room/'. $randomroom->image)}}" class="img d-flex justify-content-center align-items-center" alt="image">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="{{route('single', $room->id)}}"> {{$randomroom->name}} </a></h3>
                                <p><span class="price mr-2">{{$randomroom->price}}tk</span> <span class="per">per night</span></p>
                                <ul class="list">
                                    <li><span>Max:</span>{{$randomroom->person}}</li>
                                    <li><span>Category:</span> {{$randomroom->category->name}} </li>
                                    <li><span>Bed:</span>{{$randomroom->bed}}</li>
                                </ul>
                                <hr>
                                <p class="pt-1"><a href="{{route('booking', $room->id)}}" class="btn-custom">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
</section> <!-- .section -->
@endsection