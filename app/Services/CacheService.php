<?php

namespace App\Services;

use App\Models\Language;
use App\Models\TicketDepartment;
use App\Models\TicketLabel;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CacheService
{
    protected $cacheTime = 60 ;
    public function getLanguages()
    {
        return Cache::remember('languages', $this->cacheTime, function () {
            return Language::select(['id', 'code', 'name', 'is_default', 'is_enable', 'icon'])->get();
        });
    }

    public function getRoles()
    {
        return Cache::remember('roles', $this->cacheTime, function () {
            return Role::select(['id', 'name' ,'guard_name'])->get();
        });
    }

    public function getPermissions()
    {
        return Cache::remember('permissions', $this->cacheTime, function () {
            return Permission::all();
        });
    }

    public function getTicketDepartments()
    {
        return Cache::remember('ticket_departments', $this->cacheTime, function () {
            return TicketDepartment::select(['id','name','image','parent_id','description'])->get();
        });
    }

    public function getTicketLabels()
    {
        return Cache::remember('ticket_labels', $this->cacheTime, function () {
            return TicketLabel::select(['id','name','description'])->get();
        });
    }
}
