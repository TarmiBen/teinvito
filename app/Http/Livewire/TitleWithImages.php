<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\ComponentHelper;
use App\Models\ComponentProvider;
use App\Models\Section;

class TitleWithImages extends Component
{
    use withFileUploads;
    public $title;
    public $image1;
    public $description1;
    public $image2;
    public $description2;
    public $image3;
    public $description3;
    public $isEditing = true;
    public $preview = false;
    public $CustomViewId;
    public $sectionId;
    protected $listeners = ['saveComponents' => 'saveComponents','togglePreviewMode' => 'togglePreviewMode'];

    public function render()
    {
        return view('livewire.title-with-images');
    }

    public function mount($info = null, $data = null,  $CustomViewId = null, $sectionId = null)
    {
        $this->CustomViewId = $CustomViewId;
        $this->sectionId = $sectionId;
        $this->title = "Título";
        $this->image1 = "";
        $this->description1 = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nis";
        $this->image2 = "";
        $this->description2 = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nis";
        $this->image3 = "";
        $this->description3 = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nis";

        if ($info) {
            $this->isEditing = false;
            $this->preview = false;
            $this->title = $info['title'];
            $this->image1 = $info['image1'];
            $this->description1 = $info['description1'];
            $this->image2 = $info['image2'];
            $this->description2 = $info['description2'];
            $this->image3 = $info['image3'];
            $this->description3 = $info['description3'];
        }

        if ($data) {
            $this->isEditing = false;
            $this->preview = false;
            $this->title = $data['title'];
            $this->image1 = $data['image1'];
            $this->description1 = $data['description1'];
            $this->image2 = $data['image2'];
            $this->description2 = $data['description2'];
            $this->image3 = $data['image3'];
            $this->description3 = $data['description3'];
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
                'name' => 'Titulo con imagenes',
                'model_type' => 'title-with-images',
            ]);
            if ($this->image1) {
                $this->image1 = $this->image1->store('images', 'public');
            }
            if ($this->image2) {
                $this->image2 = $this->image2->store('images', 'public');
            }
            if ($this->image3) {
                $this->image3 = $this->image3->store('images', 'public');
            }
            $this->componentData = [
                'title' => $this->title,
                'image1' => $this->image1,
                'description1' => $this->description1,
                'image2' => $this->image2,
                'description2' => $this->description2,
                'image3' => $this->image3,
                'description3' => $this->description3,
            ];
            ComponentHelper::updateComponentData($component, $this->CustomViewId, $this->componentData);
        } else {
            $component = ComponentProvider::firstOrCreate([
                'name' => 'Titulo con imagenes',
                'model_type' => 'title-with-images',
            ]);
            $section = Section::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
            $CustomViewId = $section->id;
            if ($this->image1) {
                $this->image1 = $this->image1->store('images', 'public');
            }
            if ($this->image2) {
                $this->image2 = $this->image2->store('images', 'public');
            }
            if ($this->image3) {
                $this->image3 = $this->image3->store('images', 'public');
            }
            $this->componentData = [
                'title' => $this->title,
                'image1' => $this->image1,
                'description1' => $this->description1,
                'image2' => $this->image2,
                'description2' => $this->description2,
                'image3' => $this->image3,
                'description3' => $this->description3,
            ];
            ComponentHelper::createComponentData($component, $CustomViewId, $this->componentData);
        }
    }
}
