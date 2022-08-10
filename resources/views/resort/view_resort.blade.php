@extends('layouts.app')

@section('styles')
    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">

                                <form action="#" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="search" id=""  class="form-control"
                                            placeholder="Find Somethings">
                                    </div>
                                    <button class="btn-primary btn-sm">Search</button>
                                </form>

                            </div>

                            <div class="col-md-4">

                                <span class="mr-3"><a class="btn btn-primary btn-sm float-end"
                                        href="{{ url('add-resort') }}">Add
                                        Resort</a></span> <a href="{{ url('home') }}"
                                    class="btn btn-primary btn-sm float-end">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SI.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($resorts as $resort)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $resort->name }}</td>
                                <td>{{ $resort->description }}</td>
                                <td>{{ $resort->location }}</td>
                                <td>{{ $resort->price }}</td>
                                <td>
                                    <img src="{{ $resort->image }}" width="80px" height="80px" alt=""
                                        class="img-fluid">
                                </td>

                                <td>
                                    <a title="edit" class="mr-1" href="{{ 'edit-resort/' . $resort->id }}"><i
                                            class="fa fa-edit "></i></a>
                                    <a title="delete" id="delete" href="{{ 'delete-resort/' . $resort->id }}"><i
                                            class="fa fa-trash "></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="float-end">
                    {{ $resorts->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
