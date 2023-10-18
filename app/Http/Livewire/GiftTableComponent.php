<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use Livewire\WithFileUploads;
use App\Helpers\ComponentHelper;

class GiftTableComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
    public $button;
    public $button_link;
    public $image;
    public $isEditing = true;
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
    {

        $this->invitationId = $invitationId;
        $this->title = "Gift Table";
        $this->text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.";
        $this->button = "View";
        $this->button_link = "";
        $this->image = "";
        if($info){
            $this->title = $info['title'];
            $this->text = $info['text'];
            $this->button = $info['button'];
            $this->button_link = $info['button_link'];
            $this->image = $info['image'];
        }
        if($data){
            $this->title = $data['title'];
            $this->text = $data['text'];
            $this->button = $data['button'];
            $this->button_link = $data['button_link'];
            $this->image = $data['image'];
            $this->isEditing = false;
        }
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
        if($this->invitationId){
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1,
                'name' => 'gift Table',
                'model_type' => 'gift-table-component',
            ]);
            if ($this->image) {
                $imagePath = $this->image->store('public/images');
                $this->image = $imagePath;
            }
            $this->componentData = [
                'title' => $this->title,
                'text' => $this->text,
                'button' => $this->button,
                'button_link' => $this->button_link,
                'image' => $this->image,
            ];
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        }else{
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
            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }
    }
}
