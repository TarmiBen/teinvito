<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Events_invitations;
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
        //traer el ultimo evento creado por el usuario
        $user = auth()->user();
        $latestEvent = Event::where('users_id', $user->id)->latest()->first();

        if (!$latestEvent) {
            session()->flash('no_events', 'Cuidado: no tienes eventos. Esto puede causar errores. <a href="' . route('event.create') . '">Crea un evento ahora</a>.');
        } else {
            session()->flash('invitation_message', 'La invitación será creada usando el siguiente evento: ' . $latestEvent->title . ', si este es un evento pasado, considere crear un nuevo evento. <a href="' . route('event.create') . '">Crea un evento ahora</a>.');
        }
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
        $user = auth()->user();
        $latestEvent = Event::where('users_id', $user->id)->latest()->first();

        if (!$latestEvent) {
            return redirect()->route('admin.invitations.index')->with('success', 'No tienes eventos. Crea un evento ahora');
        };

        if ($this->invitationId) {
            $this->emit('saveComponents');
            return redirect()->route('admin.invitations.index')->with('success', 'Invitación actualizada con éxito');
        } else {
            $invitation = Invitation::create([
                'user_id' => auth()->id(),
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
            $this->emit('saveComponents', ['success' => 'Invitación creada con éxito']);
            Events_invitations::create([
                'event_id' => $latestEvent->id,
                'invitation_id' => $invitation->id,
            ]);
            return redirect()->route('admin.invitations.index')->with('success', 'Invitación creada con éxito');
        }
    }
    //remover el ultimo componente que se agrego
    public function removeComponent($index)
    {
        unset($this->selectedComponents[$index]);
    }
}
