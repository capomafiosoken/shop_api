<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilterGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

/**
 * @group FilterGroup management
 * APIs for managing filter groups
 */

class FilterGroupController extends Controller
{
    /**
     * Display a listing of the FilterGroup.
     * @authenticated
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterGroup
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return JsonResource::collection(FilterGroup::orderBy('id', 'desc')->paginate(10));
    }

    /**
     * Store a newly created FilterGroup in storage.
     * @authenticated
     * @bodyParam name string required Name
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterGroup
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',

        ]);
        $fGroup= FilterGroup::create([
            'name'=>$request['name']
        ]);
        return new JsonResource($fGroup);
    }
    /**
     * Display the specified FilterGroup.
     * @authenticated
     * @urlParam id required FilterGroup Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterGroup
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(FilterGroup::findOrFail($id));
    }

    /**
     * Update the specified FilterGroup in storage.
     * @authenticated
     * @urlParam id required FilterGroup's Id to be Updated
     * @bodyParam filter_group_id numeric required Filter Group Id
     * @bodyParam value string required Value
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterGroup
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $filterGroup = FilterGroup::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255',
        ]);
        $filterGroup->update($request->all());
        return new JsonResource($filterGroup);
    }

    /**
     * Remove the specified FilterGroup from storage.
     * @authenticated
     * @urlParam id FilterGroup's Id to be Deleted
     * @response {
     *  "message" : "FilterGroup Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $filterGroup = FilterGroup::findOrFail($id);
        $filterGroup->delete();
        return response()->json(['message'=> 'FilterGroup Deleted']);
    }
}
