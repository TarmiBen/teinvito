<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventLiveWire extends Component
{
    use WithPagination;


    public $paginate = 10;
    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';
    public function render()
    {
        $events = Event::where(function ($query) {
            $query->where('user_invited_id', 'LIKE', '%' . $this->search . '%')
                ->orWhere('type', 'LIKE', '%' . $this->search . '%')
                ->orWhere('ceremony_date', 'LIKE', '%' . $this->search . '%')
                ->orWhere('event_date', 'LIKE', '%' . $this->search . '%')
                ->orWhere('title', 'LIKE', '%' . $this->search . '%');
        })->paginate($this->paginate);
        return view('livewire.event', compact('events'));
    }
}
