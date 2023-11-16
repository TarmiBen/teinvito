<?php

namespace App\Helpers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\ComponentData;

class ComponentHelper
{
        public static function createComponentData($component, $invitationId, $data)
        {
            foreach ($data as $key => $body) {
                ComponentData::create([
                    'key' => $key,
                    'value' => $body,
                    'invitation_id' => $invitationId,
                    'component_id' => $component->id,
                ]);
            }
        }
    
        public static function updateComponentData($component, $invitationId, $data)
        {
            foreach ($data as $key => $body) {
                $componentData = ComponentData::updateOrCreate([
                    'invitation_id' => $invitationId,
                    'component_id' => $component->id,
                    'key' => $key,
                ], [
                    'value' => $body,
                ]);
            }
        }
}

