<?php

namespace App\Services;

use App\Repositories\HeroRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroService
{
    protected $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function getAllHeroes()
    {
        return $this->heroRepository->getAllHeroes();
    }

    public function createHero(Request $request)
    {
        $path = $request->file('image')->store('images/heroes', 'public');

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
            'status' => $request->status ? 1 : 0,
            'template_name' => $request->template_name,
            'video_link' => $request->video_link,
            'second_button_label' => $request->second_button_label,
            'second_button_link' => $request->second_button_link,
            'expires_at' => $request->expires_at,
        ];

        return $this->heroRepository->createHero($data);
    }

    public function updateHero(Request $request, $id)
    {
        $hero = $this->heroRepository->findHeroById($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
            'status' => $request->status ? 1 : 0,
            'template_name' => $request->template_name,
            'video_link' => $request->video_link,
            'second_button_label' => $request->second_button_label,
            'second_button_link' => $request->second_button_link,
            'expires_at' => $request->expires_at,
        ];

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('images/heroes', 'public');
        }

        return $this->heroRepository->updateHero($hero, $data);
    }

    public function toggleStatus($id)
    {
        $hero = $this->heroRepository->findHeroById($id);
        $hero->status = !$hero->status;
        $hero->save();

        return $hero;
    }

    public function deleteHero($id)
    {
        $hero = $this->heroRepository->findHeroById($id);
        return $this->heroRepository->deleteHero($hero);
    }

    public function findHeroById($id)
    {
        return $this->heroRepository->findHeroById($id);
    }
}
