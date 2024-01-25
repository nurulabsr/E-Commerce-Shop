<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable  $dataTable){
       
        return $dataTable->render('admin.category.SubCategory.index');
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create(){   
        $categories = Category::all(); 
        return view('admin.category.SubCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
         $request->validate([
             'category_name' => ['required', 'max:254'],
             'sub_category_name' => ['required', 'max:254', 'unique:sub_categories,sub_category_name'],
             'sub_category_status' => ['required', 'boolean'],
             
         ]);

         $subCategory = new SubCategory();
         $subCategory->sub_category_name = $request->sub_category_name;
         $subCategory->sub_category_slug = Str::slug($request->sub_category_name);
         $subCategory->sub_category_status = $request->sub_category_status;
         $subCategory->category_id = $request->category_name;
         $subCategory->save();
         toastr()->success("Created Successfully!");
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
        return view('admin.category.SubCategory.update');
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
