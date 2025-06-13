<?php

namespace App\Http\Controllers;

use App\Models\User;     // Pastikan model User sudah ada dan terimport
use App\Models\Obat;     // Pastikan model Obat sudah ada dan terimport
use App\Models\Transaksi; // Pastikan model Transaksi sudah ada dan terimport
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view with relevant data.
     */
    public function index()
    {
        // Hitung jumlah user
        $users = User::count();

        // Hitung jumlah obat
        $dataobat = Obat::count();

        // Hitung jumlah transaksi
        $transaksi = Transaksi::count();

        // Hitung total pendapatan (sum dari total_harga di tabel transaksi)
        $totalPendapatan = Transaksi::sum('total_harga');

        // Teruskan data ke view dashboard
        return view('dashboard', compact('users', 'dataobat', 'transaksi', 'totalPendapatan'));
    }
}