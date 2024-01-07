<?php

namespace App\Http\Controllers\Api;

use App\Models\reg_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index() {
        $users = reg_user::all();
        if($users->count() > 0) {
            return response()->json([
                    'status' => 200,
                    'users' => $users
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'users' => 'No Records Found'
            ], 404);
        }   
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'middle_initial' => 'nullable|alpha|max:1',
            'birth_date' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'phone' => 'required|digits:11',
            'address' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:reg_users,username',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ], 422);
        } else {
            $user = reg_user::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_initial' => $request->middle_initial,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
                'username' => $request->username,
                'type' => $request->type,
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($user) {

                return response()->json([
                    'status' => 200,
                    'message' => 'User Created Successfully'
                ], 200);

            } else {

                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500);

            }
        }
    }
    public function show($id) {
        $user = reg_user::find($id);

        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such User Found!"
            ], 404);
        }
    }

    public function edit($id) {
        $user = reg_user::find($id);

        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such User Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'middle_initial' => 'nullable|alpha|max:1',
            'birth_date' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'phone' => 'required|digits:11',
            'address' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ], 422);
        } else {
            $user = reg_user::find($id);

            if ($user) {
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'middle_initial' => $request->middle_initial,
                    'birth_date' => $request->birth_date,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'User Updated Successfully'
                ], 200);

            } else {

                return response()->json([
                    'status' => 404,
                    'message' => 'No Such User Found!'
                ], 404);

            }
        }
    }

    public function destroy($id) {
        $user = reg_user::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Successfully!'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such User Found!'
            ], 404);
        }
    }
}
