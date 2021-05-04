<?php

namespace App\Containers\Vendor\Settings\UI\API\Transformers;

use App\Containers\Vendor\Settings\Models\Setting;
use App\Ship\Parents\Transformers\Transformer;

class SettingTransformer extends Transformer
{
    protected $defaultIncludes = [
    ];

    protected $availableIncludes = [
    ];

    public function transform(Setting $entity): array
    {
        $response = [

            'object' => 'Setting',
            'id' => $entity->getHashedKey(),

            'key' => $entity->key,
            'value' => $entity->value,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
        ], $response);

        return $response;
    }
}
