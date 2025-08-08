<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use App\Models\DuesCategory;

class DashboardController extends Controller
{
    public function index()
    {
      $totalWarga =User::all()->count(); 
        $totalPembayaran = Payment::count();
        $totalKategori = DuesCategory::count();
        $totalPetugas = User::where('level', 'admin')->count(); // P besar

        return view('admin.dashboard', compact(
            'totalWarga',
            'totalPembayaran',
            'totalKategori',
            'totalPetugas'
        ));
        
    }
}
