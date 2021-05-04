<?php

/**
 * @apiGroup           Settings
 * @apiName            createSetting
 *
 * @api                {POST} /v1/settings Create Setting
 * @apiDescription     Create a new setting for the application
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated Admin
 *
 * @apiParam           {String}  key max:190
 * @apiParam           {String}  value max:190
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "data": {
 * "object": "Setting",
 * "id": "aadfa72342sa",
 * "key": "hello",
 * "value": "world"
 * },
 * "meta": {
 * "include": [],
 * "custom": []
 * }
 * }
 */

use App\Containers\Vendor\Settings\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('settings', [Controller::class, 'createSetting'])
    ->name('api_settings_create_setting')
    ->middleware(['auth:api']);
