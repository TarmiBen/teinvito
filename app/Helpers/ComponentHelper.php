<?php

namespace App\Helpers;

use App\Models\ComponentDataProvider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ComponentHelper
{
        public static function createComponentData($component, $CustomViewId, $data)
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

        public static function updateComponentData($component, $CustomViewId, $data)
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
}


