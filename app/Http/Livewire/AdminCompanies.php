<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class AdminCompanies extends Component
{
    public function render()
    {
        $companys = Company::all();
       return view('livewire.admin-companies', compact('companys'));
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

    public function destroy(Company $company)
    {
        $company->delete();
        $this->emit('alert', 'La compañia se eliminó correctamente');
    }
}
