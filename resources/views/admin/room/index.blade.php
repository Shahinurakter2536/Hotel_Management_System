@extends('layouts.app')
@section('title','Room')

@push('css')

@endpush

@section('content')
<div class="col-12">
    @include('layouts.partial.msg')
    <a href="{{route('admin.room.create')}}" class="btn btn-primary">Add New</a>
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Room table</h6>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">bed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">persion</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $key=>$room)
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
                                        <h6 class="mb-0 text-sm"> {{$room->name}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$room->category->name}}</p>
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{url('uploads/room/', $room->image)}}" alt="image" style="height: 70px; width:90px;">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$room->bed}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$room->person}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$room->price}} tk</p>
                            </td>



                            <td>
                                <a href="{{ route('admin.room.edit',$room->id) }}" class="btn btn-info btn-sm">Edit</a>

                                <form id="delete-form-{{ $room->id }}" action="{{ route('admin.room.destroy',$room->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $room->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')

@endpush