<?php

namespace App\Http\Controllers;

use App\Models\EmergencyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmergencyResponseRequest;
use App\Http\Requests\UpdateEmergencyResponseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmergencyResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth::id();

        $member = DB::table('members')->where('id', $userId)->first();
        if ($member->role === 'A') {
            return response()->json([
                'message' => 'success',
                'emergency' => EmergencyResponse::all(),
            ]);
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
    public function store(StoreEmergencyResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmergencyResponse $emergencyResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmergencyResponse $emergencyResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmergencyResponse $emergencyResponse)
    {
        $fields = $request->validate([
            'Response' => 'required'
        ]);

        $emergencyResponse->update($fields);

        return ([
            'success',
            'The response was updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmergencyResponse $emergencyResponse)
    {
        //
    }
}
