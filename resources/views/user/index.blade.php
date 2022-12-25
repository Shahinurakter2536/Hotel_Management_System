@extends('layouts.app')

@section('title','All Users')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('user.create')}}" class="btn btn-primary">Register New</a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">All Users
                            <span class="badge bg-secondary">
                                {{$users->count();}}
                            </span></h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table" cellspacing="0" width="100%">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Activity</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->date_of_birth}}</td>
                                    <td>{{Str::limit($user->city, 10)}}</td>
                                    <td>{{Str::limit($user->country, 10)}}</td>
                                    @if($user->activity == 1)
                                    <td>
                                        <span class="badge badge-success">Active</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge badge-danger">Inactive</span>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete',$user->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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