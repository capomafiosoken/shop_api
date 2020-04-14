<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

/**
 * @group Currency management
 * APIs for managing currency
 */
class CurrencyController extends Controller
{
    /**
     * Display a listing of the currency.
     * @authenticated
     * @queryParam page required The page number. default = 1
     * @queryParam per_page required The number of items per list. default = 15
     * @apiResourceCollection Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Currency
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return Currency::latest()->paginate($request['per_page']);
    }

    /**
     * Store a newly created currency in storage.
     * @authenticated
     * @bodyParam name string required Currency Name
     * @bodyParam code string required Currency Name
     * @bodyParam symbol_left string  Currency Name
     * @bodyParam symbol_right string  Currency Name
     * @bodyParam value numeric required Currency Name
     * @bodyParam base enum[0:1] required Currency Name
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Currency
     * @param Request $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'code'=>'required|max:255',
            'symbol_left'=>'nullable|max:255',
            'symbol_right'=>'nullable|max:255',
            'value'=>'required|numeric',
            'base'=>'required|in:0,1',

        ]);
        $currency = Currency::create([
            'name'=>$request['name'],
            'code'=>$request['code'],
            'symbol_left'=>$request['symbol_left'],
            'symbol_right'=>$request['symbol_right'],
            'value'=>$request['value'],
            'base'=>$request['base'],
        ]);
        return new JsonResource($currency);
    }

    /**
     * Display the specified currency.
     * @authenticated
     * @urlParam id required Currency Id
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Currency
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        return new JsonResource(Currency::findOrFail($id));
    }

    /**
     * @authenticated
     * @urlParam id required Currency Id
     * @bodyParam name string  Currency Name
     * @bodyParam code string  Currency Name
     * @bodyParam symbol_left string  Currency Name
     * @bodyParam symbol_right string  Currency Name
     * @bodyParam value numeric  Currency Name
     * @bodyParam base enum[0,1]  Currency Name
     * @apiResource Illuminate\Http\Resources\Json\JsonResource
     * @apiResourceModel App\Models\Currency
     * @param Request $request
     * @param $id
     * @return JsonResource
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $this->validate($request,[
            'name'=>'sometimes|max:255',
            'code'=>'sometimes|max:255',
            'symbol_left'=>'sometimes|max:255',
            'symbol_right'=>'sometimes|max:255',
            'value'=>'sometimes|numeric',
            'base'=>'sometimes|in:0,1',

        ]);
        $currency->update(array_filter($request->all(), function($value) {
            return !is_null($value);
        }));
        return new JsonResource($currency);
    }

    /**
     * Remove the specified currency from storage.
     * @authenticated
     * @urlParam id required Currency Id
     * @response {
     *  "message" : "Currency Deleted"
     * }
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return response()->json(['message'=> 'Currency Deleted']);
    }
}
