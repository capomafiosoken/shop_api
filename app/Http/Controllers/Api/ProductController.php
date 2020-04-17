<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * @group Product management
 * APis for managing products
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     * @authenticated
     * @queryParam page required The page number. default = 1
     * @queryParam per_page required The number of items per list. default = 15
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Product
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return JsonResource::collection(Product::Latest()->paginate($request['per_page']));
    }

    /**
     * Store a newly created product in storage.
     * @authenticated
     * @bodyParam name string required Product Name
     * @bodyParam alias string required Product Alias
     * @bodyParam description string Description
     * @bodyParam content string Content of Product page
     * @bodyParam brand_id numeric required Brand Id
     * @bodyParam price numeric required Product Price
     * @bodyParam keywords string Product keywords
     * @bodyParam image image required Product Image
     * @bodyParam product_images image.* Product Images
     * @bodyParam pieces_left numeric required Left pieces of Product
     * @bodyParam status enum[0,1] required Status of Product 0 - off, 1 - on
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Product
     * @param Request $request
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'alias' => 'required|max:255|unique:products',
            'description' => 'nullable|max:255',
            'content' => 'nullable|max:1000',
            'status'=>'nullable|in:0,1',
            'brand_id' => 'required|numeric|digits_between:1,20',
            'price' => 'required|numeric|digits_between:1,18',
            'keywords' => 'nullable|max:255',
            'pieces_left' => 'required|numeric',
            'image'=>'required|image',
            'product_image.*'=>'required|image',
        ]);
        $name = $request->file('image')->hashName();
        $request->file('image')->storeAs('images/product', $name);
        $product = Product::create([
            'name' => $request['name'],
            'alias' => $request['alias'],
            'description' => $request['description'],
            'content' => $request['content'],
            'brand_id' => $request['brand_id'],
            'price' => $request['price'],
            'keywords' => $request['keywords'],
            'pieces_left' => $request['pieces_left'],
            'status' => $request['status'],
            'image' => $name
        ]);
        foreach ($request->file('product_image') as $product_image){
            $name = $request->file('image')->hashName();
            $product_image->storeAs('images/product', $name);
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $name
            ]);
        }
        return new JsonResource($product);
    }

    /**
     * Display the specified product.
     * @authenticated
     * @urlParam id required Product Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Product
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(Product::findOrFail($id));
    }

    /**
     * Update the specified product in storage.
     * @authenticated
     * @bodyParam name string Product Name
     * @bodyParam alias string Product Alias
     * @bodyParam description string Description
     * @bodyParam content string Content of Product page
     * @bodyParam brand_id numeric Brand Id
     * @bodyParam price numeric Product Price
     * @bodyParam keywords string Product keywords
     * @bodyParam pieces_left numeric Left pieces of Product
     * @bodyParam status enum[0,1] Status of Product 0 - off, 1 - on
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Product
     * @param Request $request
     * @param int $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request,[
            'name' => 'sometimes|max:255',
            'alias' => 'sometimes|max:255|unique:products',
            'description' => 'sometimes|max:255',
            'content' => 'sometimes|max:1000',
            'brand_id' => 'sometimes|numeric|digits_between:1,20',
            'price' => 'sometimes|numeric|digits_between:1,18',
            'keywords' => 'sometimes|max:255',
            'pieces_left' => 'sometimes|numeric',
            'status' => 'sometimes|in:0,1',
        ]);
        $product->update(array_filter($request->all(), function($value) {
            return !is_null($value);
        }));
        return new JsonResource($product);
    }

    /**
     * Remove the specified product from storage.
     * @authenticated
     * @urlParam id required Product Id
     * @response {
     *  "message": "Product Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message'=>'Product Deleted'],  Response::HTTP_ACCEPTED);
    }


    /**
     * Store a newly created product in storage.
     * @authenticated
     * @bodyParam name string required Product Name
     * @bodyParam alias string required Product Alias
     * @bodyParam description string Description
     * @bodyParam content string Content of Product page
     * @bodyParam brand_id numeric required Brand Id
     * @bodyParam price numeric required Product Price
     * @bodyParam keywords string Product keywords
     * @bodyParam image image required Product Image
     * @bodyParam product_images image.* Product Images
     * @bodyParam pieces_left numeric required Left pieces of Product
     * @bodyParam status enum[0,1] required Status of Product 0 - off, 1 - on
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Product
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function updatePhotos(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'sometimes|max:255',
            'alias' => 'sometimes|max:255|unique:products',
            'description' => 'sometimes|nullable|max:255',
            'content' => 'sometimes|nullable|max:1000',
            'status'=>'sometimes|nullable|in:0,1',
            'brand_id' => 'sometimes|numeric|digits_between:1,20',
            'price' => 'sometimes|numeric|digits_between:1,18',
            'keywords' => 'sometimes|nullable|max:255',
            'pieces_left' => 'sometimes|numeric',
            'image'=>'sometimes|image',
            'product_image.*'=>'sometimes|image',
        ]);
        $name = $request->file('image')->hashName();
        $request->file('image')->storeAs('images/product', $name);
        $product->update([
            'name' => $request['name'],
            'alias' => $request['alias'],
            'description' => $request['description'],
            'content' => $request['content'],
            'brand_id' => $request['brand_id'],
            'price' => $request['price'],
            'keywords' => $request['keywords'],
            'pieces_left' => $request['pieces_left'],
            'status' => $request['status'],
            'image' => $name
        ]);
        foreach ($request->file('product_image') as $product_image){
            $name = $request->file('image')->hashName();
            $product_image->storeAs('images/product', $name);
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $name
            ]);
        }
        return new JsonResource($product);
    }
}
