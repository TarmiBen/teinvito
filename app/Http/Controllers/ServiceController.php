<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class ServiceController extends Controller
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
        
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        $companies = Company::whereHas('UserProvider', function ($query) use ($user) {
            $query->where('users_id', $user->id);
        })->get();
        if ($companies->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de crear servicios y no tiene ninguna compañia asociada');
        }
        return view('admin.services.create', compact('categories', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'company_id' => 'required',
            'description_large' => 'required',
            'description_small' => 'required',
            'img_src' => 'required',
            'keywords' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear un servicio pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $service = new Service();
        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->company_id = $request->company_id;
        $service->description_large = $request->description_large;
        $service->description_small = $request->description_small;
        $service->img_src = $request->img_src;
        $service->keywords = $request->keywords;
        $imgName = ImageHelper::uploadAndResizeImage(
            $request->file('img_src'),
            'service',
            1080,
            1080
        );
        if ($imgName) {
            $service->img_src = $imgName;
        }
        $service->save();
        return redirect()->route('admin.services.index')
            ->with('message', 'El servicio se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        $user = Auth::user();
        $categories = Category::all();
        $companies = Company::whereHas('UserProvider', function ($query) use ($user) {
            $query->where('users_id', $user->id);
        })->get();
        if ($companies->isEmpty()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' entró a la vista de actualizar servicios y no tiene ninguna compañia asociada');
        }
        return view('admin.services.edit', compact('service', 'categories', 'companies'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'company_id' => 'required',
            'description_large' => 'required',
            'description_small' => 'required',
            'img_src' => 'required',
            'keywords' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar un servicio pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->company_id = $request->company_id;
        $service->description_large = $request->description_large;
        $service->description_small = $request->description_small;
        $service->img_src = $request->img_src;
        $service->keywords = $request->keywords;
        $imgName = ImageHelper::uploadAndResizeImage(
            $request->file('img_src'),
            'service',
            1080,
            1080
        );
        if ($imgName) {
            $service->img_src = $imgName;
        }
        $service->save();

        return redirect()->route('services.index')
            ->with('message', 'El servicio se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
