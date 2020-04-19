<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @group Access management
 *
 * APIs for managing access
 */
class PassportController extends Controller
{

    /**
     * Registration User
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException User Registration
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
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return response()->json(['message' => 'Registered']);
    }

    /**
     * Log In User
     * @bodyParam password string required User Password
     * @bodyParam email string required User Email
     * @response {
     *  "token": "Bearer token",
     *  "role": "user"
     * }
     * @response 401 {
     *  "error": "Unauthorized"
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

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
     * Log out Authenticated User
     * @authenticated
     * @response {
     *  "message":"Logged Out"
     * }
     */
    public function logout(){
        auth()->logout();
        return response()->json(['message'=>'Logged Out']);
    }

    public function test(){

    }
}
