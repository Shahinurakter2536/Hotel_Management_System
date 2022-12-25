@extends('layouts.app')
@section('title','Room')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Add New Room</h6>
        </div>
    </div>
    <div class="card-content">
        <form role="form" action="{{route('admin.room.update', $room->id)}}" method="POST" enctype="multipart/form-data" class="text-start">
            @csrf
            @method('PUT')
            <label class="form-label  my-2 mt-4">Room Name</label>
            <div class="input-group input-group-outline">
                <input type="text" name="name" value="{{$room->name}}" class="form-control">
            </div>

            <label class="form-label  my-2">Description</label>
            <div class="input-group input-group-outline">
                <textarea class="form-control" name="description"> {{$room->description}} </textarea>
            </div>

            <label class="form-label my-2 ">Category</label>
            <div class="input-group input-group-outline">
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                    <option {{ $category->id == $room->category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <label class="form-label my-2 ">Bed</label>
            <div class="input-group input-group-outline">
                <select class="form-control" name="bed">
                    <option value="single">Single</option>
                    <option value="twin">Twin</option>
                    <option value="quad">Quad</option>
                </select>
            </div>
            <label class="form-label my-2 ">Person</label>
            <div class="input-group input-group-outline">
                <select class="form-control" name="person">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <label class="form-label  my-2">Price</label>
            <div class="input-group input-group-outline">
                <input type="number" class="form-control" value="{{$room->price}}" name="price"  />
            </div>

            <label class="form-label my-2">Room Image</label>
            <div class="input-group input-group-outline mb-3">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group my-2">
                <small>Recent image: </small>
                <img class="img-thumbnail img-responsive" src="{{url('uploads/room/'. $room->image)}}" alt="image" style="height: 70px; width:90px;">
            </div>

            <a href="{{ route('admin.room.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


@endsection

@push('js')

@endpush