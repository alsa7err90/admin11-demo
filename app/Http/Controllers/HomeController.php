<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function runSeeder(Request $request)
    {
        Artisan::call('db:seed'); // أو Artisan::call('db:seed', ['--class' => 'YourSpecificSeederClass']);
        return redirect()->back()->with('success', 'Seeders ran successfully!');
    }
}

