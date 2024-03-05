<?php

namespace App\Http\Controllers;

use App\DataTables\FlashSellItemDataTable;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FlashSellItemDataTable $dataTable)
    {
        return $dataTable->render('admin.flashSell.index');
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
    {   $request->validate([
          'flashsell_end_date' => ['required', 'date']
       ]);
        $flashsell_end_date = new FlashSell();
        $flashsell_end_date->end_date = $request->flashsell_end_date;
        $flashsell_end_date->save();
        toastr()->success("Added Successfully!");
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
