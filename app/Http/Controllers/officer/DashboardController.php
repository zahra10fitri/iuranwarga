<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;

class OfficerDashboardController extends Controller
{
    public function index()
    {
        // total data warga
        $totalWarga = User::where('level', 'warga')->count();

        // total semua pembayaran
        $totalPayment = Payment::count();

        // pembayaran yang belum lunas
        $belumBayar = Payment::where('status', 'belum bayar')->count();

        return view('officer.dashboard', compact('totalWarga', 'totalPayment', 'belumBayar'));
    }
}
