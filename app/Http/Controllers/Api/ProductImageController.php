<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

/**
 * @group ProductImage management
 * APIs for managing product images
 */

class ProductImageController extends Controller
{
    /**
     * Display a listing of the ProductImage.
     * @authenticated
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\ProductImage
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return JsonResource::collection(ProductImage::latest()->paginate(10));
    }

    /**
     * Store a newly created ProductImage in storage.
     * @authenticated
     * @bodyParam product_id numeric required Product Id That This Image Belongs To
     * @bodyParam image image Image
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Address
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required|numeric|max:20',
            'image'=>'nullable|image',

        ]);
        $pImage=ProductImage::create([
            'product_id'=>$request['product_id'],
            'image'=>$request['image'],
        ]);
        return new JsonResource($pImage);
    }

    /**
     * Display the specified ProductImage.
     * @authenticated
     * @urlParam id required Product Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\ProductImage
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(ProductImage::findOrFail($id));
    }

    /**
     * Update the specified ProductImage in storage.
     * @authenticated
     * @urlParam id required Address's Id to be Updated
     * @bodyParam product_id numeric required Product Id That This Image Belongs To
     * @bodyParam image image Image
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Address
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $productImage = ProductImage::findOrFail($id);
        $this->validate($request,[
            'product_id'=>'required|numeric|max:20',
            'image'=>'nullable|image',

        ]);
        $productImage->update($request->all());
        return new JsonResource($productImage);
    }

    /**
     * Remove the specified ProductImage from storage.
     * @authenticated
     * @urlParam id Address's Id to be Deleted
     * @response {
     *  "message" : "ProductImage Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $productImage = ProductImage::findOrFail($id);
        $productImage->delete();
        return  response()->json(['message'=>'ProductImage Deleted']);
    }
}
