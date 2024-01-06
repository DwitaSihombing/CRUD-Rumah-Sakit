<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class APIUpdatePasienController extends Controller
{
    public function updatePasien(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'sex' => 'required|string',
            'religion' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'nik' => 'required|string',
        ]);

        $pasien = Pasien::find($id);


        if (!$pasien) {
            return response()->json([
                'message' => 'Data pasien tidak ditemukan',
            ], 404);
        }

        try {

            $pasien->update([
                'name' => $request->name,
                'sex' => $request->sex,
                'religion' => $request->religion,
                'phone' => $request->phone,
                'address' => $request->address,
                'nik' => $request->nik,
            ]);
            return response()->json([
                'message' => 'Data pasien berhasil diperbarui',
                'data' => $pasien,
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui data pasien',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
