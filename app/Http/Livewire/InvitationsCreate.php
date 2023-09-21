<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitation;
use App\Models\Component as ModelsComponent;
use App\Models\InvitationComponent;

class InvitationsCreate extends Component
{
    public $selectedComponents = [];
    public $availableComponents = [];
    public $componentChangesSaved = [];

    public function render()
    {
        $this->availableComponents = ModelsComponent::pluck('name', 'model_type')->toArray();
        return view('livewire.invitations-create');
    }

    public function addComponent($component)
    {
        if (count($this->selectedComponents) < 5) {
            $this->selectedComponents[] = ['component' => $component, 'props' => []];
        }
    }


    public function updateComponent($index, $props)
    {
        $this->selectedComponents[$index]['props'] = $props;
    }
 
    public function saveAll()
    {
        $invitation = Invitation::create([
            'user_id' => auth()->id(),
        ]);
        dd($invitation);
    
        foreach ($this->selectedComponents as $index => $componentData) {
            $componentName = $componentData['component'];
            $componentRecord = ModelsComponent::where('name', $componentName)->first();
            if ($componentRecord) {
                $componentClassName = $componentRecord->model_type;
                $order = $index + 1; 
                InvitationComponent::create([
                    'invitation_id' => $invitation->id,
                    'component_id' => $componentRecord->id, 
                    'order' => $order,
                ]);
            }
        }
        dd($this->selectedComponents);
    }
    //remover el ultimo componente que se agrego
    public function removeComponent($index)
    {
        unset($this->selectedComponents[$index]);
    }
}
