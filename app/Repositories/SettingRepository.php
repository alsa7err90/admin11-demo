<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function getAllSettings()
    {
        return Setting::all();
    }

    public function createSetting(array $data)
    {
        return Setting::create($data);
    }

    public function findSettingById($id)
    {
        return Setting::findOrFail($id);
    }

    public function updateSetting(Setting $setting, array $data)
    {
        $setting->update($data);
        return $setting;
    }
}
