@extends('layouts.app')
@section('title','Reservations')

@push('css')

@endpush

@section('content')
<div class="col-12">
    @include('layouts.partial.msg')
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Reservation Request</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Checkin Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Checkout Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payable</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment Method</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Transection ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Facilities</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $key=>$reservation)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"> {{$key+1}} </h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->checkin_date}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->checkout_date}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->price}} taka</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->price/2}} taka</p>
                            </td>
                            <td>
                                @if($reservation->payment_method == 1)
                                <p class="text-xs font-weight-bold mb-0">In Cash (hotel)</p>
                                @elseif(($reservation->payment_method == 2))
                                <p class="text-xs font-weight-bold mb-0">Bkash Payment)</p>
                                @else
                                <p class="text-xs font-weight-bold mb-0">Rocket Payment)</p>
                                @endif
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->transection_id}}</p>
                            </td>
                            <td>
                                @foreach(json_decode($reservation->facilities) as $facility)
                                <p class="text-xs font-weight-bold mb-0">{{$facility}}</p>
                                @endforeach
                            </td>

                            <td>
                                @if($reservation->status == 0)
                                <small class="font-weight-bold mb-0" style="font-size: 10px ;"> <strong class="bg bg-danger text-white rounded p-2"><em>Pending</em></strong></small>
                                @else
                                <small class="font-weight-bold mb-0" style="font-size: 10px ;"><strong class="bg bg-success text-white rounded p-2"><em>Approved</em></strong></small>
                                @endif
                            </td>
                            <td>
                                @if($reservation->status == 0)
                                <a href="{{route('admin.reservation.show', $reservation->id)}}" class="btn btn-info my-2 btn-sm">Confirm</a>
                                <a href="{{route('admin.reservation.delete', $reservation->id)}}" class="btn btn-danger my-2 btn-sm">delete</a>
                                @else
                                <a href="{{route('admin.reservation.show', $reservation->id)}}" class="btn btn-light my-2 btn-sm">Confirmed</a>
                                
                                <form id="delete-form-{{ $reservation->id }}" action="{{ route('admin.reservation.delete', $reservation->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete</button>
                                @endif 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')

@endpush