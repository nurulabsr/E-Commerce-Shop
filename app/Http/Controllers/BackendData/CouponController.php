<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'coupon_name' => ['required', 'string', 'max:254'],
           'coupon_code' => ['required', 'string', 'max:254'],
           'max_use' => ['required', 'string', 'max:254'],
           'quantity' => ['required', 'string', 'max:254'],
           'start_date' => ['required', 'date'],
           'end_date' => ['required', 'date'],
           'discount_type' => ['required', 'string', 'max:254'],
           'status' => ['boolean'],

       ]);

       $coupon = new Coupon();
       $coupon->coupon_name = $request->coupon_name ; 
       $coupon->coupon_code =$request->coupon_code ;
       $coupon->max_use =  $request->max_use ;
       $coupon->quantity = $request->quantity ;
       $coupon->start_date = $request->quantity ;
       $coupon->end_date =$request->start_date ;
       $coupon->discount_type =$request->end_date ;
       $coupon->discount_value =$request->discount_type ;
       $coupon->total_used = 0;
       $coupon->status = $request->status;
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
