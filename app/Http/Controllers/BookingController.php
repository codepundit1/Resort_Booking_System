<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    public function view()
    {
        $data = Booking::paginate(2);
        return view('bookingResort.view_booking', ['users'=>$data]);
    }

    public function add(Request $request)
    {
        $data = new Booking;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->checkin = $request->checkin;
        $data->checkout = $request->checkout;
        $data->save();
        return redirect('/')->with('status', 'User Added Successfully');
    }
}
