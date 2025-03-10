<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //  dd($request->all());
        $request->validate([
            'category_icon' => ['required', 'not_in:empty'],
            'category_name' => ['required', 'max:254', 'unique:categories,category_name'],
            'category_status' => ['required', 'boolean'],
        ]);

        $category = new Category();
        $category->category_icon = $request->category_icon;
        $category->category_name = $request->category_name;
        $category->category_status = $request->category_status;
        $category->category_slug = Str::slug($request->category_name);
        $category->save();
        toastr()->success('Stored Successfully!');
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
    {   $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_icon' => ['required', 'not_in:empty'],
            'category_name' => ['required', 'max:254', 'unique:categories,category_name,'.$id],
            'category_status' => ['required', 'boolean'],
        ]);

        $category = Category::findOrFail($id);
        $category->category_icon = $request->category_icon;
        $category->category_name = $request->category_name;
        $category->category_status = $request->category_status;
        $category->category_slug = Str::slug($request->category_name);
        $category->save();
        toastr()->success('Updated Successfully!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $category = Category::findOrFail($id);
        $subCategoryCount = SubCategory::where('category_id', $category->id)->count();
        $subCategoryNames = SubCategory::where('category_id', $category->id)->pluck('sub_category_name')->toArray();

        if ($subCategoryCount > 0) {
            $subCategoryNamesString = implode(', ', $subCategoryNames);
            $message = "First delete the following subcategories: $subCategoryNamesString, then try deleting the category.";
            return response(['status' => 'error', 'message' => $message]);
        }

        $category->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function UpdateStatus(Request $request){

        $category = Category::findOrFail($request->id);
        $category->category_status = $request->category_status == "true" ? 1 : 0;
        $category->save();
        return response(['message' => 'Status Changed Successfully!'], 200);
    }

    
}
