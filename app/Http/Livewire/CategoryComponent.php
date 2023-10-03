<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class CategoryComponent extends Component
{

    use withPagination;

    public $categoria;
    public $CategoryParent;
    public $sort = 'id';

    // -- search
    public $paginate = 10, $search = '', $orderBy = 'id', $order = 'desc';

    // -- filter
    public $category_id = null, $name = null;

    // -- delete
    public $deleteId = null;
    protected $listeners = ['destroy'];
    protected $paginationTheme = 'bootstrap';

    /**
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Aquí obtén los datos de las categorías y asigna el resultado a $this->categoria
        $this->categoria = Category::orderBy('id', 'desc')->get(); // Ejemplo de obtener todas las categorías desde un modelo llamado Categoria

    }

    public function render()
    {
        $categoria = Category::select('id', 'category_id', 'name')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('CategoryParent', function ($CategoryParent) {
                $CategoryParent->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort, $this->order)
            ->paginate(10); // Aplicamos la paginación aquí

        return view('livewire.category-component', ['categoria' => $categoria]);
    }

    public function order($sort)
    {
    if ($this->sort == $sort) {
        $this->order = ($this->order == 'desc') ? 'asc' : 'desc';
    } else {
        $this->sort = $sort;
        $this->order = 'asc';
    }
    }


    public function deleteConfirm($id)
    {
        $count = Category::where('id', $id)->count();
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'question',
            'message' => '¿Esta seguro de esta accion?',
            'text' => $count > 0 ? "Se eliminara registro de $count postulaciones, puede haber error a futuro" : 'Eliminar Registro',
        ]);
    }

    public function destroy()
    {
        $category = Category::findOrFail($this->deleteId);
        $category->delete();
    }
}
