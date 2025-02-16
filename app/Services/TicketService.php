<?php
namespace App\Services;

use App\Repositories\TicketRepository;
use App\Enums\TicketStatus;

class TicketService
{
    protected $ticketRepo;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function getAllTickets()
    {
        return $this->ticketRepo->getAllTickets();
    }

    public function getTicketById($id)
    {
        return $this->ticketRepo->getTicketById($id);
    }

    public function storeTicket(array $data)
    {
        $data['status'] = TicketStatus::Open; // تعيين الحالة الافتراضية
        return $this->ticketRepo->storeTicket($data);
    }

    public function updateTicketStatus($id, $status)
    {
        return $this->ticketRepo->updateTicketStatus($id, $status);
    }

    public function assignAdminToTicket($id, $adminId)
    {
        return $this->ticketRepo->assignAdminToTicket($id, $adminId);
    }

    public function addCommentToTicket($ticketId, array $commentData)
    {
        return $this->ticketRepo->addCommentToTicket($ticketId, $commentData);
    }

    public function attachFileToTicket($ticket, $file)
    {
        return $ticket->images()->create([
            'path' => $file->store('uploads/tickets'),
        ]);
    }
}
