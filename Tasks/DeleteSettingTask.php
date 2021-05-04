<?php

namespace App\Containers\Vendor\Settings\Tasks;

use App\Containers\Vendor\Settings\Data\Repositories\SettingRepository;
use App\Containers\Vendor\Settings\Models\Setting;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSettingTask extends Task
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(Setting $setting): ?int
    {
        try {
            return $this->repository->delete($setting->id);
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
