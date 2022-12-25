@extends('layouts.app')
@section('title','Notifications')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Add New Notification</h6>
        </div>
    </div>
    <div class="card-content">
        <form role="form" action="{{route('admin.notification.store')}}" method="POST" enctype="multipart/form-data" class="text-start">
            @csrf
            @method('POST')
            <label class="form-label mt-3">Notifications title</label>
            <div class="input-group input-group-outline">
                <input type="text" name="title" class="form-control">
            </div>

            <label class="form-label mt-3">Notifications descriptions</label>
            <div class="input-group input-group-outline">
                <input type="text" name="descriptions" class="form-control">
            </div>

            <div class="form-group mt-3">
                <a href="{{ route('admin.notification.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection

@push('js')

@endpush