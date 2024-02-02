<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVendorProfileController extends Controller
{
     use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user_profile = User::where('email', 'admin@edu.com')->first();
        $vendor_profile = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();
        return view('admin.vendor.index', compact('vendor_profile', 'user_profile'));
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

        // $admin_vendor_profile = new Vendor();
        $admin_vendor_profile = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();
        // $admin_vendor_profile->admin_vendor_profile_banner = $this->ImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads');
        $admin_vendor_profile->admin_vendor_profile_banner = empty(!$this->UpdateImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads', $admin_vendor_profile->admin_vendor_profile_banner)) ? $this->UpdateImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads', $admin_vendor_profile->admin_vendor_profile_banner) : $admin_vendor_profile->admin_vendor_profile_banner;
        $admin_vendor_profile->admin_vendor_profile_phone = $request->admin_vendor_profile_phone;
        $admin_vendor_profile->admin_vendor_profile_email = $request->admin_vendor_profile_email;
        $admin_vendor_profile->admin_vendor_profile_address = $request->admin_vendor_profile_address;
        $admin_vendor_profile->admin_vendor_profile_description = $request->admin_vendor_profile_description;
        $admin_vendor_profile->admin_vendor_profile_facebook_url = $request->admin_vendor_profile_facebook_url;
        $admin_vendor_profile->admin_vendor_profile_twitter_url = $request->admin_vendor_profile_twitter_url;
        $admin_vendor_profile->admin_vendor_profile_insagram_url = $request->admin_vendor_profile_insagram_url;
        $admin_vendor_profile->admin_vendor_profile_status = $request->admin_vendor_profile_status;
        $admin_vendor_profile->admin_vendor_profile_user_id = $request->admin_vendor_profile_user_id;
        $admin_vendor_profile->save();
        toastr()->success('Admin Vendor Profile Uploaded!');
        return redirect()->back();
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
