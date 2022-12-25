@extends('layouts.app')

@section('title','Create')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add New Product</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" name="name">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Category</label>
                                        <select class="form-control" name="category">

                                            <option>Select Gender</option>
                                            <option value="10">Male</option>
                                            <option value="10">Female</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Size</label>
                                        <select class="form-control" name="size">

                                            <option>Select Size</option>
                                            <option value="10">M</option>
                                            <option value="10">L</option>
                                            <option value="10">XL</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Color</label>
                                        <select class="form-control" name="color">

                                            <option>Select Color</option>
                                            <option value="10">Red</option>
                                            <option value="10">Greem</option>
                                            <option value="10">Blue</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Price</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush