<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/category')) {
                mkdir('upload/category', 0777, true);
            }
            $image->move('uploads/category', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $imagename;
        $category->save();
        Toastr::success('success', 'Category Added Successfully');
        return redirect()->route('admin.category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $this->validate($request, [

            'name' => 'required|string',
        ]);

        $category = Category::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/category')) {
                mkdir('upload/category', 0777, true);
            }
            if (file_exists('uploads/category/' . $category->image)) {
                unlink('uploads/category/' . $category->image);
            }
            $image->move('uploads/category', $imagename);
        } else {
            $imagename = $category->image; 
        }

        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $imagename;
        $category->update();
        Toastr::success('success', 'Category Updated Successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);

        if (file_exists('uploads/category/' . $category->image)) {
            unlink('uploads/category/' . $category->image);
        }
        $category->delete();
        Toastr::success('success', 'Category Deleted Successfully');
        return redirect()->back();
    }
}
