<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\LanguageService;
use App\Http\Requests\Language\StoreRequest;
use App\Http\Requests\Language\UpdateRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index()
    {
        $data = $this->languageService->getAll();
        return view('languages.index', compact('data'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(StoreRequest $request)
    {
        $this->languageService->store($request->validated());
        return redirect()->route('languages.index');
    }

    public function show($id)
    {
        $language = $this->languageService->find($id);
        return view('languages.show', compact('language'));
    }

    public function edit($id)
    {
        $language = $this->languageService->find($id);
        return view('languages.edit', compact('language'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->languageService->update($id, $request->validated());
        return redirect()->route('languages.index');
    }

    public function destroy($id)
    {
        $this->languageService->destroy($id);
        return redirect()->route('languages.index');
    }
    public function fetchTranslations($id)
    {
        $language = $this->languageService->find($id);

        // البحث عن الترجمات في المشروع
        $translations = $this->findTranslationsInFiles();

        // إضافة الترجمات إلى ملف JSON
        $this->addTranslationsToJson($language->code, $translations);

        return redirect()->route('admin.languages.edit', $language->id)->with('success', 'Translations fetched and added successfully.');
    }

    protected function findTranslationsInFiles()
    {
        $translations = [];
        $directory = base_path(); // جذر المشروع
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));

        foreach ($files as $file) {
            // تحقق من أن الملف هو ملف PHP أو Blade
            if ($file->isFile() && ($file->getExtension() === 'php' || $file->getExtension() === 'blade.php')) {
                $content = file_get_contents($file->getRealPath());


                preg_match_all('/@lang$[\'"]([^\'"]+)[\'"]$|__$[\'"]([^\'"]+)[\'"]$/', $content, $matches);

                // إضافة الجمل إلى المصفوفة
                foreach ($matches[1] as $match) {
                    if (!in_array($match, $translations)) {
                        $translations[] = $match; // إضافة الجملة إلى المصفوفة
                    }
                }
                foreach ($matches[2] as $match) {
                    if (!in_array($match, $translations)) {
                        $translations[] = $match; // إضافة الجملة إلى المصفوفة
                    }
                }
            }
        }

        return $translations;
    }

    protected function addTranslationsToJson($langCode, $translations)
    {
        $filePath = resource_path("lang/{$langCode}.json");

        // تحقق مما إذا كان الملف موجودًا
        if (file_exists($filePath)) {
            $currentContent = json_decode(file_get_contents($filePath), true);

            // إضافة الترجمات الجديدة
            foreach ($translations as $key) {
                if (!isset($currentContent[$key])) {
                    $currentContent[$key] = $key; // إضافة الجملة بنفس النص الإنجليزي
                }
            }

            // كتابة المحتوى المحدث إلى الملف
            file_put_contents($filePath, json_encode($currentContent, JSON_PRETTY_PRINT));
        }
    }

