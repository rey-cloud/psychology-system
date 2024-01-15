<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function index() {

        $result =  Result::all();
        if ($result->count() > 0) {
            return response()->json([
                'status' => 200,
                'result' => $result
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'result' => 'No Record Found'
            ], 404);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:200',
            'result' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $result = Result::create([
                'user_id' => $request->user_id,
                'result' => $request->result
            ]);

            if ($result) {

                return response()->json([
                    'status' => 200,
                    'message' => "Result Created Successfully"
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
        $result = Result::find($id);

        if ($result) {
            return response()->json([
                'status' => 200,
                'result' => $result
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Result Found!"
            ], 404);
        }
    }

    public function edit($id) {
        $result = Result::find($id);

        if ($result) {
            return response()->json([
                'status' => 200,
                'result' => $result
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such result Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:200',
            'result' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $result = Result::find($id);

            if ($result) {

                $result->update([
                    'user_id' => $request->user_id,
                    'result' => $request->result
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Question Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Question Found!"
                ], 404);
            }
        }
    }

    public function destroy($id) {
        $question = Result::find($id);

        if ($question) {
            $question->delete();
            return response()->json([
                'status' => 200,
                'message' => "Question Deleted Successfully!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Question Found!"
            ], 404);
        }
    }
}
