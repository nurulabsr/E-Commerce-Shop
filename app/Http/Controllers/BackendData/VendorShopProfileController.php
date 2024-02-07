<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorShopProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $vendor = User::where('email', 'vendor@edu.com')->first();
        return view('vendor.shop-profile.index', compact('vendor'));
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
    public function store(Request $request)
    {
        $request->validate([
            'vendor_profile_banner' =>      [],
            'vendor_profile_phone'  =>      [],
            'vendor_profile_email'  =>      [],
            'vendor_profile_address'=>      [],
            'vendor_profile_description' => [],
            'vendor_profile_facebook_url'=> [],
            'vendor_profile_twitter_url' => [],
            'vendor_profile_insagram_url'=> [],
            'vendor_profile_user_id' =>     [],
            'vendor_profile_status'  =>     [],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
