<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;
class DressCodeComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $image2;
    public $text;
    public $finalMessage;
    public $coupleName;
    public $isEditing = true;
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount($data = null, $info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->title = "Código de Vestimenta";
        $this->subtitle = "Formal";
        $this->image = "https://th.bing.com/th/id/R.ee8354e0bd34be81bfe0ec79486f8ada?rik=wdqC5I4gZ1753w&pid=ImgRaw&r=0";
        $this->image2 = "https://i.pinimg.com/originals/93/e4/59/93e459a2ae0d7f9e5cda24acee8b79b8.jpg";
        $this->text = "Estaremos felices de contar con tu presencia.";
        $this->finalMessage = "!Gracias!";
        $this->coupleName = "Benito y Lupita";
        if($info){
            $this->title = $info['title'];
            $this->subtitle = $info['subtitle'];
            $this->image = $info['image'];
            $this->image2 = $info['image2'];
            $this->text = $info['text'];
            $this->finalMessage = $info['finalMessage'];
            $this->coupleName = $info['coupleName'];
            $this->isEditing = true;
        }
        if($data)
        {
            $this->title = $data['title'];
            $this->subtitle = $data['subtitle'];
            $this->image = $data['image'];
            $this->image2 = $data['image2'];
            $this->text = $data['text'];
            $this->finalMessage = $data['finalMessage'];
            $this->coupleName = $data['coupleName'];
            $this->isEditing = false;
        }
    }

    public function render()
    {
        return view('livewire.dress-code-component');
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
                'name' => 'dress code',
                'model_type' => 'dress-code-component',
            ]);
            if ($this->image) {
                $imagePath = $this->image->store('public/images');
                $this->image = $imagePath;
            }

            if ($this->image2) {
                $imagePath = $this->image2->store('public/images');
                $this->image2 = $imagePath;
            }
            $this->componentData = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $this->image,
                'image2' => $this->image2,
                'text' => $this->text,
                'finalMessage' => $this->finalMessage,
                'coupleName' => $this->coupleName,
            ];
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        } else {
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1, 
                'name' => 'dress code',
                'model_type' => 'dress-code-component',
            ]);

            $invitation = Invitation::where('users_id', auth()->id())->latest()->first();
            $invitationId = $invitation->id;

            if ($this->image) {
                $imagePath = $this->image->store('public/images');
                $this->image = $imagePath;
            }

            if ($this->image2) {
                $imagePath = $this->image2->store('public/images');
                $this->image2 = $imagePath;
            }

            $this->componentData = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $this->image,
                'image2' => $this->image2,
                'text' => $this->text,
                'finalMessage' => $this->finalMessage,
                'coupleName' => $this->coupleName,
            ];

            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);
        }

    }
}
