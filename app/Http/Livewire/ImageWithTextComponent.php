<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ComponentProvider;
use App\Models\Section;
use App\Helpers\ComponentHelper;
use function get_headers;


class ImageWithTextComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $text;
    public $backgroundImage;
    public $buttonText;
    public $buttonLink;
    public $isEditing = true;
    public $preview = false;
    public $CustomViewId;
    protected $listeners = ['saveComponents' => 'saveComponents', 'togglePreviewMode' => 'togglePreviewMode'];

    public function mount($info = null, $data = null,  $CustomViewId = null)
    {
        $this->CustomViewId = $CustomViewId;
        $this->title = "Título";
        $this->text = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nis";
        $this->backgroundImage = "";
        $this->buttonText = "Botón";
        $this->buttonLink = "https://www.google.com";
        if ($info) {
            $this->isEditing = true;
            $this->preview = false;
            $this->title = $info['title'];
            $this->text = $info['text'];
            $this->backgroundImage = $info['backgroundImage'];
            $this->buttonText = $info['buttonText'];
            $this->buttonLink = $info['buttonLink'];
        }

        if ($data) {
            $this->isEditing = false;
            $this->preview = false;
            $this->title = $data['title'];
            $this->text = $data['text'];
            $this->backgroundImage = $data['backgroundImage'];
            $this->buttonText = $data['buttonText'];
            $this->buttonLink = $data['buttonLink'];
        }

    }

    public function render()
    {
        return view('livewire.image-with-text-component');
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
        if (!empty($this->buttonLink)) {
            $headers = @get_headers($this->buttonLink);
            if ($headers === false || strpos($headers[0], '200 OK') === false) {
                $this->emit('message', 'La url no es valida');
                return;
            }
        } elseif (empty($this->buttonLink)) {
            $this->emit('message', 'La url no puede estar vacia');
            return;
        }
        if ($this->CustomViewId){
            $component = ComponentProvider::firstOrCreate([
                'name' => 'Image con texto',
                'model_type' => 'image-with-text-component',
            ]);
            if ($this->backgroundImage) {
                $this->backgroundImage = $this->backgroundImage->store('images', 'public');
            }
            $this->componentData = [
                'title' => $this->title,
                'text' => $this->text,
                'backgroundImage' => $this->backgroundImage,
                'buttonText' => $this->buttonText,
                'buttonLink' => $this->buttonLink,
            ];
            ComponentHelper::updateComponentData($component, $this->CustomViewId, $this->componentData);
        } else {
            $component = ComponentProvider::firstOrCreate([
                'name' => 'Image con texto',
                'model_type' => 'image-with-text-component',
            ]);
            $section = Section::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
            $CustomViewId = $section->id;
            if ($this->backgroundImage) {
                $this->backgroundImage = $this->backgroundImage->store('images', 'public');
            }

            $this->componentData = [
                'title' => $this->title,
                'text' => $this->text,
                'backgroundImage' => $this->backgroundImage,
                'buttonText' => $this->buttonText,
                'buttonLink' => $this->buttonLink,
            ];
            ComponentHelper::createComponentData($component, $CustomViewId, $this->componentData);
        }
    }
}
