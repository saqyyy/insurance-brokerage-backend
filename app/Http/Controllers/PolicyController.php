<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Policy;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request, string $id)
    {
        //taking client id as parameter,because authentication is not in place

        $query = $request->input('query');
        $policies = Policy::query()
            ->where('client_id', $id)
            ->where('customer_name', 'LIKE', "%{$query}%")
            ->orWhere('customer_address', 'LIKE', "%{$query}%")
            ->orWhere('policy_type', 'LIKE', "%{$query}%")
            ->orWhere('insurer_name', 'LIKE', "%{$query}%")
            ->get();


        return response()->json(['success' => true, 'data' => $policies, 'message' => "Request served successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'client_id' => 'required|integer',
            'premium' => 'required|integer',
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'policy_type' => 'required|in:default,premium',
            'insurer_name' => 'required|string',
        ]);

        //prior client existence check

        $client = Client::where('id', $request->client_id)->first();

        if (!$client)
            return response()->json(['success' => false, 'data' => null, 'message' => "Client record not found"], 400);

        //saving policy
        $policy = Policy::create($request->all());

        return response()->json(['success' => true, 'data' => null, 'message' => "Policy created successfully"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $policy = Policy::find($id);
        if (!$policy)
            return response()->json(['success' => false, 'data' => null, 'message' => "Policy record not found"], 404);

        return response()->json(['success' => true, 'data' => $policy, 'message' => "Request served successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $policy = Policy::find($id);

        if (!is_null($policy)) {
            $this->validate($request, [
                'premium' => 'required|integer',
                'customer_name' => 'required|string',
                'customer_address' => 'required|string',
                'policy_type' => 'required|in:default,premium',
                'insurer_name' => 'required|string',
            ]);

            $policy['premium'] = $request->premium;
            $policy['customer_name'] = $request->customer_name;
            $policy['customer_address'] = $request->customer_address;
            $policy['policy_type'] = $request->policy_type;
            $policy['insurer_name'] = $request->insurer_name;
            $policy->update();
            return response()->json(['success' => true, 'data' => null, 'message' => "Policy updated successfully"], 200);
        }

        return response()->json(['success' => false, 'data' => null, 'message' => "Policy record not found"], 404);

    }
}