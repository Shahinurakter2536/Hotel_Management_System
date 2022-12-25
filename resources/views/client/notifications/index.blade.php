@extends('layouts.app')
@section('title','Notifications')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">All Notifications</h6>
        </div>
    </div>
    @foreach($notifications as $key=>$notification)
    <div class="card-content mx-3 my-3">
        <h5 class="card-title">{{$key+1}}. {{$notification->title}}</h5>
        <p class="card-text">{{$notification->descriptions}}</p>
    </div>
    @endforeach
    <div class="form-control mx-3">
        <a href="{{ route('client.dashboard') }}" class="btn btn-danger">Back</a>
    </div>
</div>
@endsection

@push('js')

@endpush