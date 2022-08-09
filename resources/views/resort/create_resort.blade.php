@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Add Resort
                            <a href="{{ url('view-resort') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="store-resort" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                        aria-describedby="name">
                                    @error('name')
                                        <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" value="{{ old('location') }}" name="location" class="form-control @error('location') is-invalid @enderror" id="location"
                                        aria-describedby="location">
                                    @error('location')
                                        <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class=" row input-group col-md-12 mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" value="{{ old('image') }}" name="image" class="form-control @error('image') is-invalid @enderror" id="image"
                                        aria-describedby="image">
                                    @error('image')
                                        <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="{{ old('price') }}" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                                        aria-describedby="price">
                                    @error('price')
                                        <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row input-group col-md-12 mb-3">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" value="{{ old('description') }}" class="form-control" id="description" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
