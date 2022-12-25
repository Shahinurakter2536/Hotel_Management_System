@extends('layouts.app')
@section('title','Room')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Confirm Reservation</h6>
        </div>
    </div>
    <div class="card-content">
        <form role="form" action="{{route('admin.reservation.update', $reservation->id)}}" method="get" enctype="multipart/form-data" class="text-start">
            @csrf
            @method('post')
            <label class="form-label  my-2 mt-4">Checkin Date</label>
            <div class="input-group input-group-outline">
                <input type="date" name="checkin_date" value="{{$reservation->checkin_date}}" class="form-control">
            </div>

            <label class="form-label  my-2 mt-4">Checkout Date</label>
            <div class="input-group input-group-outline">
                <input type="date" name="checkout_date" value="{{$reservation->checkout_date}}" class="form-control">
            </div>
            
            <label class="form-label  my-2 mt-4">Price per night <small class="text-danger">( price will be updated with your recent payment )</small></label>
            <div class="input-group input-group-outline">
                <input type="text" name="price" value="{{$reservation->price}}" class="form-control" readonly>
            </div>

            <div class="mt-3">
                <a href="{{ route('client.reservations') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>
</div>


@endsection

@push('js')

@endpush