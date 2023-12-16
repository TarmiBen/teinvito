<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryAdm extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';
    public function render()
    {
        $categories = Category::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('category_id', 'LIKE', '%' . $this->search . '%');
        })->paginate($this->paginate);
        return view('livewire.category-adm', compact('categories'));
    }
}
