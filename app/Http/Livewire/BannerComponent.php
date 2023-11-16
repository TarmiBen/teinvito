<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;
use Illuminate\Support\Facades\Log;

class BannerComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $isEditing = true;
    public $invitationId;
    public $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->title = 'dffd';
        $this->subtitle = 'Subtítulo';
        if($info){
            $this->title = $info['title'];
            $this->subtitle = $info['subtitle'];
            $this->isEditing = true;
        }
        if($data)
        {
            $this->title = $data['title']; // 'Título
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
        if ($this->invitationId) {
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'banner',
                'model_type' => 'banner-component',
            ]);
    
            $this->componentData = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
            ];
    
            foreach (['title', 'subtitle'] as $field) {
                if (empty($this->componentData[$field])) {
                    Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo banner sin el campo ' . str_replace('_', ' ', $field));
                }
            }
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        } else {
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

            foreach (['title', 'subtitle'] as $field) {
                if (empty($this->componentData[$field])) {
                    Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó guardar un componente de tipo banner sin el campo ' . str_replace('_', ' ', $field));
                }
            }

            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }
    }
    
}
