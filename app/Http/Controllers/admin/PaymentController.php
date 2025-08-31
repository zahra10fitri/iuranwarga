<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\DuesCategory;

class PaymentController extends Controller
{
    // Halaman untuk pembayaran dengan status "belum bayar"
    public function index()
    {
        $payments = Payment::where('status', 'belum bayar')->get();
        return view('admin.payment', compact('payments'));
    }

    // Halaman untuk pembayaran dengan status "verified"
    public function verified()
    {
        $payments = Payment::where('status', 'verified')->get();
        return view('admin.payment-verified', compact('payments'));
    }

    // Verifikasi pembayaran
    // public function verify($id)
    // {
    //     $payment = Payment::findOrFail($id);
    //     $payment->status = 'verified';
    //     $payment->save();

    //     return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil diverifikasi!');
    // }
    public function verify($id)
{
    $payment = Payment::findOrFail($id);
    $payment->status = 'verified';
    $payment->save();

    // setelah verify → arahkan ke halaman detail transaksi
    return redirect()->route('admin.payment.show', $payment->id)
                     ->with('success', 'Pembayaran berhasil diverifikasi.');
}

public function show($id)
{
    $payment = Payment::with('user')->findOrFail($id);
    return view('admin.payment-transaksi', compact('payment'));
}
public function complete($id)
{
    $payment = Payment::findOrFail($id);
    // logika tambahan kalau mau (misal simpan waktu bayar, generate nomor transaksi, dll)

    return redirect()->route('admin.payment.verified')
                     ->with('success', 'Pembayaran berhasil dilakukan.');
}

public function searchUser(Request $request)
{
    $term = $request->get('term');
    $users = User::where('name', 'LIKE', '%' . $term . '%')->get(['id', 'name']);
    return response()->json($users);
}


    // Form create pembayaran
   public function create()
{
    $users = User::all(); // semua warga
    $categories = DuesCategory::all(); // semua periode
    return view('admin.payment-create', compact('users', 'categories'));
}

public function store(Request $request)
{
    $request->validate([
        'iduser' => 'required|exists:users,id',
        'idduescategory' => 'required|exists:dues_categories,id',
        'nominal' => 'required|numeric|min:0',
        'petugas' => 'required|string',
    ]);

    Payment::create([
        'iduser' => $request->iduser,
        'idduescategory' => $request->idduescategory,
        'nominal' => $request->nominal,
        'petugas' => $request->petugas,
        'status' => 'belum bayar', // default
    ]);

    return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil ditambahkan');
}


    // Edit pembayaran
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $users = User::where('level', 'warga')->get();
        $categories = DuesCategory::all();

        return view('admin.payment-edit', compact('payment', 'users', 'categories'));
    }

    // Update pembayaran
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'user_id'          => 'required|exists:users,id',
            'dues_category_id' => 'required|exists:dues_categories,id',
            'amount'           => 'required|numeric',
            'date'             => 'required|date',
            'status'           => 'required|in:belum bayar,verified', // ✅ fix
        ]);

        $payment->update($request->all());

        return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil diperbarui');
    }

    // Hapus pembayaran
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil dihapus');
    }
}
