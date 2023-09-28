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
        $categorias = Category::all();
        return view('/category/category', compact('categorias'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria=Category::whereNull('category_id')->get();       
        
        return view('/category/category-add',compact('categoria'));
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

        $categoria = new Category();
        $categoria->category_id = $request->input('category_id');
        $categoria->name = $request->input('name');                     
        $categoria->save();
        return redirect()->route('category')->with('add', 'ok');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Category::find($id);
        $categoria->CategoryParent;
        $categoria->CategoryChild;
        return view('/category/category-show', compact('categoria'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Category::find($id);        

        $fathercategorias = Category::whereNull('category_id')->get();
       
        return view('/category/category-edit', compact('categoria','fathercategorias'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $categoria = Category::find($id);
        $request->validate([           
            'category_id' => 'nullable',
            'name' => 'required|unique:categories,name,'.$categoria->id,            
        ]);
       
        $categoria->category_id = $request->input('category_id');
        $categoria->name = $request->input('name');               
        $categoria->save();
        return redirect()->route('category')->with('edit', 'ok');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria)
    {
        
        $categoria->delete();

        return redirect("/category")->with('delete', 'ok');
    }
}
