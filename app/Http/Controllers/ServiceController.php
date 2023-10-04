<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'company_id' => 'required',
            'description_large' => 'required',
            'description_small' => 'required',
            'img_src' => 'required',
            'keywords' => 'required',
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->company_id = $request->company_id;
        $service->description_large = $request->description_large;
        $service->description_small = $request->description_small;
        $service->img_src = $request->img_src;
        $service->keywords = $request->keywords;
        $service->save();

        return redirect()->route('services.index')
            ->with('message', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'company_id' => 'required',
            'description_large' => 'required',
            'description_small' => 'required',
            'img_src' => 'required',
            'keywords' => 'required',
        ]);

        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->company_id = $request->company_id;
        $service->description_large = $request->description_large;
        $service->description_small = $request->description_small;
        $service->img_src = $request->img_src;
        $service->keywords = $request->keywords;
        if ($request->file('img_src')) {
            $service->img_src = $request->file('img_src')->store('public');
        }
        $service->save();

        return redirect()->route('services.index')
            ->with('message', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
