<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PassportController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException User Registration
     * @group Passport
     * @bodyParam name string required User Name
     * @bodyParam email string required User Email
     * @bodyParam password string required User Password
     * @response {
     *  "message":"Registered"
     * }
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Registered']);
    }

    /**
     * User Authorization
     * @group Passport
     * @bodyParam name string required User Name
     * @bodyParam email string required User Email
     * @response {
     *  "token": "Bearer token",
     *  "role": "user"
     * }
     * @response 401 {
     *  "error": "Unauthorized"
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('shop_api')->accessToken;
            return response()->json([
                'token' => $token,
                'role' => $user->role]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * @authenticated
     * @response {
     *  "message":"Logged Out"
     * }
     */
    public function logout(){
        auth()->logout();
        return response()->json(['message'=>'Logged Out']);
    }

}
