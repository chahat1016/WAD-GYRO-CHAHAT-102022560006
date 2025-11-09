<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller
{
   
    public function index()
    {
        $kucings = Kucing::all();

        return view('DaftarKucing', compact('kucings'));
    }

    public function show($id)
    {
        $kucing = Kucing::findOrFail($id);

        return view('DetailKucing', compact('kucing'));
    }
}