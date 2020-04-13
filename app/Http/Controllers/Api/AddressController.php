<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::Latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'city_id'=>'required|numeric|digits_between:1,20',
            'zip_code'=>'required|max:6',
            'address'=>'required|max:255',
            'full_name'=>'required|max:255',
            'telephone_number'=>'required|max:255',
            'note'=>'nullable|max:255'

        ]);
       return  Address::create([
            'city_id'=>$request['city_id'],
            'zip_code'=>$request['zip_code'],
            'address'=>$request['address'],
            'full_name'=>$request['full_name'],
            'telephone_number'=>$request['telephone_number'],
            'note'=>$request['note'],
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Address::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return array
     */
    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $this->validate($request,[
            'city_id'=>'required|numeric|digits_between:1,20',
            'zip_code'=>'required|max:6',
            'address'=>'required|max:255',
            'full_name'=>'required|max:255',
            'telephone_number'=>'required|max:255',
            'note'=>'nullable|max:255'

        ]);
        $address->update($request->all());
        return ['message'=>'Address Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return ['message'=>'Address Deleted'];
    }
}
