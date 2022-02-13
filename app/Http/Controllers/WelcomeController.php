<?php

namespace App\Http\Controllers;

use App\Mail\QueryMessage;
use App\Models\Service;
use App\Models\Struture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{

    public function index(Struture $structure = null)
    {

        if ($structure) {
            $services = Service::where('structure_id', $structure->id)->orderBy('position', 'asc')->get();
            return view('welcome', ['structure' => $structure, 'services' => $services]);
        } else {
            $services = [];
            return view('welcome', ['services' => $services]);
        }
    }

    public function contact(Request $request)
    {

        try {
            $result =  Mail::to('gnoumbar7@icloud.com')->cc("mebodoaristide@gmail.com")->queue(new QueryMessage($request->all()));
        } 
        catch (Swift_TransportException $e) {
            echo $e->getMessage();
        }

        return back()->with('success', "Votre mail a été envoyé, nous reviendrons vers vous au plus tôt.");
    }
}
