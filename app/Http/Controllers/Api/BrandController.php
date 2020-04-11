<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Brand::Latest()->paginate(10);
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
            'description'=>'nullable|max:255',
            'image'=>'bail|required|image',

        ]);
        $name = time().'.'.explode('/',explode(':',
                substr($request->image,0,strpos($request->image,';')))[1])[1];
        Image::make($request->image)->save(public_path('storage').'/brands/'.$name);
        $request->merge(['image' => $name]);
        return Brand::create([
            'name'=>$request['name'],
            'alias'=>$request['alias'],
            'description'=>$request['description'],
            'image'=>$request['image'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Brand::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255',
            'description'=>'nullable|max:255',
            'image'=>'bail|required|image',

        ]);
        $currentPhoto = $brand->image;

        if($request->image != $currentPhoto){
            $name = time().'.'.explode('/',explode(':',
                    substr($request->image,0,strpos($request->image,';')))[1])[1];
            Image::make($request->image)->save(public_path('storage').'/brands/'.$name);
            $request->merge(['image' => $name]);

            $brandPhoto = public_path('storage').'/brands/'.$currentPhoto;
            if(file_exists($brandPhoto)){
                @unlink($brandPhoto);
            }
        }
        $brand->update($request->all());
        return ['message'=> 'Brand Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return ['message'=>'User Deleted'];
    }
}
