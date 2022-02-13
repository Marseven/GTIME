<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Ticket;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Ticket $ticket)
    {
        return view(
            'notes.add',
            [
                'ticket' => $ticket,
            ]
        );
    }

    public function create(Request $request, Ticket $ticket)
    {

        $note = new Note();

        $note->note = $request->note;
        $note->commentaire = $request->commantaire;
        $note->ticket_id = $ticket->id;
        $note->user_id = $ticket->user_id;
        $note->service_id = $ticket->service_id;
        $note->structure_id = $ticket->structure_id;

        if ($note->save()) {
            return redirect('/thanks')->with('success', 'Merci pour votre contribution !');
        } else {
            return back()->with('error', "Une erreur s'est produite.");
        }
    }
}
