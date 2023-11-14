<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;

class BannerComponent extends Component
{
    use WithFileUploads;

    public $title = 'Título';
    public $subtitle = 'Subtítulo';
    public $isEditing = true;   
    public $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null)
    {
        $this->title = 'Título';
        $this->subtitle = 'Subtítulo';

        if($data)
        {
            $this->title = $data['title'];
            $this->subtitle = $data['subtitle'];
            $this->isEditing = false;
        }
    }

    public function render()
    {
        return view('livewire.banner-component');
    }

    public function toggleEdit($index)
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveComponents()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelComponent::firstOrCreate([
            'component_package_id' => 1,
            'name' => 'banner',
            'model_type' => 'banner-component',
        ]);

        $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        $this->componentData = [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
        ];

        foreach ($this->componentData as $key => $body) {
            if(!is_null($body)) {
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
