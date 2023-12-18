<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ImageHelper;


class AdminCompanieController extends Controller
{
    public function index()
    {
        return view('admin.companies.index');
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|unique:companies,email|email|max:255',
            'description' => 'required',
            'logo' =>[
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'cover' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'rfc' => 'nullable|string|max:255',
            'street' => 'nullable|required_with:address_name',
            'address_name' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:address_name', // El campo state puede ser nulo
            'int' => 'nullable',
            'ext' => 'nullable|required_with:colony',
            'colony' => 'nullable|required_with:ext',
            'city' => 'nullable|required_with:cp',
            'cp' => 'nullable|required_with:city',
        ]);

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            dd($validator->errors());
        }
        $imgName = ImageHelper::uploadAndResizeImage($request->file('logo'), 
        'companies/logos',
        400,
        400);
        $imgNameCover = ImageHelper::uploadAndResizeImage(
            $request->file('cover'),
            'companies/covers',
            851,
            315
        );
        if($validator->fails()){
            Log::channel('controller')->info('El usuario con id:'.auth()->user()->id.' intentó crear una compañia con los siguientes datos:'.json_encode($request->all()).' pero hubo un error en la validación');

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = new Company();
        $company->phone = $request->phone;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->description = $request->description;
        $company->logo = $imgName;
        $company->cover = $imgNameCover;
        $company->rfc = $request->rfc;
        $company->save();
        if($request->address_name == null) {
            return redirect()->route('admin.companies.index')
            ->with('message', 'La compañia se creó correctamente');
        }else{
            $address = new Address();
            $address->company_id = $company->id;
            $address->address_name = $request->address_name;
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
            ->with('message', 'La compañia se creó correctamente');
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return redirect()->route('admin.companies.index')->with('message', 'La compañia se actualizó correctamente');
    }

    public function show(Company $company)
    {
        $principalAddress = Address::where('company_id', $company->id)->where('priority', 1)->first();
        $addresses = Address::where('company_id', $company->id)->get();
        $contacts = Contact::where('company_id', $company->id)->get();

        return view('admin.companies.show', compact('company', 'principalAddress', 'addresses', 'contacts'));
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index')->with('message', 'La compañia se eliminó correctamente. <a href="' . route('admin.companies.restore', $company->id) . '">Restore</a>');
    }

    public function restore($id)
    {
        $company = Company::withTrashed()->where('id', $id)->first();
        $company->restore();
        return redirect()->route('admin.companies.index')->with('message', 'La compañia se restauró correctamente');
    }
}
