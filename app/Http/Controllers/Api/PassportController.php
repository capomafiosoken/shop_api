<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PassportController extends Controller
{

    /**
     * @throws ValidationException
     * @api {post} /api/register
     * @apiName Register User
     * @apiGroup Passport
     * @apiParam {string} name User Name
     * @apiParam {string} email User Email
     * @apiParam {string} password User Password
     */
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
            $user = auth()->user();
            $token = $user->createToken('shop_api')->accessToken;
            return response()->json([
                'token' => $token,
                'role' => $user->role]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
