<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HeroService;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    protected $heroService;

    public function __construct(HeroService $heroService)
    {
        $this->heroService = $heroService;
    }

    public function index()
    {
        $heroes = $this->heroService->getAllHeroes();
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
    }

    public function edit($id)
    {
        return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
     }

    public function toggleStatus($id)
    {
       return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
     }

    public function destroy($id)
    {
        return redirect()->route('admin.heroes.index')->with('success', $this->msg_dimo);
    }
}
