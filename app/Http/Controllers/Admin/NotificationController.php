<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Brian2694\Toastr\Facades\Toastr;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'title' => 'required',
        'descriptions' => 'required',
    ]);

    $notification = new Notification();

        $notification->title = $request->title;
        $notification->descriptions = $request->descriptions;
        $notification->save();

        Toastr::success('Notification addedd successfully','Success');
        return redirect()->route('admin.notification.index');
    
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return view('admin.notifications.show', compact('notification'));
    }
    public function edit($id)
    {
        $notification = Notification::find($id);
        return view('admin.notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'descriptions' => 'required',
        ]);
    
        $notification =  Notification::findOrFail($id);
    
            $notification->title = $request->title;
            $notification->descriptions = $request->descriptions;
            $notification->update();
    
            Toastr::success('Notification updated successfully','Success');
            return redirect()->route('admin.notifications.index');
    }

    public function destroy($id)
    {
        Notification::find($id)->delete();
        Toastr::success('Notification successfully deleted','Success');
        return redirect()->back();
    }
}
