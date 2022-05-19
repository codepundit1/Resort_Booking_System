@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="card-group">
        <div class="row">
            <div class="col-md-6">


        @foreach ($resorts as $resort)
        <div class="card">
            <img src="{{ asset('uploads/resorts/'. $resort->image) }}" width="100%" height="200px" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $resort->name }} </h5>
              <p class="card-text">{{ $resort->description }}</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-primary btn-sm" href="{{ url('booking') }}"> Book Now</a>
            </div>
          </div>
        @endforeach

        </div>
        </div>
      </div>
 </div>
@endsection
