<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index() {

        $questions =  Question::all();
        if ($questions->count() > 0) {
            return response()->json([
                'status' => 200,
                'questions' => $questions
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'questions' => 'No Record Found'
            ], 404);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'question_title' => 'required|string|max:200',
            'option_one' => 'required|string|max:200',
            'option_two' => 'required|string|max:200',
            'option_three' => 'required|string|max:200',
            'option_four' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $question = Question::create([
                'question_title' => $request->question_title,
                'option_one' => $request->option_one,
                'option_two' => $request->option_two,
                'option_three' => $request->option_three,
                'option_four' => $request->option_four,
            ]);

            if ($question) {

                return response()->json([
                    'status' => 200,
                    'message' => "Question Created Successfully"
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
        $question = Question::find($id);

        if ($question) {
            return response()->json([
                'status' => 200,
                'question' => $question
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Question Found!"
            ], 404);
        }
    }

    public function edit($id) {
        $question = Question::find($id);

        if ($question) {
            return response()->json([
                'status' => 200,
                'question' => $question
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Question Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'question_title' => 'required|string|max:200',
            'option_one' => 'required|string|max:200',
            'option_two' => 'required|string|max:200',
            'option_three' => 'required|string|max:200',
            'option_four' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $question = Question::find($id);

            if ($question) {

                $question->update([
                    'question_title' => $request->question_title,
                    'option_one' => $request->option_one,
                    'option_two' => $request->option_two,
                    'option_three' => $request->option_three,
                    'option_four' => $request->option_four,
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
        $question = Question::find($id);

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