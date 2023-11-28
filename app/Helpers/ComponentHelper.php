<?php

namespace App\Helpers;

use App\Models\ComponentDataProvider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\ComponentData;

class ComponentHelper
{
        public static function createComponentDataProvider($component, $CustomViewId, $data)
        {
            foreach ($data as $key => $body) {
                ComponentDataProvider::create([
                    'key' => $key,
                    'value' => $body,
                    'company_id' => $CustomViewId,
                    'component_provider_id' => $component->id,
                ]);
            }
        }


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


        public static function updateComponentDataProvider($component, $CustomViewId, $data)

        {
            foreach ($data as $key => $body) {
                $componentData = ComponentDataProvider::updateOrCreate([
                    'company_id' => $CustomViewId,
                    'component_provider_id' => $component->id,
                    'key' => $key,
                ], [
                    'value' => $body,
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


