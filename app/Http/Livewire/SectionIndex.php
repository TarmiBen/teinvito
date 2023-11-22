<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';



    public function render()
    {
        $user = Auth::user()->id;

        $sections = Section::where('user_id', $user)
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->orderBy, $this->order)
            ->paginate($this->paginate);

        return view('livewire.section-index', compact('sections'));
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

}
