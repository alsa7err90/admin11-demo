<?php

namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService
{
    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function getAll()
    {
        return $this->languageRepository->getAll();
    }

    public function find($id)
    {
        return $this->languageRepository->find($id);
    }

    public function store(array $data)
    {
        $data['is_enable'] = isset($data['is_enable']) ? 1 : 0;
        $data['is_default'] = isset($data['is_default']) ? 1 : 0;
        $language = $this->languageRepository->create($data);
        $this->createLanguageFile($language->code);
        return $language;
    }

    public function update($id, array $data)
    {
        $language = $this->find($id);
        $language = $this->languageRepository->update($language, $data);
        if (isset($data['translations'])) {
            $this->updateLanguageFile($language->code, $data['translations']);
        }
        return $language;
    }

    public function destroy($id)
    {
        $language = $this->find($id);
        $this->deleteLanguageFile($language->code);
        return $this->languageRepository->delete($language);
    }

    protected function deleteLanguageFile($langCode)
    {
        $filePath = resource_path("lang/{$langCode}.json");
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    protected function createLanguageFile($langCode)
    {
        $filePath = resource_path("lang/{$langCode}.json");
        $defaultContent = json_encode(['welcome' => 'Welcome'], JSON_PRETTY_PRINT);
        file_put_contents($filePath, $defaultContent);
    }

    public function getTranslations($langCode)
    {
        $filePath = resource_path("lang/{$langCode}.json");
        return file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
    }

    protected function updateLanguageFile($langCode, array $translations)
    {
        $filePath = resource_path("lang/{$langCode}.json");
        $currentContent = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
        $currentContent = array_merge($currentContent, $translations);
        file_put_contents($filePath, json_encode($currentContent, JSON_PRETTY_PRINT));
    }
}
