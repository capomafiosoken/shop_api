<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilterValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

/**
 * @group FilterValue management
 * APIs for managing addresses
 */
class FilterValueController extends Controller
{
    /**
     * Display a listing of the FilterValue.
     * @authenticated
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterValue
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return  JsonResource::collection(FilterValue::with('filter_group')->orderBy('id')->paginate(10));
    }

    /**
     * Store a newly created FilterValue in storage.
     * @authenticated
     * @bodyParam filter_group_id numeric required Filter Group Id
     * @bodyParam value string required Value
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterValue
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'value'=>'required|max:255',
            'filter_group_id'=>'required|numeric|digits_between:1,20',

        ]);
        $fValue=FilterValue::create([
            'value'=>$request['value'],
            'filter_group_id'=>$request['filter_group_id']
        ]);
        return new JsonResource($fValue);
    }

    /**
     * Display the specified FilterValue.
     * @authenticated
     * @urlParam id required FilterValue Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterValue
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(FilterValue::findOrFail($id));
    }

    /**
     * Update the specified FilterValue in storage.
     * @authenticated
     * @urlParam id required FilterValue's Id to be Updated
     * @bodyParam filter_group_id numeric required Filter Group Id
     * @bodyParam value string required Value
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\FilterValue
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $filterValue = FilterValue::findOrFail($id);
        $this->validate($request,[
            'value'=>'required|max:255',
            'filter_group_id'=>'required|numeric|digits_between:1,20',

        ]);
        $filterValue->update($request->all());
        return new JsonResource($filterValue);
    }

    /**
     * Remove the specified FilterValue from storage.
     * @authenticated
     * @urlParam id FilterValue's Id to be Deleted
     * @response {
     *  "message" : "FilterValue Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $filterValue = FilterValue::findOrFail($id);
        $filterValue->delete();
        return response()->json(['message'=>'FilterValue Deleted']);
    }
}
