<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class CustomViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('CustomView.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($CustomViewId = null)
    {
        return view('CustomView.create', compact('CustomViewId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Section::find($id)->company_id;
        $allSections = Section::where('company_id', $company)->get();

        $sectionId = Section::where('id', $id)->first()->id;
        $section = Section::where('id', $sectionId)->with(['SectionComponent' => function ($ivcom) use ($sectionId) {
            $ivcom->with(['Component_View' => function ($com) use ($sectionId) {
                $com->with(['ComponentViewData' => function ($data) use ($sectionId) {
                    $data->where('company_id', $sectionId); // Cambia 'company_id' a 'component_id'
                }]);
            }])->orderBy('order', 'asc');
        }])->first();
        return view('CustomView.show', compact('section', 'allSections'));
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
