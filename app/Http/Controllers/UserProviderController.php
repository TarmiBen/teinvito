<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProvider;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserProviderAccessNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserProviderController extends Controller
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
        $validator = Validator::make($request->all(), [
            'users_id',
            'company_id',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear un UserProvider pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
        ->with('message', 'El usuario se ha agregado correctamente a la empresa.');
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
        $validator = Validator::make($request->all(), [
            'users_id',
            'company_id',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar un UserProvider pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $userProvider->users_id = $request->usersId;
        $userProvider->company_id = $request->companyId;
        $userProvider->save();
        return redirect()->route('admin.userProviders.index')
            ->with('message','El usuario se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userProvider $userProvider)
    {
        $userProvider->delete();
        return redirect()->route('admin.userProviders.index')
            ->with('message','El usuario fue eliminado correctamente <a href="'.route('admin.userProviders.restore',$userProvider->id).'">Restore</a>');
    }

    public function restore(string $id)
    {
        $userProvider = userProvider::withTrashed()->find($id)->restore();
        return redirect()->route('admin.userProviders.index')
            ->with('message','El usuario fue restaurado correctamente');
    }

    public function autocompleteUser(Request $request)
    {
        $query = $request->get('q');
        $data = User::where('name', 'LIKE', '%'.$request->get('q').'%')
            ->orWhere('email', 'LIKE', '%'.$request->get('q').'%')
            ->orWhere('id', 'LIKE', '%'.$request->get('q').'%')
            ->select('name', 'id', 'email')
            ->get();

        if(count($data) > 0){
            return response()->json($data);
        }else{
            $value ='No se encontraron resultados';
            return $value;
        }
    }

    public function autocompleteCompany(Request $request)
    {
        $user = Auth::user()->id;
        $query = $request->get('q');
        $data = Company::whereHas('UserProvider', function ($query) use ($user) {
            $query->where('users_id', $user);
        })
        ->where(function ($query) use ($request) {
            $query->where("name", "LIKE", '%'.$request->get('q').'%')
                ->orWhere("id", "LIKE", '%'.$request->get('q').'%');
        })
        ->select("name", "id")
        ->get();
    
        return response()->json($data);
    }
}
