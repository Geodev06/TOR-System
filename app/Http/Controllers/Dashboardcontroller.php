<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboardcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.dashboard');
    }

    public function dataManagement()
    {
        return view('partials.data_management');
    }

    public function subjectManage()
    {
        return view('partials.manage_subject');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(route('login'), 200);
    }
}
