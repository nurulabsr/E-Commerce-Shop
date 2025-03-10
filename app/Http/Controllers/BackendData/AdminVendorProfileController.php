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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $user_profile = User::where('email', 'admin@edu.com')->first();
        $existing_vendor_profile = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();

        if($existing_vendor_profile) {
            return redirect()->route('already.exist');
        } else {
            return view('admin.vendor.create', compact('user_profile'));
        }

        
       
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
        $user_profile = User::where('email', 'admin@edu.com')->first();
        $path = $this->ImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads');
        $admin_vendor_profile->admin_vendor_profile_banner = $path;
        $admin_vendor_profile->admin_vendor_profile_phone = $request->admin_vendor_profile_phone;
        $admin_vendor_profile->admin_vendor_profile_email = $request->admin_vendor_profile_email;
        $admin_vendor_profile->admin_vendor_profile_address = $request->admin_vendor_profile_address;
        $admin_vendor_profile->admin_vendor_profile_description = $request->admin_vendor_profile_description;
        $admin_vendor_profile->admin_vendor_profile_facebook_url = $request->admin_vendor_profile_facebook_url;
        $admin_vendor_profile->admin_vendor_profile_twitter_url = $request->admin_vendor_profile_twitter_url;
        $admin_vendor_profile->admin_vendor_profile_insagram_url = $request->admin_vendor_profile_insagram_url;
        $admin_vendor_profile->admin_vendor_profile_status = $request->admin_vendor_profile_status;
        $admin_vendor_profile->admin_vendor_profile_user_id = $user_profile->id;
        $admin_vendor_profile->save();
        toastr()->success('Admin Vendor Profile Uploaded!');
        return redirect()->route('admin.vendor-profile.update');
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
        $vendor_profile = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();
        $user_profile = User::where('email', 'admin@edu.com')->first();
        return view('admin.vendor.update', compact('vendor_profile', 'user_profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        $admin_vendor_profile = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();
        $path = $this->UpdateImageFilePathHandling($request, 'admin_vendor_profile_banner', 'uploads', $admin_vendor_profile->admin_vendor_profile_banner);
        $admin_vendor_profile->admin_vendor_profile_banner = !empty($path) ? $path : $admin_vendor_profile->admin_vendor_profile_banner;
        $admin_vendor_profile->admin_vendor_profile_phone = $request->admin_vendor_profile_phone;
        $admin_vendor_profile->admin_vendor_profile_email = $request->admin_vendor_profile_email;
        $admin_vendor_profile->admin_vendor_profile_address = $request->admin_vendor_profile_address;
        $admin_vendor_profile->admin_vendor_profile_description = $request->admin_vendor_profile_description;
        $admin_vendor_profile->admin_vendor_profile_facebook_url = $request->admin_vendor_profile_facebook_url;
        $admin_vendor_profile->admin_vendor_profile_status = $request->admin_vendor_profile_status;
        $admin_vendor_profile->admin_vendor_profile_user_id = $admin_vendor_profile->id;
        $admin_vendor_profile->save();
        toastr()->success('Admin Vendor Profile updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
