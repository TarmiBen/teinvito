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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user()->id;
    
        $invitations = Invitation::whereIn('users_id', function ($query) use ($user) {
            $query->select('users_id')
                ->from('users')
                ->where('users_id', $user);
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
    
}
