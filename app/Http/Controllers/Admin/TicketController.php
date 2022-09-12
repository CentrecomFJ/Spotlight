<?php

namespace App\Http\Controllers\Admin;

use App\Accounts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Mailers\AppMailer;
use App\Ticket;
use App\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Ticket::paginate(10);

        return view('admin.ticket.index', compact('tickets'));
    }

    public function create()
    {
        $categories = TicketCategory::all();
        $accounts = Accounts::all()->sortBy('account_name');

        return view('admin.ticket.create', compact('categories', 'accounts'));
    }

    public function store(StoreTicketRequest $request, AppMailer $mailer)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'Open';
        $ticket = Ticket::create($data);

        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "A ticket with ID: #$ticket->id has been opened.");
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);

        return view('admin.ticket.user_tickets', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        return view('admin.ticket.show', compact('ticket'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('id', $ticket_id)->firstOrFail();
        $ticket->status = "Closed";
        $ticket->save();
        $ticketOwner = $ticket->user;
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
        return redirect()->back()->with("status", "The ticket has been closed.");
    }
}
