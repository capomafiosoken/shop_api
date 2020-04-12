<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * @group Role management
 * APIs for managing roles
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the role.
     * @authenticated
     * @return JsonResource
     */
    public function index()
    {
        return new JsonResource(Role::all());
    }

    /**
     * Store a newly created role in storage.
     *
     * @authenticated
     * @bodyParam name string required Name
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles,name'
        ]);
        $role = Role::create([
            'name'=>$request['name']
        ]);
        return new JsonResource($role);
    }

    /**
     * Display the specified role.
     * @authenticated
     * @urlParam id required Role Id
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return Role::findOrFail($id);
    }

    /**
     * Update the specified role in storage.
     * @authenticated
     * @urlParam id required Role Id
     * @bodyParam name string Name
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $this->validate($request,[
            'name'=>'sometimes|unique:roles,name'
        ]);
        $role->update(array_filter($request->all()));
        return new JsonResource($role);
    }

    /**
     * Remove the specified role from storage.
     * @authenticated
     * @urlParam integer Role Id
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['message'=>'Role Deleted'], Response::HTTP_ACCEPTED);
    }
}
