<?php

namespace App\Http\Controllers;

use App\Category;
use App\Facilitiy;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.home',compact('categories'));
    }
    public function room()
    {
        $rooms = Room::where('is_available',true)->latest()->get();
        return view('frontend.room',compact('rooms'));
    }
    public function restaurant()
    {
        $restaurants = Facilitiy::all();
        return view('frontend.restaurant',compact('restaurants'));
    }
    public function single($id)
    {
        $room =  Room::find($id);
        $randomrooms = Room::all()->random(3);
        $categories = Category::all();
        return view('frontend.single', compact('room','randomrooms','categories'));
    }
    public function categoryrooms($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('frontend.categoryrooms', compact('category'));
    }
    
}
