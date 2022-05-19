@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="card-group">
        @foreach ($resorts as $resort)
        <div class="card">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $resort->name }} </h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-primary btn-sm" href="{{ url('booking') }}"> Book Now</a>
            </div>
          </div>
        @endforeach
      </div>
 </div>
@endsection
