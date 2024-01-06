<?php
namespace App\Http\Controllers;
use App\Models\Pasien;

class APIDeletePasienController extends Controller
{
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        return response()->json('Pasien deleted successfully');
    }
}
