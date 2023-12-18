<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use App\Models\UserProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminContactController extends Controller
{
    public function create(Request $request)
    {
        $company_id  = $request->input('company_id');
        $companies = Company::all();
        $selectedCompany = null;
        if ($company_id ) {
            $selectedCompany = Company::find($company_id );
        }
        return view('admin.contacts.create', compact('companies', 'selectedCompany'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:contacts,email|email|max:255',
            'phone' => 'required|numeric',
            'telephone' => 'nullable|required_with:phone',
            'company_id' => 'required',
        ]);

        $contact = new contact();
        $contact->company_id = $request->company_id;
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->telephone = $request->telephone;
        $contact->save();
        return redirect()->route('admin.companies.show')
        ->with('message','El contacto se ha agregado correctamente a la empresa.');
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $companies = Company::all();
        return view('admin.contacts.edit', compact('contact', 'companies'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'telephone' => 'nullable|required_with:phone',
            'company_id' => 'required',
        ]);
        $contact->company_id = $request->company_id;
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->telephone = $request->telephone;
        $contact->save();
        return redirect()->route('admin.companies.index')
        ->with('message','El contacto se ha actualizado correctamente a la empresa.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.companies.index')->with('message', 'El contacto se eliminó correctamente. <a href="' . route('admin.companies.restore', $contact->id) . '">Restore</a>');
    }

    public function restore($id)
    {
        $contact = Contact::withTrashed()->find($id);
        $contact->restore();
        return redirect()->route('admin.companies.index')->with('message', 'El contacto se restauró correctamente');
    }
}
