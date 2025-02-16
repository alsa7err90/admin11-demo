<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\TicketComment;

class TicketRepository
{
    public function getAllTickets()
    {
        return Ticket::with(['user', 'department', 'label', 'assignedAdmin', 'comments.user'])->paginate(10);
    }

    public function getTicketById($id)
    {
        return Ticket::with([
            'comments' => function ($query) {
                $query->select('id', 'ticket_id', 'user_id', 'comment', 'created_at'); // تحديد الحقول في التعليقات
            },
            'comments.user' => function ($query) {
                $query->select('id', 'name', 'email'); // تحديد الحقول المطلوبة فقط للمستخدم
            },
            'department' => function ($query) {
                $query->select('id', 'name', 'description', 'image', 'parent_id'); // تحديد الحقول المطلوبة للقسم
            },
            'label' => function ($query) {
                $query->select('id', 'name', 'description'); // تحديد الحقول المطلوبة فقط للـ label
            },
            'assignedAdmin' => function ($query) {
                $query->select('id', 'name'); // في حال وجود مشرف معين، جلب الحقول الأساسية فقط
            },
            'images' ,// العلاقات الأخرى يمكن تركها بدون select إذا كانت الحقول قليلة
            'user'
        ])
            ->select('id', 'user_id', 'title', 'content', 'status', 'department_id', 'priority', 'assigned_admin_id', 'label_id', 'created_at')
            ->findOrFail($id);

        // return Ticket::with(['user', 'department', 'label', 'assignedAdmin', 'comments.user'])->findOrFail($id);
    }

    public function storeTicket(array $data)
    {
        return Ticket::create($data);
    }

    public function updateTicketStatus($id, $status)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['status' => $status]);
        return $ticket;
    }

    public function assignAdminToTicket($id, $adminId)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['assigned_admin_id' => $adminId]);
        return $ticket;
    }

    public function addCommentToTicket($ticketId, array $commentData)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $comment = new TicketComment($commentData);
        $ticket->comments()->save($comment);
        return $comment;
    }
}
