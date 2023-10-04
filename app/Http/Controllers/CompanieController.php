<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\Contact;
use App\Models\Address;
use App\Models\UserProvider;

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
            'email' => 'required', //|unique:company,email|email|max:255',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=400,min_height=400,max_width=400,max_height=400|max:2048',
            'cover' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
                function ($attribute, $value, $fail) {
                    // Verificar las dimensiones de la imagen
                    [$width, $height] = getimagesize($value);
        
                    // Comprobar si las dimensiones coinciden con las permitidas
                    if ($width != 851 || $height != 315) {
                        if ($width != 1200 || $height != 628) {
                            $fail('La imagen de portada debe tener dimensiones de 851x315 o 1200x628.');
                        }
                    }
                },
            ],
            'rfc' => 'required|string|max:255',
            'street' => 'nullable',
            'address_name' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street', // El campo state puede ser nulo
            'int' => 'nullable|required_with:street',
            'ext' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'cp' => 'nullable|required_with:street',
        ]);
        $company = new company();
        $company->phone = $request->phone;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->description = $request->description;
        $company->logo = $request->logo;
        $company->cover = $request->cover;
        $company->rfc = $request->rfc;
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '-' . $logo->getClientOriginalName(); // Genera un nombre único
            $logo->move(public_path('media/companies/logos'), $logoName);
            $company->logo = 'media/companies/logos/' . $logoName;
        } elseif ($request->file('logo') == null) {
            $company->logo = null;
        }  
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '-' . $cover->getClientOriginalName(); // Genera un nombre único
            $cover->move(public_path('media/companies/covers'), $coverName);
            $company->cover = 'media/companies/covers/' . $coverName;
        } elseif ($request->file('cover') == null) {
            $company->cover = null;
        }
        $company->save();
        // $userProvider = new UserProvider();
        // $userProvider->users_id = auth()->user()->id;
        // $userProvider->company_id = $company->id;
        // $userProvider->save();
        if ($request->address_name == null) {
            return redirect()->route('admin.companies.index')
            ->with('message','Company created successfully.');
        }else{
            $address = new Address();
            $address->company_id = $company->id;
            $address->priority = 1;
            $address->name = $request->address_name;
            $address->street = $request->street;
            $address->int = $request->int;
            $address->ext = $request->ext;
            $address->colony = $request->colony;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->cp = $request->cp;
            $address->save();
        }
        return redirect()->route('admin.companies.index')
            ->with('message','Company created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        $principalAddress = Address::where('company_id', $company->id)->where('priority', 1)->first();
        $contacts = Contact::where('company_id', $company->id)->get();
        $addresses = Address::where('company_id', $company->id)->get();
        return view('admin.companies.show',compact('company', 'contacts', 'addresses', 'principalAddress'));
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
            'street' => 'nullable',
            'address_name' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street', // El campo state puede ser nulo
            'int' => 'nullable|required_with:street',
            'ext' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'cp' => 'nullable|required_with:street',
        ]);
        $company->phone = $request->phone;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->description = $request->description;
        $company->rfc = $request->rfc;
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '-' . $logo->getClientOriginalName(); // Genera un nombre único
            $logo->move(public_path('media/companies/logos'), $logoName);
            $company->logo = 'media/companies/logos/' . $logoName;
        } elseif ($request->file('logo') == null) {
            $company->logo = null;
        }
        
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '-' . $cover->getClientOriginalName(); // Genera un nombre único
            $cover->move(public_path('media/companies/covers'), $coverName);
            $company->cover = 'media/companies/covers/' . $coverName;
        } elseif ($request->file('cover') == null) {
            $company->cover = null;
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
