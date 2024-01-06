<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model {
    protected $fillable = ['name', 'sex', 'religion', 'phone', 'address', 'nik'];
}
