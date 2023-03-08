<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Studentinfo;
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
        $n_students = Studentinfo::count();
        $n_students_acads = Record::count();

        $data = [
            'student' => $n_students,
            'acads' => $n_students_acads,
        ];
        return view('partials.dashboard_content', compact('data'));
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
