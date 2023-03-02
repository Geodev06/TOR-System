<?php

namespace App\Http\Controllers;

use App\Models\Studentinfo;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Datatables;

class StudentinfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Studentinfo::select('lrn', 'firstname', 'lastname', 'middlename', 'sex')
                ->orderBy('created_at', 'desc');
            return Datatables::of($data)
                ->addColumn('fullname', function ($data) {
                    $fullname = $data->lastname . ', ' . $data->firstname . ' ' . $data->middlename . '.';
                    return $fullname;
                })
                ->addColumn('sex', function ($data) {
                    return $data->sex === 0 ? 'Male' : 'Female';
                })
                ->addColumn('action', function ($data) {
                    $btn = '<button class="text-white btn btn-success btn-edit" data-id="' . $data->lrn . '"><i class="bx bx-edit"></i></button>';
                    return $btn;
                })->rawColumns(['action', 'fullname', 'sex'])
                ->make(true);
        }
    }

    /*
    *   create studdent
    *   uniqure with LRN-
    */

    public function store(Request $request)
    {
        //regex:/^[a-zA-Z ]+$/u

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|regex:/^[a-zA-Z ]+$/u',
                'lastname' => 'required|regex:/^[a-zA-Z ]+$/u',
                'birthdate' => 'required|date|before:' . now()->format('Y-m-d'),
                'sex' => 'required',
                'elem_school' => 'required',
                'elem_school_id' => 'required',
                'elem_school_address' => 'required',
                'gen_ave' => 'required|integer|min:75',
                'lrn' => 'required|min:12|max:12|unique:studentinfos',
            ],
            [
                'lrn.unique' => 'LRN is already existing.'
            ]
        );

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        if ($request->birthdate > now()) {
            return response()->json(['status' => 400, 'error' => 'bir']);
        }

        Studentinfo::create(
            [
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'name_ext' => $request->name_ext,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'elem_school' => $request->elem_school,
                'elem_school_id' => $request->elem_school_id,
                'elem_school_address' => $request->elem_school_address,
                'gen_ave' => $request->gen_ave,
                'lrn' => $request->lrn
            ]
        );

        return response()->json(['status' => 200, 'msg' => ' LRN - [' . $request->lrn . '] Student information has been save']);
    }
}
