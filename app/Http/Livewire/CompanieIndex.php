<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class CompanieIndex extends Component
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
        $companys = Company::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('rfc', 'LIKE', '%' . $this->search . '%')
            ->orderBy($this->orderBy, $this->order)
            ->paginate($this->paginate);

            if ($companys->isEmpty()) {
                if ($this->search != '') {
                    Log::channel('livewire')->error('El usuario con id:' . User::find(auth()->user()->id)->id . ' buscó la compañia con nombre:' . $this->search . ' y no se encontró');
                } else {
                    Log::channel('livewire')->error('El usuario con id:' . User::find(auth()->user()->id)->id . ' buscó todas las compañias y no se encontró ninguna');
                }
            }

        return view('livewire.companie-index', compact('companys'));
    }
}
