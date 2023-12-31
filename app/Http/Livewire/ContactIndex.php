<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContactIndex extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();
        $contacts = Contact::whereIn('company_id', function ($query) use ($user) {
            $query->select('company_id')
                ->from('userprovider')
                ->where('users_id', $user->id);
        })
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
        })
        ->paginate($this->paginate);

        if ($contacts->isEmpty()) {
            if ($this->search != '') {
                Log::channel('livewire')->error('El usuario con id:' . $user->id . ' buscó un contacto que no existe: ' . $this->search);
            } else {
                Log::channel('livewire')->error('El usuario con id:' . $user->id . ' entró a la vista de contactos y no tiene ningun contacto asociado');
            }
        }

        return view('livewire.contact-index', compact('contacts'));
    }
}
