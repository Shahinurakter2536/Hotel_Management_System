@extends('layouts.app')
@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('room')}}">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">home</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Available rooms</p>
                <h4 class="mb-0">{{$available_room->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Book </span>a new room</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('restaurant')}}">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">restaurant</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Facilities Available</p>
                <h4 class="mb-0">{{$facilities->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-warning text-sm font-weight-bolder">Check </span>your facilitis now</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('client.settings')}}">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">settings</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">User Settings</p>
                <h4 class="mb-0">{{Auth::user()->name}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">Customize</span> your profile</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('client.notifications')}}">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Notifications</p>
                <h4 class="mb-0">{{$notifications->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">Notice </span>from admin</p>
        </div>
    </div>
</div>

<!-- Clients booking quick view -->
<div class="col-12">
    @include('layouts.partial.msg')
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <a href="{{route('client.reservations')}}">
                    <h6 class="text-white text-capitalize ps-3">My Reservations</h6>
                </a>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Room Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Room Images</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Checkin Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Checkout Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payable</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations->slice(0,3) as $key=>$reservation)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"> {{$key+1}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"> {{$reservation->room->name}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$reservation->room->category->name}}</p>
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{url('uploads/room/', $reservation->room->image)}}" alt="image" style="height: 70px; width:90px;">
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
                                @if($reservation->status == 0)
                                <span class="badge bg-info mb-3">Pending</span>
                                @else
                                <span class="badge bg-success mb-3">Confirmed</span>
                                @endif
                            </td>


                            <td class="px-2">
                                @if($reservation->status == 0)
                                <form id="delete-form-{{ $reservation->id }}" action="{{ route('client.reservation.destroy', $reservation->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete</button>
                                @else
                                <span class="badge bg-dark mb-3">Thanks</span>
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

@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

@endpush