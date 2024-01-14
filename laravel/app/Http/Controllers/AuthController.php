<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function adminLogin(LoginAdminRequest $request) {
        $request->validated();
    
        if (!Auth::attempt($request->only('username', 'password'))) {
            return $this->error('', 'Credentials do not match', 401);
        }
    
        $user = User::where('username', $request->username)->first();
    
        if ($user->type !== 'admin') {
            Auth::logout(); // Logout the user if the type is not admin
            return $this->error('', 'Unauthorized. Admin credentials required.', 401);
        }
    
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '. $user->first_name)->plainTextToken
        ]);
    }
    
    
    public function login(LoginUserRequest $request) {
        $request->validated($request->all());

        if(!Auth::attempt($request->only('username', 'password'))){
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('username', $request->username)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '. $user->first_name)->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request) {
        $request->validated($request->all());

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '. $user->first_name)->plainTextToken
        ]);
    }

    public function logout() {
        return response()->json('this is my logout');
    }

    public function show(Request $payload)
    {
        $user = $payload->user();
        return new UserResource($user);
    }
}
