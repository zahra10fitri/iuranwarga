<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\DuesCategory;

class PaymentController extends Controller
{
   public function index()
{
    // Halaman untuk pembayaran belum bayar
    $payments = Payment::where('status', 'belum_bayar')->get();
    return view('admin.payment', compact('payments'));
}

public function verified()
{
    // Halaman untuk pembayaran yang sudah diverifikasi
    $payments = Payment::where('status', 'sudah_bayar')->get();
    return view('admin.payment.verified', compact('payments'));
}


   public function verify($id)
{
    $payment = Payment::findOrFail($id);
    $payment->status = 'verified';
    $payment->save();

    return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil diverifikasi!');
}


    public function create()
    {
        $users = User::where('level', 'warga')->get();
        $categories = DuesCategory::all();

        return view('admin.payment.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'dues_category_id' => 'required|exists:dues_categories,id',
            'amount'         => 'required|numeric',
            'date'           => 'required|date',
            'status'         => 'required|in:pending,verified',
        ]);

        Payment::create($request->all());

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil dicatat');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $users = User::where('level', 'warga')->get();
        $categories = DuesCategory::all();

        return view('admin.payment.edit', compact('payment', 'users', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'dues_category_id' => 'required|exists:dues_categories,id',
            'amount'         => 'required|numeric',
            'date'           => 'required|date',
            'status'         => 'required|in:pending,verified',
        ]);

        $payment->update($request->all());

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}
