<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     * @group User management
     * @authenticated
     * @queryParam page required The page number. default = 1
     * @queryParam per_page required The number of items per list. default = 15
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return JsonResource::collection(User::latest()->paginate($request->per_page));
    }

    /**
     * Store a newly created User in storage.
     * @group User management
     * @authenticated
     * @bodyParam name string required User Name
     * @bodyParam email string required User Email
     * @bodyParam password string required User Password
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        return new JsonResource($user);
    }

    /**
     * Display the specified User
     * @group User management
     * @authenticated
     * @urlParam id required User ID
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     * @param int $id
     * @return JsonResource
     */
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
        return new JsonResource($user);
    }
    /**
     * Display the authenticated User
     * @group User management
     * @authenticated
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     */
    public function profile()
    {
        return new JsonResource(auth()->user());
    }

    /**
     * Updates the authenticated User
     * @group User management
     * @authenticated
     * @bodyParam name string required User Name
     * @bodyParam email string required User Email
     * @bodyParam password string required User Password
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|string|min:6'
        ]);

        $user ->update($request ->all());
        return new JsonResource($user);
    }


    /**
     * Update the specified User
     * @group User management
     * @authenticated
     * @urlParam id User's Id to be Updated
     * @bodyParam name string required User Name
     * @bodyParam email string required User Email
     * @bodyParam password string required User Password
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\User
     * @param Request $request
     * @param int $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|string|min:6'
        ]);
        $user->update($request->all());

        return new JsonResource($user);
    }

    /**
     * Remove the specified User from storage.
     * @group User management
     * @authenticated
     * @urlParam id User's Id to be Deleted
     * @response {
     *  "message" : "User Deleted"
     * }
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //delete the user
        $user->delete();
        return ['message'=> 'User Deleted'];
    }
}
