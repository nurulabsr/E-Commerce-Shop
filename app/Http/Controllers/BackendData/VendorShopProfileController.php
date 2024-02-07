<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
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
            'vendor_profile_banner' =>      ['required', 'image', 'mimes:png,jpg', 'max:4096', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_phone'  =>      ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_email'  =>      ['required',  'email' , 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_address'=>      ['required', 'string',  'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_description' => ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_facebook_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_twitter_url' => ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_insagram_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_user_id' =>     ['required',  'boolean',  'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_status'  =>     ['required',  'boolean',  'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $vendor = new Vendor();
        $vendor->admin_vendor_profile_banner         = $request->  ; 
        $vendor->admin_vendor_profile_phone          = $request->  ;
        $vendor->admin_vendor_profile_email          = $request->  ;
        $vendor->admin_vendor_profile_address        = $request->  ;
        $vendor->admin_vendor_profile_description    = $request->  ;
        $vendor->admin_vendor_profile_facebook_url   = $request->  ;
        $vendor->admin_vendor_profile_twitter_url    = $request->  ;
        $vendor->admin_vendor_profile_insagram_url   = $request->  ;
        $vendor->admin_vendor_profile_status         = $request->  ;
        $vendor->admin_vendor_profile_user_id        = $request->  ; 
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
