<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserLw extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';
    public function render()
    {
        $users = User::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
        })->paginate($this->paginate);
        return view('livewire.user', compact('users'));
    }
}
