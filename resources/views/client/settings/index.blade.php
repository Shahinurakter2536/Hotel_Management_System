@extends('layouts.app')
@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Edit Profile</h6>
        </div>
    </div>
    <div class="card-content">
        <form role="form" action="{{route('client.settings.update')}}" method="POST" enctype="multipart/form-data" class="text-start">
            @csrf
            @method('PUT')

            <label class="form-label mt-3">Email</label>
            <div class="input-group input-group-outline">
                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" readonly>
            </div>

            <label class="form-label mt-3">Userame</label>
            <div class="input-group input-group-outline">
                <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control">
            </div>

            <label class="form-label mt-3">Name</label>
            <div class="input-group input-group-outline">
                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
            </div>

            <label class="form-label mt-3">Password</label>
            <div class="input-group input-group-outline">
                <input type="password" name="password" value="{{Auth::user()->password}}" class="form-control">
            </div>
            <div class="form-group mt-3">
                <a href="{{ route('client.dashboard') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>


@endsection

@push('js')

@endpush