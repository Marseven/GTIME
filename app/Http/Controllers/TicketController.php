<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use PDF;

class TicketController extends Controller
{
    public function __construct()
    {
        //

    }

    public function index(Ticket $ticket)
    {
        //
    }

    public function print(Service $service)
    {

        $ticket = new Ticket();

        $nbre_ticket = Ticket::where('created_at', date('Y-m-d'))->count();
        $service->load(['structure']);

        if ($nbre_ticket == 0) {
            $ticket->numero = 1;
            $ticket->nbre_ticket_avant = $nbre_ticket;
        } else {

            $ticket_prev = Ticket::where('created_at', date('Y-m-d'))->orderBy('created_at', 'desc')->first();
            $ticket->numero = $ticket_prev->numero++;
            $ticket->nbre_ticket_avant = $nbre_ticket;
        }

        $ticket->status = STATUT_PRINT;
        $ticket->service_id = $service->id;
        $ticket->structure_id = $service->structure_id;

        $ticket->save();

        return redirect('printer/' . $ticket->id);
    }

    public function agent()
    {
        $services = Service::all()->where('structure_id', Auth::user()->structure_id);
        $list_service = [];
        $i = 0;
        foreach ($services as $service) {
            $service->load(['tickets']);
            $last_ticket = end($service->tickets);
            if ($last_ticket->created_at < date('Y-m-d')) {
                $last_ticket = null;
            } else {
                $last_ticket = Ticket::where('status', STATUT_PRINT)->where('service_id', $service->id)->get();
            }

            $list_service[$i]['service'] = $service;
            $list_service[$i]['last_ticket'] = $last_ticket;
        }

        return view('admin.tickets.agent', ['list_service' => $list_service,]);
    }
}
