<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;

class WordsComponent extends Component
{
    public $text;
    public $content;
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null)
    {
        $this->content = 'Contenido';
        $this->text = 'Texto';

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
            'name' => 'words',
            'model_type' => 'words-component',
        ]);

        $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;    

        $this->componentData = [
            'text' => $this->text,
            'content' => $this->content,
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
