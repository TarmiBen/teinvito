<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProvider;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserProviderAccessNotification;

class UserProviderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.userProviders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userProviders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'users_id',
            'company_id',
        ]);
        $userProvider = new userProvider();
        $userProvider->users_id = $request->usersId;
        $userProvider->company_id = $request->companyId;
        // $userProvider->save();
        $usersInCompany = UserProvider::where('company_id', $userProvider->company_id)
        ->pluck('users_id')
        ->toArray();
    // Enviar notificaciones a los usuarios de la misma empresa
        Notification::send(User::whereIn('id', $usersInCompany)->get(), new UserProviderAccessNotification());

    return redirect()->route('admin.userProviders.index')
        ->with('message', 'UserProvider creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(userProvider $userProvider)
    {
        return view('admin.userProviders.show',compact('userProvider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userProvider $userProvider)
    {
        return view('admin.userProviders.edit',compact('userProvider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userProvider $userProvider)
    {
        $request->validate([
            'users_id',
            'company_id',
        ]);
        $userProvider->users_id = $request->usersId;
        $userProvider->company_id = $request->companyId;
        $userProvider->save();
        return redirect()->route('admin.userProviders.index')
            ->with('message','UserProvider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userProvider $userProvider)
    {
        $userProvider->delete();
        return redirect()->route('admin.userProviders.index')
            ->with('message','UserProvider deleted successfully <a href="'.route('admin.userProviders.restore',$userProvider->id).'">Restore</a>');
    }

    public function restore(string $id)
    {
        $userProvider = userProvider::withTrashed()->find($id)->restore();
        return redirect()->route('admin.userProviders.index')
            ->with('message','UserProvider restored successfully.');
    }

    public function autocompleteUser(Request $request)
    {
        $data = User::select("name", "id", "email")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->orWhere("id","LIKE","%{$request->input('query')}%")
                ->orWhere("email","LIKE","%{$request->input('query')}%")
                ->get();
   
        return response()->json($data);
    }

    public function autocompleteCompany(Request $request)
    {
        $user = Auth::user()->id;
        $data = Company::
        whereHas('UserProvider', function ($query) use ($user) {
            $query->where('users_id', $user);
        })
        ->where(function ($query) use ($request) {
            $query->where("name", "LIKE", "%{$request->input('query')}%")
                ->orWhere("id", "LIKE", "%{$request->input('query')}%");
        })
        ->select("name", "id")
        ->get();
    
        return response()->json($data);
    }
}
