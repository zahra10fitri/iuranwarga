<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\DuesMember;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // total pembayaran iuran warga ini
        $totalPembayaran = Payment::where('iduser', $user->id)->sum('amount');

        // total kategori iuran yang harus dibayar
        $totalIuran = DuesMember::where('iduser', $user->id)->count();

        // total pembayaran yang sudah lunas
        $lunas = Payment::where('iduser', $user->id)->where('status', 'lunas')->count();

        return view('warga.dashboard', compact('user', 'totalPembayaran', 'totalIuran', 'lunas'));
    }
}
