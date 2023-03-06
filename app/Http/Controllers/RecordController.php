<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Studentinfo;
use App\Models\Subject;
use Illuminate\Http\Request;


use Validator;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'school' => 'required',
                'school_id' => 'required',
                'district' => 'required',
                'division' => 'required',
                'region' => 'required',
                'classified_grade' => 'required',
                'section' => 'required',
                'school_year' => 'required',
                'adviser' => 'required',
                'select' => 'required',
                'quarter_1' => 'required',
                'quarter_2' => 'required',
                'quarter_3' => 'required',
                'quarter_4' => 'required',
            ],
            [
                'select.required' => 'this field is required',
                'quarter_1.required' => 'this field is required',
                'quarter_2.required' => 'this field is required',
                'quarter_3.required' => 'this field is required',
                'quarter_4.required' => 'this field is required',
            ]
        );


        if (!$validator->passes()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $grade_validator = Validator::make(
            $request->all(),
            [
                'select.*' => 'required',
                'quarter_1.*' => 'required|numeric|min:0|max:100',
                'quarter_2.*' => 'required|numeric|min:0|max:100',
                'quarter_3.*' => 'required|numeric|min:0|max:100',
                'quarter_4.*' => 'required|numeric|min:0|max:100',
            ],
            [
                'select.required' => 'this field is required',
                'quarter_1.required.*' => 'this field is required',
                'quarter_2.required.*' => 'this field is required',
                'quarter_3.required.*' => 'this field is required',
                'quarter_4.required.*' => 'this field is required',
            ]
        );
        if (!$grade_validator->passes()) {

            return response()->json(['status' => 500, 'error' => 'Learning areas is required and Quarter rating must be in numeric values.(max 100.00)']);
        }

        $learning_areas = [];

        $gen_ave = 0;
        for ($i = 0; $i < count($request->select); $i++) {

            $final_rating = 0;
            $final_rating = ($request->quarter_1[$i] + $request->quarter_2[$i] + $request->quarter_3[$i] + $request->quarter_4[$i]) / 4;
            $gen_ave += $final_rating;
            array_push($learning_areas, [
                $request->select[$i] => [
                    'quarter_1' => $request->quarter_1[$i],
                    'quarter_2' => $request->quarter_2[$i],
                    'quarter_3' => $request->quarter_3[$i],
                    'quarter_4' => $request->quarter_4[$i],
                    'final' => $final_rating,
                    'gen_ave' => ($gen_ave / count($request->select))
                ]
            ]);
        }

        $data = [
            'lrn' => $request->lrn,
            'school' => $request->school,
            'school_id' => $request->school_id,
            'district' => $request->district,
            'division' => $request->division,
            'region' => $request->region,
            'classified_grade' => $request->classified_grade,
            'section' => $request->section,
            'school_year' => $request->school_year,
            'adviser' => $request->adviser,
            'data' => $learning_areas,
        ];

        Record::create($data);

        return response()->json(['status' => 200, 'msg' => 'Record has been saved!.', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show($lrn)
    {
        $student = Studentinfo::where('lrn', $lrn)->get();

        if ($student[0]->exists()) {
            $subjects = Subject::all();
            return view('partials.student_record', compact('student', 'subjects'));
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
