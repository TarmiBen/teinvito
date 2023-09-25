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
        $categoria = Category::all();
        //return view('category.index', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria=Category::all();        
        
        //return view('category.create',compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'category_id' => 'required',
            'name' => 'required',            
        ]);

        $categoria = new Category();
        $categoria->category_id = $request->input('category_id');
        $categoria->name = $request->input('name');               
        $animal->save();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Category::find($id);
        $categoria->CategoryParent;
        $categoria->CategoryChild;
        return view('category.show', compact('category'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('category.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([           
            'category_id' => 'required',
            'name' => 'required',            
        ]);

        $categoria = new Category();
        $categoria->category_id = $request->input('category_id');
        $categoria->name = $request->input('name');               
        $animal->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria)
    {
        $categoria = Category::find($categoria->id);
        $categoria->delete();

        //return redirect("animal");
    }
}
