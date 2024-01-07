<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile()
    {
        $user = Auth::user();
        return view('user.show_profile', compact('user'));
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'profile_picture' => 'required',
        ]);

        $user = Auth::user();

        $file = $request->file('profile_picture');
        $imageFileName = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/profile_picture'), $imageFileName);

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'profile_picture' => $imageFileName
        ]);

        return redirect()->back();
    }
}
