<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComponentRequest;
use App\Models\Component;
use App\Services\ComponentService;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    protected $componentService;

    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'type']);
        $components = $this->componentService->getAllComponents($filters);
        $types = $this->componentService->getTypes();

        if ($request->ajax()) {
            return view('admin.components.partials.components-list', compact('components'))->render();
        }

        return view('admin.components.index', compact('components', 'types'));
    }

    public function create()
    {
       //    هنا الكود
       return redirect()->route('admin.components.index')->with('success', $this->msg_dimo);
    }

    public function store(ComponentRequest $request)
    {
    //    هنا الكود
        return redirect()->route('admin.components.index')->with('success', $this->msg_dimo);
    }

    public function edit($id)
    {
        //    هنا الكود
        return redirect()->route('admin.components.index')->with('success', $this->msg_dimo);
    }

    public function update(ComponentRequest $request, $id)
    {
        //    هنا الكود
        return redirect()->route('admin.components.index')->with('success', $this->msg_dimo);
    }

    public function destroy($id)
    {
       //    هنا الكود
       return redirect()->route('admin.components.index')->with('success', $this->msg_dimo);
    }
}
