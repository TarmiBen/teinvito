<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\events_invitations;
use Livewire\Component;
use App\Models\Invitation;
use App\Models\Component as ModelsComponent;
use App\Models\InvitationComponent;

class InvitationsCreate extends Component
{
    public $selectedComponents = [];
    public $availableComponents = [];
    public $invitationComponents = [];
    public $invitationId;

    public function mount($invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->availableComponents = ModelsComponent::pluck('name', 'model_type')->toArray();
        if ($invitationId) {
            $this->loadInvitationComponents($invitationId);
        }
    }

    public function loadInvitationComponents($invitationId)
    {
        // Realiza una consulta para obtener la invitación relacionada
        $this->invitation = Invitation::with('InvitationsComponents.Component')->find($invitationId);
        // Luego, puedes acceder a los componentes de la invitación
        $this->invitationComponents = $this->invitation->InvitationsComponents;
    }

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

        if ($this->invitationId) {
            $this->emit('saveComponents');
        } else {
            $invitation = Invitation::create([
                'users_id' => auth()->id(),
                'package_id' => null,
            ]);
            foreach ($this->selectedComponents as $index => $componentData) {
                $componentName = $componentData['component'];
                $componentRecord = ModelsComponent::where('model_type', $componentName)->first();
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
            $this->emit('saveComponents');
    
            events_invitations::create([
            'event_id' => Event::where('users_id', auth()->id())->latest()->first()->id,
            'invitation_id' => Invitation::where('users_id', auth()->id())->latest()->first()->id,
            ]);
        }

    }
    //remover el ultimo componente que se agrego
    public function removeComponent($index)
    {
        unset($this->selectedComponents[$index]);
    }
}
