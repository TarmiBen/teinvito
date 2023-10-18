<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;

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
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->link = 'Agregar link';
        $this->link2 = 'Agregar link';
        $this->title = 'Agregar titulo';
        $this->description = 'Agregar descripcion';
        $this->event1 = 'Agregar evento';
        $this->date1 = 'Agregar fecha';
        $this->hour1 = 'Agregar hora';
        $this->place1 = 'Agregar lugar';
        $this->event2 = 'Agregar evento';
        $this->date2 = 'Agregar fecha';
        $this->hour2 = 'Agregar hora';
        $this->place2 = 'Agregar lugar';
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
            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }
    }
}
