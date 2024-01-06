<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class APIUpdateZeroPasienController extends Controller
{
    
    public function readPasienById($id) 
{
    $pasien = DB::table('pasiens')->where('id', $id)->first();
    return response()->json($pasien);
}

}