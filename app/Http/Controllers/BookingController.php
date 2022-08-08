<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Resort;


class BookingController extends Controller
{
    public function view()
    {
        $booking = Booking::with("resort")->paginate();
        return view('booking.view_booking', ['bookings'=>$booking]);

        // return Booking::with("resort")->first();

    }

    public function add(Request $request, $resort)
    {

        $validate = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'checkin' => 'nullable',
            'checkout' => 'nullable'
        ]);

        $booking = new Booking;
        $booking->resort_id = $resort;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkin = $request->checkin;
        $booking->checkout = $request->checkout;
        $booking->save();
        return redirect('/')->with('message', 'Successfully Booked');
    }
}
