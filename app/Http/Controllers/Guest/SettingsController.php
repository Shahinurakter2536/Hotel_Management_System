<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('client.settings.index');
    }

    public function update(Request $request)
    {
        $users = User::findOrFail(Auth::id());

        $users->username = $request->username;
        $users->name = $request->name;
        $users->password = Hash::make($request->password);

        $users->save();

        Toastr::success('User updated successfully','successfully');
        return redirect()->route('client.dashboard');
    }
}
