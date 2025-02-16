<?php

namespace App\Repositories;

use App\Models\Component;

class ComponentRepository
{
    public function getAll($filters = [])
    {
        $query = Component::query();

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        return $query->get();
    }

    public function getTypes()
    {
        return Component::distinct()->pluck('type')->filter()->values();
    }

    // هنا باقي الاكواد
}
