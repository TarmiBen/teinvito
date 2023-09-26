<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;

class InfoComponent extends Component
{
    use WithFileUploads;
    public $link = 'Agregar link';
    public $link2 = 'Agregar link';
    public $title = 'Agregar titulo';
    public $description = 'Agregar descripcion';
    public $event1 = 'Agregar evento';
    public $date1 = 'Agregar fecha';
    public $hour1 = 'Agregar hora';
    public $place1 = 'Agregar lugar';
    public $event2 = 'Agregar evento';
    public $date2 = 'Agregar fecha';
    public $hour2 = 'Agregar hora';
    public $place2 = 'Agregar lugar';
    public $image1;
    public $image2;
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function render()
    {
        return view('livewire.info-component');
    }

    public function updatedImagen1()
    {
        $this->validate([
            'image1' => 'image|max:1024', // 1MB Max
            'image2' => 'image|max:1024', // 1MB Max
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
            'name' => 'info',
            'model_type' => 'info-component',
        ]);

        $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        $imagePaths = [];//array to save the images paths

        if ($this->image1) {
            $imagePath = $this->image1->store('public/images');
            $imagePaths['image1'] = $imagePath;
            $this->image1 = null;
        }
        if ($this->image2) {
            $imagePath = $this->image2->store('public/images');
            $imagePaths['image2'] = $imagePath;
            $this->image2 = null;
        }

        $this->componentData = [
            'title'         => $this->title,
            'description'   => $this->description,
            'event1'        => $this->event1,
            'date1'         => $this->date1,
            'hour1'         => $this->hour1,
            'place1'        => $this->place1,
            'event2'        => $this->event2,
            'date2'         => $this->date2,
            'hour2'         => $this->hour2,
            'place2'        => $this->place2,
            'image1'        => $imagePaths['image1'] ?? null,
            'image2'        => $imagePaths['image2'] ?? null,
            'link'          => $this->link,
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
