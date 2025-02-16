<?php

namespace App\Http\Controllers\Admin;

use App\Models\HelpFunc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelpFuncRequest;
use Illuminate\Support\Facades\Blade;
use App\Services\HelpFuncService;

class HelpFuncController extends Controller
{
    protected $helpFuncService;

    public function __construct(HelpFuncService $helpFuncService)
    {
        $this->helpFuncService = $helpFuncService;
    }

    public function index(Request $request)
    {
        $helpFuncs = $this->helpFuncService->getHelpFuncs($request->search, $request->type)
            ->map(function ($helpFunc) {
                $helpFunc->rendered_code = Blade::render($helpFunc->code_example);
                return $helpFunc;
            });

        $types = $this->helpFuncService->getTypes();

        if ($request->ajax()) {
            return view('admin.help-funcs.partials.help-funcs-list', compact('helpFuncs'))->render();
        }

        return view('admin.help-funcs.index', compact('helpFuncs', 'types'));
    }

    public function create()
    {
        // هنا الكود
        return redirect()->route('admin.help-funcs.index')->with('success', $this->msg_dimo);
    }

    public function store(HelpFuncRequest $request)
    {
        // هنا الكود
        return redirect()->route('admin.help-funcs.index')->with('success', $this->msg_dimo);
    }

    public function edit(HelpFunc $helpFunc)
    {
        // هنا الكود
        return redirect()->route('admin.help-funcs.index')->with('success', $this->msg_dimo);
    }

    public function update(HelpFuncRequest $request, HelpFunc $helpFunc)
    {
          // هنا الكود
          return redirect()->route('admin.help-funcs.index')->with('success', $this->msg_dimo);
    }

    public function destroy(HelpFunc $helpFunc)
    {
        // هنا الكود
        return redirect()->route('admin.help-funcs.index')->with('success', $this->msg_dimo);
    }
}
