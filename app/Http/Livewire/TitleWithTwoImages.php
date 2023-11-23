<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\ComponentHelper;
use App\Models\ComponentProvider;
use App\Models\Section;

class TitleWithTwoImages extends Component
{
    use withFileUploads;
    public $title;
    public $subtitle;
    public $image;
    public $image2;
    public $text;
    public $finalMessage;
    public $isEditing = true;
    public $preview = false;
    public $CustomViewId;
    public $sectionId;
    protected $listeners = ['saveComponents' => 'saveComponents','togglePreviewMode' => 'togglePreviewMode'];

    public function render()
    {
        return view('livewire.title-with-two-images');
    }

    public function mount($data = null, $info = null, $CustomViewId = null, $sectionId = null)
    {
        $this->CustomViewId = $CustomViewId;
        $this->sectionId = $sectionId;
        $this->title = "titulo";
        $this->subtitle = "subtitulo";
        $this->image = "";
        $this->image2 = "";
        $this->text = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nis";
        $this->finalMessage = "mensaje final";
        if($info){
            $this->isEditing = true;
            $this->preview = false;
            $this->title = $info['title'];
            $this->subtitle = $info['subtitle'];
            $this->image = $info['image'];
            $this->image2 = $info['image2'];
            $this->text = $info['text'];
            $this->finalMessage = $info['finalMessage'];
        }
        if($data)
        {
            $this->isEditing = false;
            $this->preview = false;
            $this->title = $data['title'];
            $this->subtitle = $data['subtitle'];
            $this->image = $data['image'];
            $this->image2 = $data['image2'];
            $this->text = $data['text'];
            $this->finalMessage = $data['finalMessage'];
        }
    }

    public function togglePreviewMode()
    {
        $this->preview = !$this->preview;
    }

    public function saveComponents()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        if ($this->CustomViewId){
            $component = ComponentProvider::firstOrCreate([
                'name' => 'Titulo con dos imagenes',
                'model_type' => 'title-with-two-images',
            ]);
            if ($this->image) {
                $this->image = $this->image->store('images', 'public');
            }
            if ($this->image2) {
                $this->image2 = $this->image2->store('images', 'public');
            }
            $this->componentData = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $this->image,
                'image2' => $this->image2,
                'text' => $this->text,
                'finalMessage' => $this->finalMessage,
            ];
            ComponentHelper::updateComponentDataProvider($component, $this->CustomViewId, $this->componentData);
        } else {
            $component = ComponentProvider::firstOrCreate([
                'name' => 'Titulo con dos imagenes',
                'model_type' => 'title-with-two-images',
            ]);
            $section = Section::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
            $CustomViewId = $section->id;
            if ($this->image) {
                $this->image = $this->image->store('images', 'public');
            }
            if ($this->image2) {
                $this->image2 = $this->image2->store('images', 'public');
            }
            $this->componentData = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $this->image,
                'image2' => $this->image2,
                'text' => $this->text,
                'finalMessage' => $this->finalMessage,
            ];
            ComponentHelper::createComponentDataProvider($component, $CustomViewId, $this->componentData);
        }
    }
}
