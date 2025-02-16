<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HeroService;

class DashboardController extends Controller
{
    protected $heroService;

    public function __construct(HeroService $heroService)
    {
        $this->heroService = $heroService;
    }

    public function index()
    {
        $heroes = $this->heroService->getAllHeroes();
        return view('admin.dashboard', compact('heroes'));
    }
}
