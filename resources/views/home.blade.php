@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="{{ url('home') }}">Home</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/view-user') }}">User</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="{{ url('view-resort') }}">Resort</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="{{ url('view-booking') }}">Booking</a>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
    </div>
</div>
@endsection
