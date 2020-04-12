<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilterGroup;
use Illuminate\Http\Request;

class FilterGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilterGroup::orderBy('id', 'desc')->paginate(10);
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

        ]);
        return FilterGroup::create([
            'name'=>$request['name']
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilterGroup  $filterGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FilterGroup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilterGroup  $filterGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filterGroup = FilterGroup::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255',

        ]);
        $filterGroup->update($request->all());
        return ['message'=> 'FilterGroup Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FilterGroup  $filterGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filterGroup = FilterGroup::findOrFail($id);
        $filterGroup->delete();
        return ['message'=> 'FilterGroup Deleted'];
    }
}
