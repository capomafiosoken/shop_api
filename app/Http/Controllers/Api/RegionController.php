<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Region::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255'
        ]);
        Region::create([
            'name'=>$request['name']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return Region::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Region  $region
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $region = Region::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255'
        ]);
        $region->update($request->all());
        return ['message'=> 'Region Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return Response
     */
    public function destroy($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();
        return ['message'=> 'Region Deleted'];
    }
}
