@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <div class="col-md-8 mt-5" style="margin: 0 auto;">

            <h3>
                Booking Form <span> </span>
                <a href="{{ url('resort') }}"  class="btn btn-primary btn-sm float-end">Back</a>
            </h3>


            <form method="POST" action="add-booking" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" >
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone No.</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone" >
                  </div>

                <div class="mb-3">
                  <label for="checkin" class="form-label">Check In</label>
                  <input type="date" class="form-control" name="checkin" id="checkin" >
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Check Out</label>
                    <input type="date" class="form-control" id="checkout" name="checkout" >
                  </div>


                <button type="submit" class="btn btn-primary">Book Now</button>
              </form>
        </div>
    </div>
</div>

@endsection
