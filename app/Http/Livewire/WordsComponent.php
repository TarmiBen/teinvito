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

    public function mount()
    {
        $this->content = 'Contenido';
        $this->text = 'Texto';
    }

    public function render()
    {
        return view('livewire.words-component');
    }

    public function toggleEdit($index)
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveWordsComponent()
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

        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;    

        if ($this->images1) {
            $this->images1->store('public/images');
            $component->data()->updateOrCreate([
                'invitation_id' => $invitationId,
                'name' => 'images1',
            ], [
                'value' => $this->images1->hashName(),
            ]);
        }

        $this->componentData = [
            'body' => $this->body,
            'text' => $this->text,
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
