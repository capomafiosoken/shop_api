<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new JsonResource(Category::with('categories')->whereNull('parent_id')->get());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255',
            'parent_id'=>'required|numeric|max:20',
            'keyword'=>'nullable|max:255',
            'description'=>'nullable|max:255',
            //'image'=>'bail|required|image',

        ]);
        return Category::create([
            'name'=>$request['name'],
            'alias'=>$request['alias'],
            'parent_id'=>$request['parent_id'],
            'keyword'=>$request['keyword'],
            'description'=>$request['description'],
            'image'=>$request['image']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::findOrFail($id)->products->paginate(10);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255',
            'parent_id'=>'required|numeric|max:20',
            'keyword'=>'nullable|max:255',
            'description'=>'nullable|max:255',
            //'image'=>'bail|required|image',

        ]);
        $category->update($request->all());
        return ['message'=> 'Category Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return ['message'=> 'Category Deleted'];
    }
}
