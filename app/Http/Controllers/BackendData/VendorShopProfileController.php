<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Auth;

class VendorShopProfileController extends Controller
{
    use UploadImageTrait;
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
            'vendor_profile_banner' =>      ['required', 'image', 'mimes:png,jpg', 'max:4096',],
            'vendor_profile_phone'  =>      ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_email'  =>      ['required',  'email' , 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_address'=>      ['required', 'string',  'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_description' => ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_facebook_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_twitter_url' => ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_insagram_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_user_id' =>     ['required',  'numeric',  'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_status'  =>     ['required',  'boolean',  'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $vendor = new Vendor();
        $path = $this->ImageFilePathHandling($request, 'vendor_profile_banner', 'uploads');
        $vendor->admin_vendor_profile_banner         = $path; 
        $vendor->admin_vendor_profile_phone          = $request->vendor_profile_phone;
        $vendor->admin_vendor_profile_email          = $request->vendor_profile_email;
        $vendor->admin_vendor_profile_address        = $request->vendor_profile_address;
        $vendor->admin_vendor_profile_description    = $request->vendor_profile_description;
        $vendor->admin_vendor_profile_facebook_url   = $request->vendor_profile_facebook_url;
        $vendor->admin_vendor_profile_twitter_url    = $request->vendor_profile_twitter_url;
        $vendor->admin_vendor_profile_insagram_url   = $request->vendor_profile_insagram_url;
        $vendor->admin_vendor_profile_status         = $request->vendor_profile_status;
        $vendor->admin_vendor_profile_user_id        = $request->vendor_profile_user_id; 
        $vendor->save();
        toastr()->success("Vendor profile added");
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
    public function edit(string $id,)
    {    
        $vendor = Vendor::where('admin_vendor_profile_user_id', Auth::user()->id)->first();
        return view('vendor.shop-profile.update', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vendor_profile_banner' =>      ['required', 'image', 'mimes:png,jpg', 'max:4096',],
            'vendor_profile_phone'  =>      ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_email'  =>      ['required',  'email' , 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_address'=>      ['required', 'string',  'not_regex:/<[^>]*>|[=\';"]/'], 
            'vendor_profile_description' => ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_facebook_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_twitter_url' => ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            'vendor_profile_insagram_url'=> ['required',  'url', 'not_regex:/<[^>]*>|[=\';"]/'],
            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
