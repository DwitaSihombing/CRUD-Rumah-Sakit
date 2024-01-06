<?php

namespace App\Http\Controllers;

use App\Models\Pasien;

class APIReadPasienController extends Controller
{
    public function readPasien(Pasien $pasien) 
    {
        $pasien= $pasien->all();
        return response()->json($pasien);
    }
}