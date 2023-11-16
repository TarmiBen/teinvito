<?php

namespace App\Http\Controllers;

use App\Models\UserProvider;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $company_id  = $request->input('company_id');
        $UserProviders = UserProvider::where('users_id', auth()->user()->id)->get();
        if ($UserProviders->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de crear contacto y no tiene ninguna compañia asociada');
        }
        $selectedCompany = null;
        if ($company_id ) {
            $selectedCompany = Company::find($company_id );
        }
        return view('admin.contacts.create', compact('UserProviders', 'selectedCompany'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:contacts,email|email|max:255',
            'phone' => 'required',
            'telephone' => 'nullable|required_with:phone',
            'company_id' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear un contacto pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $contact = new contact();
        $contact->company_id = $request->company_id;
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->telephone = $request->telephone;
        $contact->save();
        return redirect()->route('admin.companies.index')
        ->with('message','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        return view('admin.contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        $UserProviders = UserProvider::where('users_id', auth()->user()->id)->get();
        if ($UserProviders->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de actualizar contacto y no tiene ninguna compañia asociada');
        }
        return view('admin.contacts.edit',compact('contact', 'UserProviders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'name' => 'required|unique:categories,name,'.$contact->id,
            'phone' => 'required',
            'telephone' => 'nullable|required_with:phone',
            'company_id' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar un contacto pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $contact->company_id = $request->company_id;
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->telephone = $request->telephone;
        $contact->save();
        return redirect()->route('admin.companies.index')
            ->with('message','Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('message', 'Contact deleted successfully. <a href="' . route('admin.contacts.restore', $contact->id) . '">Restore</a>');
    
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.contacts.index')
            ->with('message','Contact restored successfully.');
    }
}
