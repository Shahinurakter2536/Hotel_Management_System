<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Facilitiy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facilitiy::orderBy('id', 'DESC')->paginate(5);
        return view('admin.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.facility.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/facility')) {
                mkdir('upload/facility', 0777, true);
            }
            $image->move('uploads/facility', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $facility = new Facilitiy();

        $facility->name = $request->name;
        $facility->slug = str_slug($request->name);
        $facility->category_id = $request->category;
        $facility->price = $request->price;
        $facility->description = $request->description;
        $facility->image = $imagename;
        $facility->save();
        Toastr::success('success','Facility Added Successfully');
        return redirect()->route('admin.facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facilitiy::find($id);
        $categories = Category::all();
        return view('admin.facility.edit', compact('facility', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $facility = Facilitiy::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/facility')) {
                mkdir('upload/facility', 0777, true);
            }
            if (file_exists('uploads/facility/' . $facility->image)) {
                unlink('uploads/facility/' . $facility->image);
            }
            $image->move('uploads/facility', $imagename);
        } else {
            $imagename = $facility->image;
        }

        $facility->name = $request->name;
        $facility->slug = str_slug($request->name);
        $facility->category_id = $request->category;
        $facility->price = $request->price;
        $facility->description = $request->description;
        $facility->image = $imagename;
        $facility->update();
        Toastr::success('success','Facility Updated Successfully');
        return redirect()->route('admin.facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facilitiy::find($id);
        if (file_exists('uploads/facility/' . $facility->image)) {
            unlink('uploads/facility/' . $facility->image);
        }
        $facility->delete();
        Toastr::success('success','Facility Deleted Successfully');
        return redirect()->back();
    }
}
