@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5" style="margin: 0 auto;">

                <h3>
                    Booking Form <span> </span>
                    <a href="#" class="btn btn-primary btn-sm float-end">Back</a>
                </h3>

                <form method="POST" action={{ route('booking.store', $resort->id) }} enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="name" placeholder="Enter Your Name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your valid email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone No.</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter Phone Number">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="checkin" class="form-label">Check In</label>
                        <input type="date" class="form-control @error('checkin') is-invalid @enderror" name="checkin" id="checkin">
                        @error('checkin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="checkout" class="form-label">Check Out</label>
                        <input type="date" class="form-control @error('checkout') is-invalid @enderror" id="checkout" name="checkout">
                        @error('checkout')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection