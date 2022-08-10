<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Mail\NewMailReceived;
use App\Models\Resort;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('resort')->latest()->paginate();
        return view('booking.view_booking', compact('bookings'));
    }


    public function create(Resort $resort)
    {
        return view('booking.create_booking', compact('resort'));
    }


    public function store(Request $request, Resort $resort)
    {
        $bookingExits = Booking::where('resort_id',$request->resort_id)
        ->whereBetween('checkin',[$request->checkin, $request->checkout])
        ->orWhereBetween('checkout',[$request->checkin, $request->checkout])
        ->orWhere(function($query) use($request){
            $query->where('checkin','<=',$request->checkin)
                ->where('checkout','>=',$request->checkout);
        })->first();



        if($bookingExits)
        {
            return view('datecheck.error');

        }

        else
        {
             $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'digits:11'],
            'checkin' => ['required', 'date', 'after_or_equal:today'],
            'checkout' => ['required', 'date', 'after_or_equal:checkin'],
        ]);

        $booking = $resort->bookings()->create($valid);

        if($booking)
            {
                // send mail
                try
                {
                    Mail::to($booking->email)->send(new BookingConfirmation($booking));
                    Mail::to('admin@gmail.com')->send(new NewMailReceived());
                }

                catch(\Exception $exception)
                {

                }

                return redirect('/')->with('message',' Booking Complete Successfully');
            }
        return back()->with('error', 'Somethings Went Wrong');
        }

    }


    public function show(Resort $resort, Booking $booking)
    {
        //
    }


    public function edit(Resort $resort, Booking $booking)
    {
        //
    }

    public function update(Request $request, Resort $resort, Booking $booking)
    {
        //
    }


    public function destroy(Resort $resort, Booking $booking)
    {
        //
    }
}
