@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            User List
                            <a href="{{ url('view-resort') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="store-resort" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class=" row input-group col-md-12 mb-3">

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control" id="location"
                                        aria-describedby="location" required>

                                </div>
                            </div>

                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        aria-describedby="image">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                        aria-describedby="price" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>

                                <textarea name="description" class="form-control" id="description" cols="30" rows="4" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
