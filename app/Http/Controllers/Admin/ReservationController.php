<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pending;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        return view('admin.pending.index', compact('reservations'));
    }
    public function show($id)
    {

        $reservation = Booking::findorFail($id);
        if ($reservation->status == 0) {
            $reservation->status = 1;
            $reservation->save();
            Toastr::success('Resrevation Confirmed Successfully');
            return redirect()->back();
        } else {
            Toastr::info('Already Confirmed');
            return redirect()->back();
        }

        $recentDate = Carbon::now()->toDateString();

        if ($reservation->checkout_date == $recentDate) {
            if ($reservation->room->is_available == 0) {
                $reservation->room->is_available = 1;
                Toastr::success('Resrevation Confirmed Successfully');
                return redirect()->back();
            }
        }
    }
    public function destroy($id)
    {
        
        $reservation = Booking::find($id);
        
        if ($reservation->room->is_available == false) {
            $reservation->room->is_available = true;
        }
        $reservation->room->save();
        
        Booking::findorFail($id)->delete();
        Toastr::success('Reservation Deleted Successfully');
        return redirect()->back();
    }
}
