<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisObat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jenis', 'keterangan'];

    public function obats()
    {
        return $this->hasMany(Obat::class, 'jenis');
    }
}
