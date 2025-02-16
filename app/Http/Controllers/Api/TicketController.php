<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\AddCommentRequest;
use App\Http\Requests\Tickets\StoreRequest;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    // عرض قائمة التذاكر
    public function index(Request $request)
    {
        //   Service getAllTickets تقوم
        //  بالتعامل مع جلب التذاكر مع العلاقات المطلوبة
        $tickets = $this->ticketService->getAllTickets();
        return response()->json($tickets);
    }

    // إنشاء تذكرة جديدة
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        // اضافة التذكرة و  نقوم بتعيين الحالة الافتراضية (TicketStatus::Open)
        $ticket = $this->ticketService->storeTicket($data);

        // معالجة رفع الملفات (إن وجدت)
        if ($request->has('files')) {
            foreach ($request->file('files') as $file) {
                $this->ticketService->attachFileToTicket($ticket, $file);
            }
        }
        return response()->json(['ticket' => $ticket], 201);
    }

    // عرض تفاصيل تذكرة
    public function show($id)
    {
        //   Service getTicketById
        // يقوم بتحميل التذكرة مع العلاقات
        // (مثل user, department, label, assignedAdmin, comments, images)
        $ticket = $this->ticketService->getTicketById($id);
        return response()->json(['ticket' => $ticket]);
    }

    // إضافة تعليق لتذكرة
    public function addComment(AddCommentRequest $request, $id)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        // نقوم بإضافة التعليق عبر Service
        $comment = $this->ticketService->addCommentToTicket($id, $data);
        return response()->json(['comment' => $comment], 201);
    }
}
