<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class InvitationIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';
    public $deleteId = null;
    protected $listeners = ['destroy'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user()->id;
    
        $invitations = Invitation::whereIn('user_id', function ($query) use ($user) {
            $query->select('user_id')
                ->from('users')
                ->where('user_id', $user);
        })->where(function ($query) {
            $query->where('id', 'LIKE', '%' . $this->search . '%')
                ->orWhere('package_id', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('User', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                });
        })->orderBy($this->orderBy, $this->order)
        ->paginate($this->paginate);
    
        return view('livewire.invitation-index', compact('invitations'));
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'question',
            'message' => '¿Estás seguro de eliminar este servicio?',
            'text' => "Esta acción no se puede deshacer.",
        ]);
    }

    public function destroy()
    {
        if ($this->deleteId) {
            $invitation = Invitation::with('InvitationsComponents', 'ComponentsData')->find($this->deleteId);
    
            if ($invitation) {
                // Eliminar los registros relacionados en InvitationsComponents
                $invitation->InvitationsComponents()->delete();
    
                // Eliminar los registros relacionados en ComponentsData
                $invitation->ComponentsData()->delete();
    
                // Eliminar la invitación principal
                $invitation->delete();
    
                // Limpiar el ID de eliminación después de la eliminación exitosa
                $this->deleteId = null;
    
                // Emitir evento o mensaje de éxito
                // $this->emit('invitationsDeleted');
            }
        }
    }
    
}
