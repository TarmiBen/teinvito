<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;

class VideoComponent extends Component
{
    use WithFileUploads;

    public $title = 'Video de nuestra historia';
    public $video = '';
    public $videoUrl = '';
    public $isEditing = true;
    protected $listeners = ['saveComponents' => 'saveHeaderSection'];

    public function mount ()
    {
        $this->title = 'Video de nuestra historia';
        $this->video = '';
        $this->videoUrl = '';
    }

    public function render()
    {
        return view('livewire.video-component');
    }

    public function saveVideoComponent()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelComponent::firstOrCreate([
            'component_package_id' => null, 
            'name' => 'video with title',
            'model_type' => 'video-component',
        ]);

        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        if ($this->video) {
            $videoPath = $this->video->store('public/videos');
            $this->video = $videoPath;
        } elseif ($this->videoUrl) {
            $this->video = $this->videoUrl;
            $this->videoUrl = null; 
        }

        $this->componentData = [
            'title' => $this->title,
            'video' => $this->video,
            'videoUrl' => $this->videoUrl,
        ];

        foreach ($this->componentData as $key => $body) {
            if (!is_null($body)) {
                ComponentData::create([
                    'key' => $key,
                    'value' => $body,
                    'invitation_id' => $invitationId,
                    'component_id' => $component->id,
                ]);
            }
        }
    }
}
