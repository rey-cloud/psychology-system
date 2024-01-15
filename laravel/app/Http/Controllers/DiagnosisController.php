<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{
    public function index() {

        $diagnosis =  Diagnosis::all();
        if ($diagnosis->count() > 0) {
            return response()->json([
                'status' => 200,
                'diagnosis' => $diagnosis
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'diagnosis' => 'No Record Found'
            ], 404);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'diagnosis' => 'required|string|max:200',
            'recommendation' => 'required|string|max:200'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $diagnosis = Diagnosis::create([
                'diagnosis' => $request->diagnosis,
                'recommendation' => $request->recommendation,
            ]);

            if ($diagnosis) {

                return response()->json([
                    'status' => 200,
                    'message' => "Diagnosis Created Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    public function show($id) {
        $diagnosis = Diagnosis::find($id);

        if ($diagnosis) {
            return response()->json([
                'status' => 200,
                'diagnosis' => $diagnosis
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Diagnosis Found!"
            ], 404);
        }
    }

    public function edit($id) {
        $diagnosis = Diagnosis::find($id);

        if ($diagnosis) {
            return response()->json([
                'status' => 200,
                'diagnosis' => $diagnosis
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Diagnosis Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'diagnosis' => 'required|string|max:200',
            'recommendation' => 'required|string|max:200'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $diagnosis = Diagnosis::find($id);

            if ($diagnosis) {

                $diagnosis->update([
                    'diagnosis' => $request->diagnosis,
                    'recommendation' => $request->recommendation,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Diagnosis Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Diagnosis Found!"
                ], 404);
            }
        }
    }

    public function destroy($id) {
        $diagnosis = Diagnosis::find($id);

        if ($diagnosis) {
            $diagnosis->delete();
            return response()->json([
                'status' => 200,
                'message' => "Diagnosis Deleted Successfully!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Diagnosis Found!"
            ], 404);
        }
    }
}
