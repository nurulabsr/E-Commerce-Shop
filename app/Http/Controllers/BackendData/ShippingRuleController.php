<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ShippingRuleDataTable;
use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use Illuminate\Http\Request;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShippingRuleDataTable $dataTable)
    {
        return $dataTable->render('admin.shipping-rule.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shipping-rule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rule_name' => ['required', 'string', 'max:255'],
            'shipping_type' => ['required', 'string', 'max:20'],
            'min_amount' => ['required', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required', 'boolean'],

        ]);

        $shipping_rule = new ShippingRule();
        $shipping_rule->rule_name = $request->rule_name;
        $shipping_rule->shipping_type = $request->shipping_type;
        $shipping_rule->min_amount = $request->min_amount;
        $shipping_rule->cost = $request->cost;
        $shipping_rule->status = $request->status;
        $shipping_rule->save();
        toastr()->success('Shipping Rule Added Successfully!');
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
        $shipping_rule = ShippingRule::findOrFail($id);
        return view('admin.shipping-rule.update', compact('shipping_rule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rule_name' => ['required', 'string', 'max:255'],
            'shipping_type' => ['required', 'string', 'max:20'],
            'min_amount' => ['required', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required', 'boolean'],

        ]);

        $shipping_rule = ShippingRule::findOrFail($id);
        $shipping_rule->rule_name = $request->rule_name;
        $shipping_rule->shipping_type = $request->shipping_type;
        $shipping_rule->min_amount = $request->min_amount;
        $shipping_rule->cost = $request->cost;
        $shipping_rule->status = $request->status;
        $shipping_rule->save();
        toastr()->success('Shipping Rule Updated Successfully!');
        return redirect()->back();  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping_rule = ShippingRule::findOrFail($id);
        $shipping_rule->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);   

    }

    public function changeShippingStatus(Request $request){
        $shipping_rule = ShippingRule::findOrFail($request->id);
        $shipping_rule->status = $request->status == 'true' ? 1 : 0;
        $shipping_rule->save();
        return response(['message' => 'Status Changed Successfully!']);

    }
}
