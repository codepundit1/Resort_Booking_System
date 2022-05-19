@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
       <div class="col-md-12">

        @if (session('status'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Resort List <span> </span>
                    <span class="mr-3"><a class="btn btn-primary btn-sm float-end" href="{{ url('add-resort') }}">Add Resort</a></span> <a href="{{ url("home") }}"  class="btn btn-primary btn-sm float-end">Back</a>
                </h3>
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
                @foreach ($users as $key=> $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->description }}</td>
                    <td>{{ $user['location'] }}</td>
                    <td>{{ $user['price'] }}</td>
                    <td>
                       <img src="{{ asset('uploads/resorts/'. $user->image) }}" width="80px" height="80px" alt="">
                    </td>

                    <td>
                        <a title="edit" class="mr-1" href="{{ "edit-resort/" .$user['id'] }}"><i class="fa fa-edit "></i></a>
                        <a title="delete" id="delete" href="{{ "delete-resort/" .$user['id'] }}"><i class="fa fa-trash "></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>


          </table>
          <span>
            {{ $users->links() }}
        </span>

        <style>
            .w-5{
                display: none;
            }
        </style>

       </div>
    </div>
</div>
@endsection
