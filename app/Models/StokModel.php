<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    use HasFactory;

    
    protected $table = 'kartu_stok';

    public function barang()
    {
        return $this->belongsTo(BarangModel::class);
    }
}
