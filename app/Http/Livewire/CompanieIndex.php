<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

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
        return view('livewire.companie-index', compact('companys'));
    }
}
