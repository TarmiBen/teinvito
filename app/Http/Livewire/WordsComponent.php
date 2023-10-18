<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;

class WordsComponent extends Component
{
    public $text;
    public $content;
    public $isEditing = true;
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->content = 'Contenido';
        $this->text = 'Texto';
        if($info){
            $this->content = $info['content'];
            $this->text = $info['text'];
        }

        if($data)
        {
            $this->content = $data['content'];
            $this->text = $data['text'];
            $this->isEditing = false;
        }
    }

    public function render()
    {
        return view('livewire.words-component');
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
                'name' => 'words',
                'model_type' => 'words-component',
            ]);
            $this->componentData = [
                'text' => $this->text,
                'content' => $this->content,
            ];
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        }else{
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'words',
                'model_type' => 'words-component',
            ]);
    
            $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
            $invitationId = $invitation->id;    
    
            $this->componentData = [
                'text' => $this->text,
                'content' => $this->content,
            ];
            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }
    }
}
