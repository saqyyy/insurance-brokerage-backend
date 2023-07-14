<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Policy;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'ASC')->get();
        return response()->json(['success' => true, 'data' => $clients, 'message' => "record fetched successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::with('policies')->where('id', $id)->first();
        if (!$client)
            return response()->json(['success' => false, 'data' => null, 'message' => "Record not found"], 404);
        return response()->json(['success' => true, 'data' => [$client]], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}