<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Component as ModelComponent;
use App\Models\ComponentData;
use App\Models\Invitation;
use App\Helpers\ComponentHelper;

class VideoComponent extends Component
{
    use WithFileUploads;

    public $title = 'Video de nuestra historia';
    public $videoUrl = '';
    public $isEditing = true;
    public $invitationId;
    protected $listeners = ['saveComponents' => 'saveComponents'];

    public function mount ($data = null, $info = null, $invitationId = null)
    {
        $this->invitationId = $invitationId;
        $this->title = 'Video de nuestra historia';
        $this->videoUrl = '';
        if ($info) {
            $this->title = $info['title'];
            $this->videoUrl = $info['videoUrl'];
            $this->isEditing = true;
        }
        if($data)
        {
            $this->title = $data['title'];
            $this->videoUrl = $data['videoUrl'];
            $this->isEditing = false;
        }
    }

    public function render()
    {
        return view('livewire.video-component');
    }

    public function saveComponents()
    {
        $this->processVideoUrl();
        $this->saveComponentData();
    }

    public function processVideoUrl()
    {
        if (strpos($this->videoUrl, 'https://youtu.be/') === 0) {
            $videoCode = substr($this->videoUrl, 17);
            $videoCode = strtok($videoCode, '?');
            $this->videoUrl = "https://www.youtube.com/embed/$videoCode";
        }
    }

    public function saveComponentData()
    {
        if($this->invitationId){
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1, 
                'name' => 'video with title',
                'model_type' => 'video-component',
            ]);
            if ($this->videoUrl) {
                $this->video = $this->videoUrl;
            } 
            $this->componentData = [
                'title' => $this->title,
                'videoUrl' => $this->videoUrl,
            ];
            ComponentHelper::updateComponentData($component, $this->invitationId, $this->componentData);
        }else{
            $component = ModelComponent::firstOrCreate([
                'component_package_id' => 1, 
                'name' => 'video with title',
                'model_type' => 'video-component',
            ]);
    
            $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
            $invitationId = $invitation->id;
    
            if ($this->videoUrl) {
                $this->video = $this->videoUrl;
            } 
            $this->componentData = [
                'title' => $this->title,
                'videoUrl' => $this->videoUrl,
            ];
            ComponentHelper::createComponentData($component, $invitationId, $this->componentData);   
        }
    }
}
