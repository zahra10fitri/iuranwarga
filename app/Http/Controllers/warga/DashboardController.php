<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use App\Models\DuesCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalWarga = User::count();
         $totalPembayaran = Payment::where('status', 'verified')->sum('nominal');
        $totalKategori = DuesCategory::count();
        $totalPetugas = User::where('level', '!=', 'warga')->count();

        return view('warga.dashboard', compact(
            'totalWarga',
            'totalPembayaran',
            'totalKategori',
            'totalPetugas'
        ));
    }
}
