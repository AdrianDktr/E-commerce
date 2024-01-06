<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show_profile(){
        $user=Auth::user();

        return view('user.show_profile', compact('user'));
    }
}
