<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Studentinfo;
use Validator;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function release()
    {
        $releases = Release::all()->values()->reverse();

        return view('partials.release', compact('releases'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lrn' => 'required|min:12|max:12',
            'name_of_school' => 'required',

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $record = Studentinfo::where('lrn', $request->lrn)->get();

        if (count($record) <= 0) {
            return response()->json(['status' => -1, 'error' => 'LRN does not exists!.']);
        }
        Release::create([
            'lrn' => $request->lrn,
            'name_of_school' => $request->name_of_school
        ]);

        return response()->json(['status' => 200, 'msg' => 'Release has been recorded']);
    }
}
