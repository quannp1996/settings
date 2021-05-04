<?php

namespace App\Containers\Vendor\Settings\Tasks;

use App\Containers\Vendor\Settings\Data\Repositories\SettingRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;

class FindSettingByKeyTask extends Task
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($key)
    {
        $result = $this->repository->findWhere(['key' => $key])->first();

        if (!$result) {
            throw new NotFoundException();
        }

        return $result->value;
    }
}
