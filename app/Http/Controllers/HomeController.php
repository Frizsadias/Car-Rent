<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cars = Car::count();
        $peminjaman = Peminjaman::count();
        $pengembalian = Pengembalian::count();
        return view('dashboard.index',compact('cars','peminjaman','pengembalian'));
    }

}
