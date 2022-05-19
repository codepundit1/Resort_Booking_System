@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Edit Resort
                            <a href="{{ url('view-resort') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="/edit-resort" method="POST" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class=" row input-group col-md-12 mb-3">

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $users->name }}" id="name" aria-describedby="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" value="{{ $users->location }}" class="form-control" id="location"
                                        aria-describedby="location" required>

                                </div>
                            </div>

                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image"  class="form-control" id="image"
                                        aria-describedby="image">
                                        <img src="{{ asset('uploads/resorts/'. $users->image) }}" width="80px" height="80px" alt="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" value="{{ $users->price }}" class="form-control" id="price"
                                        aria-describedby="price" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $users->description }}" id="description"  >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
