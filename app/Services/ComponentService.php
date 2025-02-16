<?php

namespace App\Services;

use App\Repositories\ComponentRepository;
use Illuminate\Support\Facades\Blade;

class ComponentService
{
    protected $componentRepository;

    public function __construct(ComponentRepository $componentRepository)
    {
        $this->componentRepository = $componentRepository;
    }

    public function getAllComponents($filters = [])
    {
        $components = $this->componentRepository->getAll($filters);

        return $components->map(function ($component) {
            $component->rendered_code = Blade::render($component->code_example);
            return $component;
        });
    }

    public function getTypes()
    {
        return $this->componentRepository->getTypes();
    }
}
