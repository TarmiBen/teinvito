<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserProvider;

class UserProviderIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';

    public function render()
    {
        $userProviders = UserProvider::where('users_id', 'LIKE', '%' . $this->search . '%')
            ->orWhere('company_id', 'LIKE', '%' . $this->search . '%')
            ->orderBy($this->orderBy, $this->order)
            ->paginate($this->paginate);
        return view('livewire.user-provider-index', compact('userProviders'));
    }
}
