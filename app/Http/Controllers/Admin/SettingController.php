<?php
namespace App\Http\Controllers\Admin;

use App\Events\NewSeedDataCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\SettingService;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $settings = $this->settingService->getAllSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(SettingRequest $request)
    {
        $validatedData = $request->validated();

        $setting = $this->settingService->createSetting([
            'key' => $validatedData['key'],
            'value' => $validatedData['value'],
            'desc' => $validatedData['desc'],
            'category' => $validatedData['value'],
        ]);

        // تحقق من خيار الإضافة كـ Seed
        if ($request->has('add_seed') && $request->add_seed) {
            createSeed(new Setting(), $setting);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Setting created.');
    }

    public function edit($id)
    {
        $setting = $this->settingService->findSettingById($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(SettingRequest $request, $id)
    {
        $validatedData = $request->validated();

        $setting = $this->settingService->findSettingById($id);
        $this->settingService->updateSetting($setting, [
            'value' => $validatedData['value'],
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated.');
    }
}
