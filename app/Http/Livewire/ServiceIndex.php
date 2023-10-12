<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceIndex extends Component
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
        $user = Auth::user();
        $services = Service::whereHas('Company', function ($query) use ($user) {
            $query->whereHas('UserProvider', function ($query) use ($user) {
                $query->where('users_id', $user->id);
            });
        })->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description_large', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description_small', 'LIKE', '%' . $this->search . '%');
        })
            ->paginate($this->paginate);
        return view('livewire.service-index', compact('services'));
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
            $service = Service::find($this->deleteId);
            if ($service) {
                $service->delete();
                // Limpiar el ID de eliminación después de la eliminación exitosa
                $this->deleteId = null;
            }
        }
    }
}
