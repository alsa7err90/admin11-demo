<?php

namespace App\Services;

use App\Repositories\SettingRepository;
use App\Models\Setting;

class SettingService
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getAllSettings()
    {
        return $this->settingRepository->getAllSettings();
    }

    public function createSetting(array $data)
    {
        return $this->settingRepository->createSetting($data);
    }

    public function findSettingById($id)
    {
        return $this->settingRepository->findSettingById($id);
    }

    public function updateSetting(Setting $setting, array $data)
    {
        return $this->settingRepository->updateSetting($setting, $data);
    }
}
