<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserProvider;
use Illuminate\Support\Facades\Auth;


class UserProviderIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';

    public function render()
    {
        // $userProviders = UserProvider::where('users_id', 'LIKE', '%' . $this->search . '%')
        //     ->orWhere('company_id', 'LIKE', '%' . $this->search . '%')
        //     ->orderBy($this->orderBy, $this->order)
        //     ->paginate($this->paginate);

                    // Obtener el ID del usuario actualmente autenticado
        $userId = Auth::id();

        // // Obtener todos los registros de UserProvider para las empresas vinculadas al usuario actual
        // $userProviders = UserProvider::whereHas('company', function ($query) use ($userId) {
        //     $query->whereHas('UserProvider', function ($subquery) use ($userId) {
        //         $subquery->where('users_id', $userId);
        //     });
        // })->with('company')->get();

        $userProviders = UserProvider::whereIn('company_id', function ($query) use ($userId) {
            $query->select('company_id')
                ->from('userprovider')
                ->where('users_id', $userId);
        })
        ->where(function ($query) {
            $query->wherehas('user', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');

            })
            ->orWherehas('company', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->orderBy, $this->order)
        ->paginate($this->paginate);

        return view('livewire.user-provider-index', compact('userProviders'));
    }
}
