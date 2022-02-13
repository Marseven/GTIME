<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentsExport implements FromView
{
    
    public function __construct($begin, $end)
    {
        $this->begin = new \DateTime($begin);
        $this->end = new \DateTime($end);
    }

    public function view(): View
    {
        $payments = Payment::all()->where('created_at', '>=', $this->begin->format('Y-m-d H:i:s'))->where('created_at', '<=', $this->end->format('Y-m-d H:i:s'));
        
        return view('admin.exports.payment', [
            'payments' => $payments,
        ]);
    }
}
