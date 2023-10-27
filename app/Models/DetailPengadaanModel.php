<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengadaanModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pengadaan';

    public function barang()
    {
        return $this->belongsTo(BarangModel::class);
    }

    public function pengadaan()
    {
        return $this->belongsTo(PengadaanModel::class);
    }
}
