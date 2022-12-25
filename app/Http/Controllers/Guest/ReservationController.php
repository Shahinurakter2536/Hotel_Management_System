<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pending;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::where('status', 1)->where('user_id', Auth::id())->get();
        return view('client.reservation.index', compact('reservations'));
    } 
 
    public function destroy($id)
    {

        if (Auth::user()) {

            $reservation = Booking::find($id);

            if ($reservation->room->is_available == false) {
                $reservation->room->is_available = true;
            }
            $reservation->room->save();

            $reservation->delete();
            Toastr::success('Reservation deleted successfully', 'Success');
            return redirect()->back();

        } else {
            Toastr::error('You don not have permission to do this', 'Sorry');
            return redirect()->back();
        }
        
    }
}
