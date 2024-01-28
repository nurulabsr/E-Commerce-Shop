<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
         return $dataTable->render('admin.category.SubCategory.ChildCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.category.SubCategory.ChildCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'category_name'       => ['required', 'string', 'max:254',],
            'sub_category_name'   => ['required', 'string', 'max:254'],
            'child_category_name' => ['required', 'string', 'max:254', 'unique:child_categories,child_category_name'],
            'sub_category_status' => ['required', 'boolean'],
       ]);

       $childCategory = new ChildCategory();
       $childCategory->child_category_name = $request->child_category_name;
       $childCategory->child_category_slug = Str::slug($request->child_category_name);
       $childCategory->child_category_status = $request->sub_category_status;
       $childCategory->category_id = $request->category_id;
       $childCategory->sub_category_id = $request->sub_category_id;
       $childCategory->save();
       toastr()->success("Child Category Data Added Successfully!");
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
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();  //$childCategory->category_id
        return view('admin.category.SubCategory.ChildCategory.update', compact('categories', 'subCategories', 'childCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $request->validate([
            'category_id'       => ['required', 'string', 'max:254',],
            'sub_category_id'   => ['required', 'string', 'max:254'],
            'child_category_name' => ['required', 'string', 'max:254', 'unique:child_categories,child_category_name,'.$id],
            'child_category_status' => ['required', 'boolean'],
       ]);

       $childCategory = ChildCategory::findOrFail($id);
       $childCategory->child_category_name = $request->child_category_name;
       $childCategory->child_category_slug = Str::slug($request->child_category_name);
       $childCategory->child_category_status = $request->child_category_status;
       $childCategory->category_id = $request->category_id;
       $childCategory->sub_category_id = $request->sub_category_id;
       $childCategory->save();
       toastr()->success("Child Category Data Updated Successfully!");
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->delete();
    }

    //Get Child Category 
    public function GetSubCategories(Request $request){
        //  return $request;

        $subCategories = SubCategory::where('category_id', $request->id)->where('sub_category_status', 1)->get();
        return $subCategories;
    }
}
