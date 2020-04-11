<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->roles()->attach(3);

        $token = $user->createToken('shop_api')->accessToken;

        return response()->json(['token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('shop_api')->accessToken;
            return response()->json([
                'token' => $token,
                'roles' => auth()->user()->roles]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function details()
    {
        return response()->json(['user' => auth()->user()]);
    }
}
