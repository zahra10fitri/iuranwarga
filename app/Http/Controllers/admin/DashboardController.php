<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class DashboardController extends Controller

{
    public function index()
    {
        // Hitung jumlah warga
        $totalWarga = User::where('level', 'warga')->count();

        // Hitung jumlah pembayaran iuran
        $totalIuran = Payment::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('totalWarga', 'totalIuran'));
    }
}
