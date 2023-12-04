<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Address;
use App\Models\UserProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Storage::disk('public')->exists('companies/logos/test.webp')) {
            echo 'existe';
        }

        //return view('admin.companies.index');
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
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required', //|unique:company,email|email|max:255',
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
            'rfc' => 'required|string|max:255',
            'street' => 'nullable',
            'address_name' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street', // El campo state puede ser nulo
            'int' => 'nullable',
            'ext' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'cp' => 'nullable|required_with:street',
        ]);
        $imgName = ImageHelper::uploadAndResizeImage(
            $request->file('logo'),
            'companies/logos',
            400,
            400
        );
        $imgNameCover = ImageHelper::uploadAndResizeImage(
            $request->file('cover'),
            'companies/covers',
            851,
            315
        );
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear una compañia pero fallo en el dato: ' . $validator->errors()->first());

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
        $userProvider = new UserProvider();
        $userProvider->users_id = auth()->user()->id;
        $userProvider->company_id = $company->id;
        $userProvider->save();
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
    public function show(Company $company)
    {
        $principalAddress = Address::where('company_id', $company->id)->where('priority', 1)->first();
        $contacts = Contact::where('company_id', $company->id)->get();
        $addresses = Address::where('company_id', $company->id)->get();

        return view('admin.companies.show',compact('company', 'contacts', 'addresses', 'principalAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:companies,email,'.$company->id,
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'street' => 'nullable',
            'address_name' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street', // El campo state puede ser nulo
            'int' => 'nullable',
            'ext' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'cp' => 'nullable|required_with:street',
        ]);
        if ($request->hasFile('logo')) {
            $imgName = ImageHelper::uploadAndResizeImage(
                $request->file('logo'),
                'companies/logos',
                400,
                400
            );
            $company->logo = $imgName;
        }
        if ($request->hasFile('cover')) {
            $imgNameCover = ImageHelper::uploadAndResizeImage(
                $request->file('cover'),
                'companies/covers',
                851,
                315
            );
            $company->cover = $imgNameCover;
        }
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar una compañia pero fallo en el dato: ' . $validator->errors()->first());

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $company->phone = $request->phone;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->description = $request->description;
        // $company->logo = $imgName;
        // $company->cover = $imgNameCover;
        $company->rfc = $request->rfc;
        $company->save();
        return redirect()->route('admin.companies.index')
            ->with('message','Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
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
        $company = Company::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.companies.index')
            ->with('message','Company restored successfully.');
    }
}
