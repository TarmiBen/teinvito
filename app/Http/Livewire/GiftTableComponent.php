<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use Livewire\WithFileUploads;

class GiftTableComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
    public $button;
    public $button_link;
    public $image;
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount()
    {
        $this->title = "Gift Table";
        $this->text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.";
        $this->button = "View";
        $this->button_link = "";
        $this->image = "";

    }

    public function render()
    {
        return view('livewire.gift-table-component');
    }

    public function saveComponents()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelComponent::firstOrCreate([
            'component_package_id' => 1,
            'name' => 'gift Table',
            'model_type' => 'gift-table-component',
        ]);

        $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        if ($this->image) {
            $imagePath = $this->image->store('public/images');
            $this->image = $imagePath;
        }else{
            null;
        }
        $this->componentData = [
            'title' => $this->title,
            'text' => $this->text,
            'button' => $this->button,
            'button_link' => $this->button_link,
            'image' => $this->image,
        ];
        foreach ($this->componentData as $key => $body) {
            ComponentData::create([
                'key' => $key,
                'value' => $body,
                'invitation_id' => $invitationId,
                'component_id' => $component->id,
            ]);
        }
    }
}
