<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::whereNull('category_id')->orderBy('name', 'asc')->get();
        return view('admin.category.create', compact('category'));
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
        return redirect()->route('admin.category.index')->with('message', 'Categoría creada exitosamente.');
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
    public function edit($id)
    {
        $category = Category::find($id);
        $fathercategories = Category::whereNull('category_id')->orderBy('name', 'asc')->get();
        return view('admin.category.edit', compact('category', 'fathercategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $request->validate([
            'category_id' => 'nullable',
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);
        $category->category_id = $request->category_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index')->with('message', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
