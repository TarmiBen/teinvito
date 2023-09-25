<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class InfoComponent extends Component
{
    use WithFileUploads;
    public $link = 'Agregar link';
    public $title = 'Agregar titulo';
    public $description = 'Agregar descripcion';
    public $image1;
    public $image2;

    public function render()
    {
        return view('livewire.info-component');
    }

    public function updatedImagen1()
    {
        $this->validate([
            'image1' => 'image|max:1024', // 1MB Max
            'image2' => 'image|max:1024', // 1MB Max
        ]);
    }
}
