<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ArchiveService;

class ArchiveController extends Controller
{
    protected $archiveService;

    public function __construct(ArchiveService $archiveService)
    {
        $this->archiveService = $archiveService;
    }

    public function create()
    {
        $models = $this->archiveService->getModels();
        return view('admin.archive.create', compact('models'));
    }

    public function store(Request $request)
    {
        $table = $request->input('table');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $beforeDate = $request->input('before_date');

        try {
            $message = $this->archiveService->archiveData($table, $fromDate, $toDate, $beforeDate);
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
