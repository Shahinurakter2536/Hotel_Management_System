<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
        ]);
        
        $category = $request->input('category');
        $bed = $request->input('bed');
        $rooms = Room::where('name', 'LIKE', "%$category%")->orwhere('bed', 'LIKE', "%$bed%")->get();
        return view('frontend.search',compact('rooms','category','bed'));
    }
}
