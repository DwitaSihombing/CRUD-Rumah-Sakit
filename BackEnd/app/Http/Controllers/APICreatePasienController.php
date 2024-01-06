<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;

class APICreatePasienController extends Controller
{
    public function createpasien(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'sex'        => 'required',
            'religion'   => 'required',
            'phone'            => 'required',
            'address'            => 'required',
            'nik'            => 'required',

        ]);

        $pasien = new Pasien([
            'name' => $request->name,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'phone' => $request->phone,
            'address' => $request->address,
            'nik' => $request->nik,

        ]);

        $pasien->save();

        return response()->json([
            'message' => 'Example of success create data!'
        ], 201);
    }
}
