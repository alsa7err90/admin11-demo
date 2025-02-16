<?php
namespace App\Services;

use App\Repositories\HelpFuncRepository;
use Exception;

class HelpFuncService
{
    protected $helpFuncRepository;

    public function __construct(HelpFuncRepository $helpFuncRepository)
    {
        $this->helpFuncRepository = $helpFuncRepository;
    }

    public function getHelpFuncs($search, $type)
    {
        return $this->helpFuncRepository->getAllHelpFuncs($search, $type);
    }


    public function getTypes()
    {
        return $this->helpFuncRepository->getDistinctTypes();
    }
}
