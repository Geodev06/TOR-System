<?php

namespace App\Http\Controllers;

use App\Models\Studentinfo;
use Illuminate\Http\Request;
use Validator;


class StudentinfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $student = Studentinfo::select(['lrn', 'firstname', 'middlename', 'lastname', 'sex'])
            ->get();

        return response()->json($student, 200);
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
                'birthdate' => 'required',
                'sex' => 'required',
                'province' => 'required',
                'town' => 'required',
                'guardian' => 'required',
                'guardian_address' => 'required',
                'elem_school' => 'required',
                'elem_school_year' => 'required',
                'elem_years' => 'required|integer|min:6',
                'gen_ave' => 'required',
                'lrn' => 'required|min:12|max:12|unique:studentinfos',
            ],
            [
                'lrn.unique' => 'LRN is already existing.'
            ]
        );

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        Studentinfo::create(
            [
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'province' => $request->province,
                'town' => $request->town,
                'barrio' => $request->barrio,
                'guardian' => $request->guardian,
                'guardian_address' => $request->guardian_address,
                'guardian_occupation' => $request->guardian_occupation,
                'elem_school' => $request->elem_school,
                'elem_school_year' => $request->elem_school_year,
                'elem_years' => $request->elem_years,
                'gen_ave' => $request->gen_ave,
                'lrn' => $request->lrn
            ]
        );

        return response()->json(['status' => 200, 'msg' => ' LRN - [' . $request->lrn . '] Student information has been save']);
    }
}
