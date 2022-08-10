@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header text-center text-danger alert-danger">
               Sorry!! This Resort already Booked. Please Select Another Date.
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary btn-sm float-end">Back</a>
        </div>
    </div>
</div>
@endsection
