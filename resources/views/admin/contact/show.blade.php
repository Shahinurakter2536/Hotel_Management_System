@extends('layouts.app')
@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">{{$contact->name}}'s Request</h6>
        </div>
    </div>
    <tr>
        <td>
            <div class="d-flex px-4 py-1">
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Name: <span style="font-weight: normal;">{{$contact->name}}</span> </h6>
                    <h6 class="mb-0 text-sm">Email: <span style="font-weight: normal;">{{$contact->email}}</span> </h6>
                    <h6 class="mb-0 text-sm">Subject: <span style="font-weight: normal;">{{$contact->subject}}</span> </h6>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <br>
        <h6 style="font-weight: normal;" class="mb-0 text-sm px-4">{{$contact->message}}</h6>
    </tr>
    <div class="form-group my-2 px-4 d-flex">
        <form action="{{route('admin.contact.status', $contact->id)}}" method="post">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-success">Confirm</button>
        </form>
        <a href="{{ route('admin.contact') }}" class="btn btn-danger mx-1">Cancel</a>
    </div>
</div>


@endsection

@push('js')

@endpush