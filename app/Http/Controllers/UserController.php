<?php

namespace App\Http\Controllers;

use App\Models\Refill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profil(User $user)
    {
        $user = User::find(Auth::user()->id);
        $user->load(['request_cards', 'payments', 'cards']);
        $refills = Refill::where('user_id', Auth::user()->id)->where('status', '<>', STATUT_SIMULATOR)->limit(10)->get();
        $somme = 0;
        foreach ($user->payments as $payment) {
            if ($payment->refill_id != NULL && $payment->status == STATUT_PAID) $somme += $payment->amount;
        }

        $taux = 0;
        $total = $refills->count() ? $refills->count() : 1;
        $do = 0;

        foreach ($refills as $refill) {
            if ($refill->status == STATUT_DO) $do++;
        }

        $taux = ($do / $total) * 100;

        $list_payments = [];
        foreach ($refills as $refill) {
            if (empty($refill->payment)) $list_payments[$refill->id] = $refill->payment->status;
        }

        return view('profile.show', [
            'user' => $user,
            'refills' => $refills,
            'request_cards' => $user->request_cards->count(),
            'list_payments' => $list_payments,
            'payments' => $somme,
            'taux' => $taux,
            'cards' => $user->cards->count(),

        ]);
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('profile.update-profile-information-form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if (Controller::formatPhone($request->phone) != false) {
            $user->phone = Controller::formatPhone($request->phone);
        } else {
            return back()->withErrors("Numéro de Téléphone incorrect");
        }


        if ($request->file('picture')) {
            $picture = FileController::picture($request->file('picture'));
            if ($picture['state'] == false) {
                return back()->withErrors($picture['message']);
            }

            $user->picture = $picture['url'];
        }

        $user->save();
        return redirect('user/' . $user->id);
    }

    public function editPassword(User $user)
    {
        $user = Auth::user();
        return view('profile.update-password-form', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $user->status = $request->status;
        $user->save();
        return redirect('/profil');
    }
}
