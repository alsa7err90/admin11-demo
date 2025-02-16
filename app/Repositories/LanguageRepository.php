<?php

namespace App\Repositories;

use App\Models\Language;

class LanguageRepository
{
    public function getAll()
    {
        return Language::all();
    }

    public function find($id)
    {
        return Language::findOrFail($id);
    }

    public function create(array $data)
    {
        return Language::create($data);
    }

    public function update(Language $language, array $data)
    {
        $language->update($data);
        return $language;
    }

    public function delete(Language $language)
    {
        return $language->delete();
    }
}
