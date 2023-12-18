<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Company;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminAddressController extends Controller
{
    public function index()
    {
        return view('admin.addresses.index');
    }

    public function create()
    {
        $companies = Company::all();
        return view('admin.addresses.create', compact('companies'));
    }

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

    public function show(Address $address)
    {
        return view('admin.addresses.show',compact('address'));
    }

    public function edit(Address $address)
    {
        return view('admin.addresses.edit',compact('address'));
    }

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

        return redirect()->route('admin.addresses.index')->with('message', 'La dirección se actualizó correctamente');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('admin.addresses.index')->with('message', 'La dirección se eliminó correctamente. <a href="' . route('admin.addresses.restore', $address->id) . '">Restore</a>');
    }

    public function restore($id)
    {
        $address = Address::onlyTrashed()->where('id', $id)->firstOrFail();
        $address->restore();
        return redirect()->route('admin.addresses.index')->with('message', 'La dirección se restauró correctamente');
    }
}
