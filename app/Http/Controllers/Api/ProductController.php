<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::Latest()->paginate(10);
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

        ]);
        $name = time().'.'.explode('/',explode(':',
                substr($request->image,0,strpos($request->image,';')))[1])[1];
        Image::make($request->image)->save(public_path('storage').'/products/'.$name);
        $request->merge(['image' => $name]);

        $product = Product::create([
            'name' => $request['name'],
            'alias' => $request['alias'],
            'description' => $request['description'],
            'content' => $request['content'],
            'brand_id' => $request['brand_id'],
            'price' => $request['price'],
            'keywords' => $request['keywords'],
            'image' => $request['image'],
            'pieces_left' => $request['pieces_left'],
        ]);
        if ($request->filled('product_images')) {
            foreach ($request->input('product_images') as $product_image) {
                $name = time() . '.' . explode('/', explode(':',
                        substr($product_image, 0, strpos($$product_image, ';')))[1])[1];
                Image::make($product_image)->save(public_path('storage') . '/products/' . $name);
                $product->productImages()->create([
                    'name' => $name
                ]);
            }
        }
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request,[

        ]);
        $product->update($request->all());
        return ['message'=>'Product Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return ['message'=>'Product Updated'];
    }
}
