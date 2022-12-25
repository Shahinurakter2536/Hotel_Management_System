<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Facilitiy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $available_room = Room::where('is_available',true)->get();
        $categories = Category::all();
        $contacts = Contact::where('status',0)->get();
        $total_contact = Contact::all();
        $facilities = Facilitiy::all();

        return view('admin.dashboard', compact('rooms','available_room','categories','contacts','facilities','total_contact')); 
    }
}
