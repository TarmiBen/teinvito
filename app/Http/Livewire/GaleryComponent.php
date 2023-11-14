<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;
use Illuminate\Support\Facades\Log;

class GaleryComponent extends Component
{
    use WithFileUploads;

    public $images1;
    public $images2;
    public $images3;
    public $images4;
    public $isEditing = true;
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->images = [
            'images1' => null,
            'images2' => null,
            'images3' => null,
            'images4' => null,
        ];
        if ($info) {
            $this->images = [
                'images1' => $info['images1'],
                'images2' => $info['images2'],
                'images3' => $info['images3'],
                'images4' => $info['images4'],
            ];
            $this->isEditing = true;
        }

        if($data)
        {
            $this->images = [
                'images1' => $data['images1'],
                'images2' => $data['images2'],
                'images3' => $data['images3'],
                'images4' => $data['images4'],
            ];
            $this->isEditing = false;
        }
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
        if($this->invitationId){
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'galery',
                'model_type' => 'galery-component',
            ]);
            $imagePaths = [];
    
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
            if (!$this->image1) {
                Log::channel('livewire')->error('No se subio una imagen');
            }
            if (!$this->image2) {
                Log::channel('livewire')->error('No se subio una imagen');
            }
            if (!$this->image3) {
                Log::channel('livewire')->error('No se subio una imagen');
            }
            if (!$this->image4) {
                Log::channel('livewire')->error('No se subio una imagen');
            }
            foreach ($imagePaths as $key => $imagePath) {
                $filePath = storage_path('app/' . $imagePath);
        
                if (filesize($filePath) > 5 * 1024 * 1024) {
                    $img = Image::make($filePath);
                    $img->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($filePath);
                }
        
                // Verifica si el registro ya existe o lo crea
                ComponentData::updateOrCreate(
                    [
                        'key' => $key,
                        'invitation_id' => $this->invitationId,
                        'component_id' => $component->id,
                    ],
                    [
                        'value' => $imagePath,
                    ]
                );
            }
        }else{
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'galery',
                'model_type' => 'galery-component',
            ]);
    
            $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
            $invitationId = $invitation->id;
    
            $imagePaths = [];
    
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
            if (!$this->images1) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' guardo un componente de tipo galery sin el dato imagen 1');
            }
            if (!$this->images2) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' guardo un componente de tipo galery sin el dato imagen 2');
            }
            if (!$this->images3) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' guardo un componente de tipo galery sin el dato imagen 3');
            }
            if (!$this->images4) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' guardo un componente de tipo galery sin el dato imagen 4');
            }
            foreach ($imagePaths as $key => $imagePath) {
                $filePath = storage_path('app/' . $imagePath);
        
                if (filesize($filePath) > 5 * 1024 * 1024) {
                    $img = Image::make($filePath);
                    $img->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($filePath);
                }
                ComponentData::create([
                    'key' => $key,
                    'value' => $imagePath, // Almacena la ruta de la imagen en la base de datos
                    'invitation_id' => $invitationId,
                    'component_id' => $component->id,
                ]);
            }
        }
    }
}
