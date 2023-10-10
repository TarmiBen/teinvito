<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServicePackage;
use Illuminate\Support\Facades\Auth;

class ServicePackageIndex extends Component
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

        $servicePackages = ServicePackage::whereIn('service_id', function ($query) use ($user) {
            $query->select('id')
                ->from('services')
                ->whereIn('company_id', function ($query) use ($user) {
                    $query->select('company_id')
                        ->from('userprovider')
                        ->where('users_id', $user->id);
                });
        })->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                ->orWhere('price', 'LIKE', '%' . $this->search . '%');
        })
            ->paginate($this->paginate);
        return view('livewire.service-package-index', compact('servicePackages'));
    }
}
