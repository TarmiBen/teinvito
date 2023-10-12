<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('/category/category', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::whereNull('category_id')->orderBy('name', 'asc')->get();    
        
        return view('/category/category-add',compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'category_id' => 'nullable',
            'name' => 'required|unique:categories',            
        ]);

        $category = new Category();
        $category->category_id = $request->input('category_id');
        $category->name = $request->input('name');                     
        $category->save();
        return redirect()->route('category');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        $category->CategoryParent;
        $category->CategoryChild;
        return view('/category/category-show', compact('category'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $fathercategories = Category::whereNull('category_id')->orderBy('name', 'asc')->get();   
        return view('/category/category-edit', compact('category','fathercategories'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $category = Category::find($id);
        $request->validate([           
            'category_id' => 'nullable',
            'name' => 'required|unique:categories,name,'.$category->id,            
        ]);     
        $category->category_id = $request->input('category_id');
        $category->name = $request->input('name');               
        $category->save();
        return redirect()->route('category');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $category ->delete();

        return redirect("/category");
    }
    
}
