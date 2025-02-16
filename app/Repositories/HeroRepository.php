<?php
namespace App\Repositories;

use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroRepository
{
    public function getAllHeroes()
    {
        return Hero::all();
    }

    public function createHero($data)
    {
        return Hero::create($data);
    }

    public function findHeroById($id)
    {
        return Hero::findOrFail($id);
    }

    public function updateHero(Hero $hero, $data)
    {
        return $hero->update($data);
    }

    public function deleteHero(Hero $hero)
    {
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }
        return $hero->delete();
    }
}
