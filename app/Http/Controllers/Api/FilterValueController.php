<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilterValue;
use Illuminate\Http\Request;

class FilterValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilterValue::latest()->paginate(10);
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
        return FilterValue::create([
            'value'=>$request['value'],
            'filter_group_id'=>$request['filter_group_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilterValue  $filterValue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FilterValue::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilterValue  $filterValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filterValue = FilterValue::findOrFail($id);
        $this->validate($request,[

        ]);
        $filterValue->update($request->all());
        return ['message'=>'FilerValue Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FilterValue  $filterValue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filterValue = FilterValue::findOrFail($id);
        $filterValue->delete();
        return ['message'=>'FilterValue Deleted'];
    }
}
