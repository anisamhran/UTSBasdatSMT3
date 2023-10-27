<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBarang extends Model
{
    use HasFactory;
    public $timestamps = false;

    use SoftDeletes;
    public function barang()
    {
        return $this->hasMany(BarangModel::class);
    }
}
