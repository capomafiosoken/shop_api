<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('parentCategory')->latest()->paginate(10);
    }

    public function showTree(){
        $roots = Category::whereNull('parent_id')->get();
        foreach ($roots as $root){
            $this->getChild($root);
        }
        return $roots;
    }

    public function getChild($root){
        foreach ($root->childCategories as $childCategory){
            $this->getChild($childCategory);
        }
        return $root;
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
            'parent_id'=>'required|digit:20',
            'keyword'=>'nullable|max:255',
            'description'=>'nullable|max:255',
            'image'=>'bail|required|image',

        ]);
        Category::create([
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
            'parent_id'=>'required|digit:20',
            'keyword'=>'nullable|max:255',
            'description'=>'nullable|max:255',
            'image'=>'bail|required|image',

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
