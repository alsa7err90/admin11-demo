<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CacheService;
use Illuminate\Http\Request;

class BaseDataController extends Controller
{
    protected $cacheService;

    public function __construct(CacheService $cacheService)
    {
        $this->cacheService = $cacheService;
    }

    public function index(Request $request)
    {
        $data = [];

        // تحقق من المعلمة "include"
        if ($request->has('include')) {
            $includes = explode(',', $request->query('include'));

            // إذا كانت المعلمة تشمل "all"، جلب كل البيانات
            if (in_array('all', $includes)) {
                $includes = ['languages', 'ticket_departments', 'ticket_labels'];
            }

            if (in_array('languages', $includes)) {
                $data['languages'] = $this->cacheService->getLanguages();
            }

            // if (in_array('roles', $includes)) {
            //     $data['roles'] = $this->cacheService->getRoles();
            // }

            // if (in_array('permissions', $includes)) {
            //     $data['permissions'] = $this->cacheService->getPermissions();
            // }

            if (in_array('ticket_departments', $includes)) {
                $data['ticket_departments'] = $this->cacheService->getTicketDepartments();
            }

            if (in_array('ticket_labels', $includes)) {
                $data['ticket_labels'] = $this->cacheService->getTicketLabels();
            }
        }

        return response()->json($data);
    }
}
