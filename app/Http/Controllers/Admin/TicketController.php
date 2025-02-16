<?php
namespace App\Http\Controllers\Admin;

use App\Enums\TicketStatus;
use App\Enums\TicketPriority;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\AddCommentRequest;
use App\Http\Requests\Tickets\AssignAdminRequest;
use App\Http\Requests\Tickets\StoreRequest;
use App\Http\Requests\Tickets\UpdateRequest;
use App\Models\User;
use App\Services\CacheService;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticketService;
    protected $cacheService;

    public function __construct(TicketService $ticketService, CacheService $cacheService)
    {
        $this->ticketService = $ticketService;
        $this->cacheService = $cacheService;
    }

    // عرض قائمة التذاكر
    public function index(Request $request)
    {
        $tickets = $this->ticketService->getAllTickets();
        return view('admin.tickets.index', compact('tickets'));
    }

    // عرض تفاصيل التذكرة
    public function show($id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        $users = User::all(); // جلب جميع المستخدمين لتعيينهم كمشرفين
        return view('admin.tickets.show', compact('ticket', 'users'));
    }

    // صفحة إنشاء تذكرة جديدة
    public function create()
    {
        $departments = $this->cacheService->getTicketDepartments();
        $labels = $this->cacheService->getTicketLabels();
        $users = User::all(); // جلب جميع المستخدمين
        return view('admin.tickets.create', compact('departments', 'labels', 'users'));
    }

    // تخزين التذكرة الجديدة في قاعدة البيانات
    public function store(StoreRequest $request)
    {
        $ticket = $this->ticketService->storeTicket($request->validated());

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket created successfully.');
    }

    // تحديث حالة التذكرة
    public function updateStatus(UpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $ticket = $this->ticketService->updateTicketStatus($id, $validated['status']);

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket status updated successfully');
    }

    // تعيين مشرف للمتابعة
    public function assignAdmin(AssignAdminRequest $request, $id)
    {
        $ticket = $this->ticketService->assignAdminToTicket($id, $request->validated()['assigned_admin_id']);

        return redirect()->route('admin.tickets.index')->with('success', 'Admin assigned to ticket successfully');
    }

    // إضافة تعليق على التذكرة
    public function addComment(AddCommentRequest $request, $id)
    {
        $this->ticketService->addCommentToTicket($id, $request->validated());

        return redirect()->route('admin.tickets.show', $id)->with('success', 'Comment added successfully');
    }

}
