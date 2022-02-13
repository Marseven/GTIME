<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Service;
use App\Models\Struture;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->security_role_id == 1) {
            $structures = Struture::all()->count();
            $services = Service::all()->count();
            $tickets = Ticket::all()->count();
            $notes = Note::all()->count();

            return view('admin.dashboard', [
                'structures' => $structures,
                'services' => $services,
                'tickets' => $tickets,
                'notes' => $notes,
            ]);
        } else {
            $structures = Struture::all()->where('structure_id', Auth::user()->structure_id)->count();
            $services = Service::all()->where('structure_id', Auth::user()->structure_id)->count();
            $tickets = Ticket::all()->where('structure_id', Auth::user()->structure_id)->count();
            $notes = Note::all()->where('structure_id', Auth::user()->structure_id)->count();

            return view('admin.dashboard', [
                'structures' => $structures,
                'services' => $services,
                'tickets' => $tickets,
                'notes' => $notes,
            ]);
        }
    }

    public function listStructures()
    {
        Controller::he_can('Structures', 'look');
        $structures = Struture::all();
        return view('admin.structures.list', ['structures' => $structures,]);
    }

    public function listServices()
    {
        Controller::he_can('Services', 'look');
        $services = Service::all();
        return view('admin.services.list', ['services' => $services,]);
    }

    public function listTickets($day = null)
    {
        Controller::he_can('Tickets', 'look');
        $tickets = Ticket::all();
        return view('admin.tickets.list', ['tickets' => $tickets,]);
    }

    public function listNotes($day = null)
    {
        Controller::he_can('Notes', 'look');
        $notes = Note::all();
        return view('admin.notes.list', ['notes' => $notes,]);
    }
}
