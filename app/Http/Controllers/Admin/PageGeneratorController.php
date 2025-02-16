<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class PageGeneratorController extends Controller
{
    public function create()
    {
        return view('admin.builder.create');
    }

    public function store(Request $request)
    {
        // التحقق من المدخلات
        return redirect()->back()->with('success',$this->msg_dimo);
    }


}
