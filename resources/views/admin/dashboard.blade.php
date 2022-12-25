@extends('layouts.app')
@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('admin.room.index')}}">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bed</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Rooms</p>
                <h4 class="mb-0">{{$rooms->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-secondary text-sm font-weight-bolder">{{$available_room->count()}}</span> are available now</p>
        </div>
    </div>

</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('admin.category.index')}}">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">category</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Categories</p>
                <h4 class="mb-0">{{$categories->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-info text-sm font-weight-bolder">Click </span>to see details</p>
        </div>
    </div>

</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('admin.facility.index')}}">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bed</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Facilities</p>
                <h4 class="mb-0">{{$facilities->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Click </span>to see more</p>
        </div>
    </div>

</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

    <div class="card">
        <div class="card-header p-3 pt-2">
            <a href="{{route('admin.contact')}}">
                <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">mark_email_unread</i>
                </div>
            </a>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Unread Messages</p>
                <h4 class="mb-0">{{$contacts->count()}}</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{$total_contact->count()}} </span> total request</p>
        </div>
    </div>

</div>

<!-- contact quick view -->
<div class="col-12">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <a href="{{route('admin.contact')}}">
                    <h6 class="text-white text-capitalize ps-3">All Contact Information</h6>
                </a>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sent at</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts->slice(0, 3) as $key=>$contact)
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
                                        <h6 class="mb-0 text-sm"> {{$contact->name}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$contact->email}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{str_limit($contact->subject,'30')}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$contact->created_at}}</p>
                            </td>
                            <td>
                                @if($contact->status == 0)
                                <span class="badge badge-sm bg-gradient-danger">Unread</span>
                                @else
                                <span class="badge badge-sm bg-gradient-success">Read</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-info btn-sm mt-3">Show</a>
                                <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contact.destroy', $contact->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm mt-3" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- room quick view -->
<div class="col-12">
    @include('layouts.partial.msg')
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <a href="{{route('admin.room.index')}}">
                    <h6 class="text-white text-capitalize ps-3 d-flex">Room table</h6>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">bed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">persion</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms->slice(0, 3) as $key=>$room)
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
            </div>
        </div>
    </div>
</div>

<!-- category quick view -->
<div class="col-12">
    @include('layouts.partial.msg')
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <a href="{{route('admin.category.index')}}">
                    <h6 class="text-white text-capitalize ps-3">Category table</h6>
                </a>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Slug</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Image</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories->slice(0, 3) as $key=>$category)
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
                                        <h6 class="mb-0 text-sm"> {{$category->name}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$category->slug}}</p>
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{url('uploads/category/'. $category->image)}}" alt="image" style="height: 70px; width:90px;">
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>

                                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $category->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete</button>
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