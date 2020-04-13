<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

/**
 * @group Brand management
 * APIs for managing brands
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the brand.
     * @authenticated
     * @queryParam page required The page number. default = 1
     * @queryParam per_page required The number of items per list. default = 15
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Brand
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return JsonResource::collection(Brand::Latest()->paginate($request['per_page']));
    }

    /**
     * Store a newly created brand in storage.
     * @authenticated
     * @bodyParam name string required Brand Name
     * @bodyParam alias string required Unique Alias
     * @bodyParam description string required Description
     * @bodyParam image image Image
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Brand
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255',
            'description'=>'nullable|max:255',
            //'image'=>'bail|required|image',

        ]);

        $brand =  Brand::create([
            'name'=>$request['name'],
            'alias'=>$request['alias'],
            'description'=>$request['description'],
//            'image'=>$request['image'],
        ]);
        return new JsonResource($brand);
    }

    /**
     * Display the specified brand.
     * @authenticated
     * @urlParam id required Brand Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Brand
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(Brand::findOrFail($id));
    }

    /**
     * Update the specified brand in storage.
     * @authenticated
     * @urlParam id required Brand Id
     * @bodyParam name string Brand Name
     * @bodyParam alias string Unique Alias
     * @bodyParam description string  Description
     * @bodyParam image image Image
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Brand
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $this->validate($request,[
            'name'=>'sometimes|max:255',
            'alias'=>'sometimes|max:255',
            'description'=>'nullable|max:255',
            //'image'=>'bail|required|image',

        ]);

        $brand->update(array_filter($request->all()));
        return new JsonResource($brand);
    }

    /**
     * Remove the specified brand from storage.
     * @authenticated
     * @urlParam id required Brand Id
     * @response {
     *  "message" : "Brand Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['message'=>'Brand Deleted']);
    }
}
