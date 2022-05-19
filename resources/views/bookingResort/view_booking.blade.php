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
                    Booking List <span> </span>
                    <a href="{{ url('home') }}"  class="btn btn-primary btn-sm float-end">Back</a>
                </h3>
            </div>
        </div>


        <table class="table">
            <thead>
              <tr>
                <th scope="col">SI.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">CheckIn</th>
                <th scope="col">CheckOut</th>

              </tr>
            </thead>


            <tbody>
                @foreach ($users as $key=> $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['checkin'] }}</td>
                    <td>{{ $user['checkout'] }}</td>
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
