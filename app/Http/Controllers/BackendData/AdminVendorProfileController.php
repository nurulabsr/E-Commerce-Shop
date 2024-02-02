<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class AdminVendorProfileController extends Controller
{
     use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor.index');
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
            'admin_vendor_profile_banner' => ['nullable', 'image', 'max:4096', 'mimes:png,jpg'],
            'admin_vendor_profile_phone' => ['nullable', 'string', 'max:25'],
            'admin_vendor_profile_email' => ['required', 'email', 'max:254'],
            'admin_vendor_profile_address' => ['required', 'string', 'max:400'],
            'admin_vendor_profile_description' => ['required', 'string', 'max:500'],
            'admin_vendor_profile_facebook_url' => ['nullable', 'url', 'max:400'],
            'admin_vendor_profile_twitter_url' => ['nullable', 'url', 'max:400'],
            'admin_vendor_profile_insagram_url' => ['nullable', 'url', 'max:400'],
            'admin_vendor_profile_status'  => ['boolean'],
        ]);

        $admin_vendor_profile = new Vendor();
        $admin_vendor_profile->admin_vendor_profile_banner = $this->ImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads');
        
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
