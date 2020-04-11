<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductImage::latest()->paginate(10);
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
            'product_id'=>'required|numeric|max:20',
            'image'=>'bail|required|image',

        ]);
        ProductImage::create([
            'product_id'=>$request['product_id'],
            'image'=>$request['image'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ProductImage::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productImage = ProductImage::findOrFail($id);
        $this->validate($request,[
            'product_id'=>'required|numeric|max:20',
            'image'=>'bail|required|image',

        ]);
        $productImage->update($request->all());
        return ['message'=> 'ProductImage Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImage = ProductImage::findOrFail($id);
        $productImage->delete();
        return ['message'=>'ProductImage Deleted'];
    }
}
