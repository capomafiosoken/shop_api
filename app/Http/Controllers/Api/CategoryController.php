<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

/**
 * @group Category management
 * APIs for managing categories
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     * @authenticated
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Category
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return JsonResource::collection(Category::with('categories')->whereNull('parent_id')->get());
    }

    /**
     * Store a newly created resource in storage.
     * @authenticated
     * @bodyParam name string required Category name
     * @bodyParam alias string required Category alias for future use as routes
     * @bodyParam parent_id string Category parent Id if it's child category
     * @bodyParam keyword string Keyword
     * @bodyParam description string Description
     * @bodyParam image image required Image
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255|unique:categories',
            'parent_id'=>'nullable|numeric|digits_between:1,20',
            'keyword'=>'nullable|max:255',
            'description'=>'nullable|max:255',
            'image'=>'required|image',
        ]);
        $name = $request->file('image')->hashName();
        $request->file('image')->storeAs('images/category', $name);
        $category = Category::create([
            'name'=>$request['name'],
            'alias'=>$request['alias'],
            'parent_id'=>$request['parent_id'],
            'keyword'=>$request['keyword'],
            'description'=>$request['description'],
            'image'=>$name
        ]);
        return new JsonResource($category);
    }

    /**
     * Display the specified category.
     *@authenticated
     * @urlParam id required Category Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Category
     * @param $id
     * @return JsonResource
     * @return Response
     */
    public function show($id)
    {
        return new JsonResource(Category::with('products')->findOrFail($id));
    }

    /**
     * Update the specified category in storage.
     * @authenticated
     * @urlParam id Category's Id to be Updated
     * @bodyParam name string Category name
     * @bodyParam alias string  Category alias for future use as routes
     * @bodyParam parent_id numeric  Category parent Id if it's child category
     * @bodyParam keyword string Keyword
     * @bodyParam description string Keyword
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Category
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name'=>'sometimes|max:255',
            'alias'=>'sometimes|max:255|unique:categories',
            'parent_id'=>'sometimes|numeric|digits_between:1,20',
            'keyword'=>'sometimes|max:255',
            'description'=>'sometimes|max:255',
        ]);
        $category->update(array_filter($request->all()));
        return new JsonResource($category);
    }

    /**
     * Remove the specified category from storage.
     * @authenticated
     * @urlParam id Category's Id to be Deleted
     * @response {
     *  "message" : "Category Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message'=> 'Category Deleted']);
    }
}
