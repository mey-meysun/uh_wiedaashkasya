<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'pabrik', 'jenis', 'gambar'];

    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class, 'jenis');
    }
}
