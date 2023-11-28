<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;
use Illuminate\Support\Facades\Log;

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
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
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
        $this->image1 = '';
        $this->image2 = '';

        if($info){
            $this->link = $info['link'];
            $this->link2 = $info['link2'];
            $this->title = $info['title'];
            $this->description = $info['description'];
            $this->event1 = $info['event1'];
            $this->date1 = $info['date1'];
            $this->hour1 = $info['hour1'];
            $this->place1 = $info['place1'];
            $this->event2 = $info['event2'];
            $this->date2 = $info['date2'];
            $this->hour2 = $info['hour2'];
            $this->place2 = $info['place2'];
            $this->image1 = $info['image1'];
            $this->image2 = $info['image2'];
        }

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
        if($this->invitationId){
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'info',
                'model_type' => 'info-component',
            ]);
            $imagePaths = [];
            if ($this->image1) {
                $imagePath = $this->image1->store('public/images');
                $imagePaths['image1'] = $imagePath;
                $this->image1 = null;
            }
            if (!$this->image1) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo image1');
            }
            if ($this->image2) {
                $imagePath = $this->image2->store('public/images');
                $imagePaths['image2'] = $imagePath;
                $this->image2 = null;
            }
            if (!$this->image2) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo image2');
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
                'image1'        => $this->image1,
                'image2'        => $this->image2,
                'link'          => $this->link,
            ];
            foreach (['title', 'description', 'event1', 'date1', 'hour1', 'place1', 'event2', 'date2', 'hour2', 'place2', 'link'] as $field) {
                if (empty($this->componentData[$field])) {
                    Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo ' . str_replace('_', ' ', $field));
                }
            }
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        }else{
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
            if (!$this->image1) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo image1');
            }
            if ($this->image2) {
                $imagePath = $this->image2->store('public/images');
                $imagePaths['image2'] = $imagePath;
                $this->image2 = null;
            }
            if (!$this->image2) {
                Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo image2');
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
                'image1'        => $this->image1,
                'image2'        => $this->image2,
                'link'          => $this->link,
            ];
            foreach (['title', 'description', 'event1', 'date1', 'hour1', 'place1', 'event2', 'date2', 'hour2', 'place2', 'link'] as $field) {
                if (empty($this->componentData[$field])) {
                    Log::channel('livewire')->error('El usuario con id:' . auth()->id() . ' intentó actualizar un componente de tipo gift table sin el campo ' . str_replace('_', ' ', $field));
                }
            }
            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }
    }
}
