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
                    User List <span> </span>
                    <span class="mr-3"><a class="btn btn-primary btn-sm float-end" href="{{ url('add-user') }}">Add User</a></span> <a href="{{ url('home') }}"  class="btn btn-primary btn-sm float-end">Back</a>
                </h3>
            </div>
        </div>


        <table class="table">
            <thead>
              <tr>
                <th scope="col">SI.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>


              </tr>
            </thead>


            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['password'] }}</td>

                    <td>
                        {{-- <a title="edit" class="mr-1" href={{ "edit-user/" .$user['id'] }}><i class="fa fa-edit "></i></a> --}}
                        <a title="delete" id="delete" href={{ "delete-user/" .$user['id'] }}><i class="fa fa-trash "></i></a>
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
