<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BannerComponent extends Component
{
    use WithFileUploads;

    public $image;

    public function render()
    {
        return view('livewire.banner-component');
    }
    
    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
    }
}
