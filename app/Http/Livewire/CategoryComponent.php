<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class CategoryComponent extends Component
{

    use withPagination;

     
    public $categories;  
    public $category;
    public $CategoryParent;
    public $sort = 'id';   
    public $orderColumn = "id";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    public $sortOrder = "asc"; 
    
    // -- search
    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id'; 
    public $order = 'desc';

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
        $this->category = Category::orderBy('id', 'desc')->get(); // Ejemplo de obtener todas las categorías desde un modelo llamado Categoria
         $this->categories = Category::orderBy('id', 'asc')->get();
    }

    public function render()
    {
        // $categoria = Category::where('name', 'like', '%' . $this->search . '%')            
        //     ->orwhere('category_id', 'like', '%' . $this->search . '%')
        //      ->orWhereHas('CategoryParent', function ($CategoryParent) {
        //          $CategoryParent->where('name', 'like', '%' . $this->search . '%');
        //      })
        //     ->orderBy($this->sort, $this->order)
        //     ->get();
       
        $categoriaQuery = Category::orderBy($this->orderColumn, $this->sortOrder)->select('*');

        if(!empty($this->search)){

            $categoriaQuery->orWhere('category_id', 'like', "%" . $this->search . "%")
            ->orWhere('name', 'like', "%" . $this->search . "%");
        }

        
        $categoria = $categoriaQuery->paginate($this->paginate);
        // $categoria = Category::paginate(10);
        
        return view('livewire.category-component', compact('categoria'));
    }

    public function sortOrder($columnName=""){
        $caretOrder = "up";
        if($this->sortOrder == 'asc'){
             $this->sortOrder = 'desc';
             $caretOrder = "down";
        }else{
             $this->sortOrder = 'asc';
             $caretOrder = "up";
        } 
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';

        $this->orderColumn = $columnName;

   }

   public function updatePagination()
    {
        $this->resetPage(); // Reiniciar la página a la primera cuando cambia la paginación
    }

    public function deleteConfirm($id)
    {
        $count = Category::where('id', $id)->count();
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'question',
            'message' => '¿Esta seguro de esta accion?',
            'text' => $count>0?"Se eliminara registro de $count postulaciones, puede haber error a futuro": 'Eliminar Registro',
        ]);
    }

    public function destroy()
    {
        $categoria = Category::findOrFail($this->deleteId);
        $categoria->delete();
    }
}