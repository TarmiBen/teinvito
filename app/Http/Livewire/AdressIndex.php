<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AdressIndex extends Component
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
        $addresses = Address::whereIn('company_id', function ($query) use ($user) {
            $query->select('company_id')
                ->from('userprovider')
                ->where('users_id', $user->id);
        })
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('street', 'LIKE', '%' . $this->search . '%')
                ->orWhere('int', 'LIKE', '%' . $this->search . '%')
                ->orWhere('ext', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cp', 'LIKE', '%' . $this->search . '%')
                ->orWhere('colony', 'LIKE', '%' . $this->search . '%')
                ->orWhere('city', 'LIKE', '%' . $this->search . '%')
                ->orWhere('state', 'LIKE', '%' . $this->search . '%');
        })->paginate($this->paginate);
        return view('livewire.adress-index', compact('addresses'));
    }
}
