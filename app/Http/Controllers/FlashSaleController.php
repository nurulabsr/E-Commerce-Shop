<?php

namespace App\Http\Controllers;

use App\DataTables\FlashSellItemDataTable;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FlashSellItemDataTable $dataTable)
    {   $flashSell = FlashSell::first();
        $products = Product::where('product_status', 1)->get();
        return $dataTable->render('admin.flashSell.index', compact('flashSell', 'products'));
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
            'flashsell_end_date' => ['required', 'date']
        ]);
    
        $flashSell = FlashSell::firstOrCreate(
            [], 
            ['end_date' => $request->flashsell_end_date] 
        );
        if ($flashSell->wasRecentlyCreated) {
            toastr()->success("Data Added Successfully!");
        } else {
            toastr()->success("Data Updated Successfully!");
        }
    
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */

    public function FlashSellProduct(Request $request){
       $request->validate([
           'product' => ['required', 'string', 'max:254'],
           'status' => ['required', 'boolean'],
           'home_page' => ['required', 'boolean']
       ]);

       $flashSellItem = new FlashSellItem();
       $flashSell = FlashSell::first();
       $flashSellItem->product_id = $request->product;
       $flashSellItem->show_at_home_page = $request->home_page;
       $flashSellItem->status = $request->status;
       $flashSellItem->flash_sell_end_date = $flashSell->end_date;
       $flashSellItem->save();
       toastr()->success("FlashSell Product added successfully!");
       return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flashSellItem = FlashSellItem::findOrFail($id);
        $flashSellItem->delete();
        return response(['status' => 'success', 'message'=> 'Deleted Successfully!']);

    }
}
