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
    public $link;
    public $link2;
    public $title;
    public $description;
    public $event1;
    public $date1;
    public $hour1;
    public $place1;
    public $event2;
    public $date2;
    public $hour2;
    public $place2;
    public $image1;
    public $image2;
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null)
    {
        $this->link = 'Agregar link';
        $this->link2 = 'Agregar link';
        $this->title = 'Información';
        $this->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.';
        $this->event1 = 'Evento 1';
        $this->date1 = 'Fecha 1';
        $this->hour1 = 'Hora 1';
        $this->place1 = 'Lugar 1';
        $this->event2 = 'Evento 2';
        $this->date2 = 'Fecha 2';
        $this->hour2 = 'Hora 2';
        $this->place2 = 'Lugar 2';
        $this->image1 = 'https://th.bing.com/th/id/R.ee8354e0bd34be81bfe0ec79486f8ada?rik=wdqC5I4gZ1753w&pid=ImgRaw&r=0';
        $this->image2 = 'https://i.pinimg.com/originals/93/e4/59/93e459a2ae0d7f9e5cda24acee8b79b8.jpg';

        if($data)
        {
            $this->link = $data['link'];
            $this->link2 = $data['link2'];
            $this->title = $data['title'];
            $this->description = $data['description'];
            $this->event1 = $data['event1'];
            $this->date1 = $data['date1'];
            $this->hour1 = $data['hour1'];
            $this->place1 = $data['place1'];
            $this->event2 = $data['event2'];
            $this->date2 = $data['date2'];
            $this->hour2 = $data['hour2'];
            $this->place2 = $data['place2'];
            $this->image1 = $data['image1'];
            $this->image2 = $data['image2'];
            $this->isEditing = false;
        }

    }

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
            'link2'         => $this->link2,
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
