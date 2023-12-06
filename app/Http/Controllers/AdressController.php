<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Company;
use App\Models\UserProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.addresses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $company_id  = $request->input('company_id');
        $UserProviders = UserProvider::where('users_id', auth()->user()->id)->get();
        if ($UserProviders->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de crear direcciones y no tiene ningún proveedor asociado');
        }
        $selectedAddress = null;
        if ($company_id ) {
            $selectedAddress = Company::find($company_id );
        }
        return view('admin.addresses.create', compact('UserProviders', 'selectedAddress'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'name' => 'required',
            'street' => 'required',
            'int' => 'nullable',
            'ext' => 'nullable|required_with:street',
            'cp' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street',
        ]);

        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear una dirección pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $adress = new Address();
        $adress->company_id = $request->company_id;
        $adress->priority = 0;
        $adress->name = $request->name;
        $adress->street = $request->street;
        $adress->int = $request->int;
        $adress->ext = $request->ext;
        $adress->cp = $request->cp;
        $adress->colony = $request->colony;
        $adress->city = $request->city;
        $adress->state = $request->state;
        $adress->save();

        return redirect()->route('admin.addresses.index')->with('message','La dirección se ha agregado correctamente a la empresa.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('admin.addresses.show',compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        $UserProviders = UserProvider::where('users_id', auth()->user()->id)->get();
        if ($UserProviders->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de actualizar direcciones y no tiene ningún proveedor asociado');
        }
        return view('admin.addresses.edit',compact('address', 'UserProviders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'name' => 'required',
            'street' => 'required',
            'int' => 'nullable',
            'ext' => 'nullable',
            'cp' => 'nullable|required_with:street',
            'colony' => 'nullable|required_with:street',
            'city' => 'nullable|required_with:street',
            'state' => 'nullable|required_with:street',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar una dirección pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $address->company_id = $request->company_id;
        $address->priority = 0;
        $address->name = $request->name;
        $address->street = $request->street;
        $address->int = $request->int;
        $address->ext = $request->ext;
        $address->cp = $request->cp;
        $address->colony = $request->colony;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->save();

        return redirect()->route('admin.addresses.index')->with('message','La dirección se ha actualizado correctamente a la empresa.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('admin.addresses.index')->with('message','La direccion fue eliminada correctamente. <a href="'.route('admin.addresses.restore', $address->id).'">Restore</a>');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $address = Address::onlyTrashed()->where('id', $id)->firstOrFail();
        $address->restore();
        return redirect()->route('admin.addresses.index')->with('message','La direccion fue restaurada correctamente');
    }
}
