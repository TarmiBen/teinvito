<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ServicePackage;
use App\Models\Galery;
use App\Models\Service;
use App\Helpers\ImageHelper;

class ServicePackageCreate extends Component
{
    use WithFileUploads;
    public $service_id;
    public $name;
    public $description;
    public $price;
    public $service_package_id;
    public $src = [];
    public $tittle = [];
    public $text = [];
    public $servicePackageId;
    public $imageFields = [];

    // protected $rules = [
    //     'name' => 'required',
    //     'description' => 'required',
    //     'price' => 'required',
    //     'src.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     'tittle' => 'required',
    //     'text' => 'required',
    // ];

    public function render()
    {
        $services = Service::whereHas('Company', function ($query) {
            $query->whereHas('UserProvider', function ($query) {
                $query->where('users_id', auth()->user()->id);
            });
        })->get();
        $servicePackages = ServicePackage::all();
        return view('livewire.service-package-create', compact('services', 'servicePackages'));
    }

    public function mount($servicePackageId = null)
    {
        if ($servicePackageId) {
            $servicePackage = ServicePackage::find($servicePackageId);
            if ($servicePackage) {
                $this->service_id = $servicePackage->service_id;
                $this->name = $servicePackage->name;
                $this->description = $servicePackage->description;
                $this->price = $servicePackage->price;

                $galleryItems = $servicePackage->Galery;
                foreach ($galleryItems as $item) {
                    $this->src[] = $item->src;
                    $this->tittle[] = $item->tittle;
                    $this->text[] = $item->text;
                }
            }
        }
    }

    public function storeOrUpdate()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tittle' => 'required',
            'text' => 'required',
        ]);
    
        $servicePackageData = [
            'service_id' => $this->service_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
        if ($this->servicePackageId) {
            $servicePackage = ServicePackage::find($this->servicePackageId);
            $servicePackage->update($servicePackageData);
        } else {
            $servicePackage = ServicePackage::create($servicePackageData);
        }
    
        $galleryData = [];
    
        foreach ($this->src as $index => $file) {
            $imgName = ImageHelper::uploadAndResizeImage(
                $file,
                'galery',
                1080,
                1080
            );
    
            $galleryData[] = [
                'service_package_id' => $servicePackage->id,
                'src' => $imgName,
                'tittle' => $this->tittle[$index],
                'text' => $this->text[$index],
            ];
        }
    
        $servicePackage->Galery()->delete();
    
        Galery::insert($galleryData);
    
        return redirect()->route('admin.servicePackages.index')
            ->with('message', 'Service Package successfully ' . ($this->servicePackageId ? 'updated' : 'created') . '.');
    }

    public function addImage()
    {
        $this->validate([
            'src' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        foreach ($this->src as $image) {
            $this->src[] = $image;
        }

        $this->src[] = $this->src;
        $this->tittle[] = '';
        $this->text[] = '';
    }

    public function removeImage($index)
    {
        unset($this->src[$index]);
        unset($this->tittle[$index]);
        unset($this->text[$index]);
        $this->src = array_values($this->src);
        $this->tittle = array_values($this->tittle);
        $this->text = array_values($this->text);
    }
}
