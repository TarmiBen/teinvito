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
    protected $listeners = ['saveComponents' => 'saveBannerComponent'];

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

    public function updatedPhoto()//function to validate the image
    {
        $this->validate([
            'images1' => 'image|max:1024', // 1MB Max   
            'images2' => 'image|max:1024', // 1MB Max
            'images3' => 'image|max:1024', // 1MB Max
            'images4' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function saveBannerComponent()
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

        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        if ($this->images1) {
            $imagePath = $this->images1->store('public/images');
            $this->images1 = $imagePath;
        } elseif ($this->images2) {
            $imagePath = $this->images2->store('public/images');
            $this->images2 = $imagePath;
        } elseif ($this->images3) {
            $imagePath = $this->images3->store('public/images');
            $this->images3 = $imagePath;
        } elseif ($this->images4) {
            $imagePath = $this->images4->store('public/images');
            $this->images4 = $imagePath;
        }

        $this->componentData = [
            'images1' => $this->images1,
            'images2' => $this->images2,
            'images3' => $this->images3,
            'images4' => $this->images4,
        ];

        foreach ($this->componentData as $key => $body) {
            if (!is_null($body)) {
                ComponentData::create([
                    'key' => $key,
                    'value' => $body,
                    'invitation_id' => $invitationId,
                    'component_id' => $component->id,
                ]);
            }
        }

    }
}
