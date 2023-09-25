<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
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
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount()
    {
        $this->title = "Código de Vestimenta";
        $this->subtitle = "Formal";
        $this->image = "https://th.bing.com/th/id/R.ee8354e0bd34be81bfe0ec79486f8ada?rik=wdqC5I4gZ1753w&pid=ImgRaw&r=0";
        $this->image2 = "https://i.pinimg.com/originals/93/e4/59/93e459a2ae0d7f9e5cda24acee8b79b8.jpg";
        $this->text = "Estaremos felices de contar con tu presencia.";
        $this->finalMessage = "!Gracias!";
        $this->coupleName = "Benito y Lupita";
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
        $component = ModelComponent::firstOrCreate([
            'component_package_id' => null, 
            'name' => 'dress code',
            'model_type' => 'dress-code-component',
        ]);

        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
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
