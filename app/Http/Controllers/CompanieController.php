<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\Contact;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|unique:company,email|email|max:255',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rfc' => 'required|string|max:255',
            'state' => 'nullable', // El campo state puede ser nulo
            'street' => 'nullable|required_with:state',
            'int' => 'nullable|required_with:state',
            'ext' => 'nullable|required_with:state',
            'colony' => 'nullable|required_with:state',
            'city' => 'nullable|required_with:state',
            'cp' => 'nullable|required_with:state',
        ]);
        $company = new company();
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $logoName);
            $request->logo = $logoName;
        }elseif($request->file('logo') == null){
            $request->logo = null;
        }
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $coverName = time().'.'.$cover->getClientOriginalExtension();
            $cover->move(public_path('images'), $coverName);
            $request->cover = $coverName;
        }elseif($request->file('cover') == null){
            $request->cover = null;
        }
        company::create($request->all());
        return redirect()->route('admin.companies.index')
            ->with('message','Company created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        $contacts = Contact::where('company_id', $company->id)->get();
        return view('admin.companies.show',compact('company', 'contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        return view('admin.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:company,email,'.$company->id,
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rfc' => 'required|string|max:255',
            'state' => 'nullable', // El campo state puede ser nulo
            'street' => 'nullable|required_with:state',
            'int' => 'nullable|required_with:state',
            'ext' => 'nullable|required_with:state',
            'colony' => 'nullable|required_with:state',
            'city' => 'nullable|required_with:state',
            'cp' => 'nullable|required_with:state',
        ]);
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'media/companies/logos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $filename);
            $company->logo = $destinationPath . $filename; // Asigna la ruta completa al campo logo
        } elseif ($request->file('logo') == null) {
            $company->logo = null; // Asegúrate de asignar null si no se carga una nueva imagen
        }
        $company->save();
        return redirect()->route('admin.companies.index')
            ->with('message','Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index')
            ->with('message','Company deleted successfully <a href="'.route('admin.companies.restore',$company->id).'">Restore</a>');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $company = company::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.companies.index')
            ->with('message','Company restored successfully.');
    }
}
