<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;



class CustomViewController extends Controller
{
    public function index()
    {
        return view('admin.provider.index');
    }
    public function create($CustomViewId = null)
    {
        return view('admin.provider.create', compact('CustomViewId'));
    }


    public function show($id)
    {
        $company = Section::find($id)->company_id;
        $allSections = Section::where('company_id', $company)->get();

        $sectionId = Section::where('id', $id)->first()->id;
        $section = Section::where('id', $sectionId)->with(['SectionComponent' => function ($ivcom) use ($sectionId) {

            $ivcom->with(['ComponentProvider' => function ($com) use ($sectionId) {
                $com->with(['ComponentDataProvider' => function ($data) use ($sectionId) {

                    $data->where('company_id', $sectionId); // Cambia 'company_id' a 'component_id'
                }]);
            }])->orderBy('order', 'asc');
        }])->first();


        return view('admin.provider.show', compact('section', 'allSections'));

    }
}
