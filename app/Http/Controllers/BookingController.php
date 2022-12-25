<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Facilitiy;
use App\Payment;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if (!Auth::user()) {
            Toastr::warning('Please login before booking', 'Login First');
            return redirect()->route('login');
        }


        \Stripe\Stripe::setApiKey('sk_test_51KxyHYIEYo0gWEDaERO4zFkkgWyNl5cqAJDvjc5YBvZMDcZsf8Mm24RWJtUe4nI5ZFIsRGWuEnGtr1gM0xHopCy300Ge4zz7H0');

        $facilities = Facilitiy::all();
        $room = Room::find($id);
        return view('frontend.booking', compact('room','facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $checkin_date = Carbon::parse($request->input('checkin_date'));
        $checkout_date = Carbon::parse($request->input('checkout_date'));
        $price = $request->price;
        $result = $checkin_date->diffInDays($checkout_date, false);

        if ($result > 0) {
            $total_price = $price * $result;
        }
        $booking = new Booking();
        $booking->user_id        = Auth::user()->id;
        $booking->room_id        = $id;
        $booking->checkin_date   = $request->checkin_date;
        $booking->checkout_date  = $request->checkout_date;
        $booking->total_person   = $request->person;
        $booking->payment_method = $request->payment_method;
        $booking->transection_id = $request->transection_id;
        $booking->facilities     = json_encode($request->facilities);
        $booking->price          = $total_price;

        if ($request->transection_id) {
            $booking->transection_id = $request->transection_id;
        }else{
            $booking->transection_id = "pay at hotel";
        }
        $booking->save(); 

        $room = Room::find($id);
        if ($room->is_available == true) {
            $room->is_available = false;
        }
        $room->save();

        Toastr::success('Admin will contact you soon', 'Done!');
        return redirect()->route('room');
    }
}
