<?php
namespace App\Repositories;

use App\Models\HelpFunc;

class HelpFuncRepository
{
    public function getAllHelpFuncs($search = null, $type = null)
    {
        $query = HelpFunc::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($type) {
            $query->where('type', $type);
        }

        return $query->get();
    }

    public function createHelpFunc($data)
    {
        return HelpFunc::create($data);
    }

    public function updateHelpFunc($helpFunc, $data)
    {
        return $helpFunc->update($data);
    }

    public function deleteHelpFunc($helpFunc)
    {
        return $helpFunc->delete();
    }

    public function getDistinctTypes()
    {
        return HelpFunc::distinct()->pluck('type')->filter()->values();
    }
}
