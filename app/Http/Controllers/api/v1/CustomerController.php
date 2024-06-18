<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\v1\StoreCustomerRequest;
use App\Http\Requests\v1\BulkStoreCustomerRequest;
use App\Http\Requests\v1\UpdateCustomerRequest;
use App\Http\Controllers\controller;
use App\Http\Resources\v1\CustomerCollection;
use App\Http\Resources\v1\CustomerResource;
use App\Filters\ApiFilter;
use App\Filters\CustomerFilter;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $customerQuery = new CustomerFilter();
        $queryItems = $customerQuery->transform($request)??[];
        // dd($queryItems);
        if(count($queryItems)==0) return new CustomerCollection(Customer::paginate());
        else  {
            $customers = Customer::where($queryItems)->paginate();
            //return $customers;
            // dd($request->query());
           
            return new CustomerCollection($customers->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * store in bulk way or storing multiple resource or customer at one shot
     */
    public function bulkStore(BulkStoreCustomerRequest $request)  {
        $bulkCollection = collect($request->all());
    
        // Map to format the collection in key:value format but exclude certain keys
        $bulkMapped = $bulkCollection->map(function ($item, $key) {
            // Return all keys with values except 'Id'
            return collect($item)->except(['Id'])->all();
        });
        Customer::insert($bulkMapped->toArray());
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        return $customer->update(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
