<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;

class GaleryComponent extends Component
{
    use WithFileUploads;

    public $images1;
    public $images2;
    public $images3;
    public $images4;
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount()
    {
        $this->images = [
            'images1' => null,
            'images2' => null,
            'images3' => null,
            'images4' => null,
        ];
    }

    public function render()
    {
        return view('livewire.galery-component');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'images1' => 'image|mimes:png,jpg,jpeg|max:5120', // 5MB Max and only png, jpg, jpeg files
            'images2' => 'image|mimes:png,jpg,jpeg|max:5120', // 5MB Max and only png, jpg, jpeg files
            'images3' => 'image|mimes:png,jpg,jpeg|max:5120', // 5MB Max and only png, jpg, jpeg files
            'images4' => 'image|mimes:png,jpg,jpeg|max:5120', // 5MB Max and only png, jpg, jpeg files
        ]);
    }


    public function saveComponents()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelComponent::firstOrCreate([
            'component_package_id' => 1,
            'name' => 'galery',
            'model_type' => 'galery-component',
        ]);

        $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        // Define un arreglo para almacenar las rutas de las imágenes
        $imagePaths = [];

        // Verifica y almacena cada imagen individualmente
        if ($this->images1) {
            $imagePath = $this->images1->store('public/images');
            $imagePaths['images1'] = $imagePath;
            $this->images1 = null;
        }
        if ($this->images2) {
            $imagePath = $this->images2->store('public/images');
            $imagePaths['images2'] = $imagePath;
            $this->images2 = null;
        }
        if ($this->images3) {
            $imagePath = $this->images3->store('public/images');
            $imagePaths['images3'] = $imagePath;
            $this->images3 = null;
        }
        if ($this->images4) {
            $imagePath = $this->images4->store('public/images');
            $imagePaths['images4'] = $imagePath;
            $this->images4 = null;
        }

        // Recorre el arreglo de rutas de imágenes y guárdalas en la base de datos
        foreach ($imagePaths as $key => $imagePath) {
            // Obtén la ruta completa del archivo
            $filePath = storage_path('app/' . $imagePath);
    
            // Verifica el tamaño del archivo
            if (filesize($filePath) > 5 * 1024 * 1024) {
                // Si el archivo supera los 5 MB, redimensiona la imagen
                $img = Image::make($filePath);
                $img->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
    
                // Guarda la imagen redimensionada
                $img->save($filePath);
            }
    
            // Actualiza la base de datos con la ruta de la imagen
            ComponentData::create([
                'key' => $key,
                'value' => $imagePath, // Almacena la ruta de la imagen en la base de datos
                'invitation_id' => $invitationId,
                'component_id' => $component->id,
            ]);
        }
    }
}
